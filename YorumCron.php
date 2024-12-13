<?php
set_time_limit(0);
require('Baglan.php');
require('Fonksiyonlar.php');


$GenelAyarlar = VerileriVer('genelayarlar');
$GenelAyarlar = end($GenelAyarlar);

$YorumCron = $GenelAyarlar['YorumCron'];
$Proxy = $GenelAyarlar['YorumProxy'];

if (!empty($Proxy)) {
			
	$Proxy1 = explode(':', $Proxy);
	$Proxy = array();
	$Proxy['IP'] = isset($Proxy1[0])?$Proxy1[0]:false;
	$Proxy['Port'] = isset($Proxy1[1])?$Proxy1[1]:false;
	$Proxy['KullaniciAdi'] = isset($Proxy1[2])?$Proxy1[2]:false;
	$Proxy['Parola'] = isset($Proxy1[3])?$Proxy1[3]:false;

}

for ($i=0; $i < $YorumCron; $i++) { 

	$RestoranBilgisi = VerileriVer('restoranlar INNER JOIN ulkeler ON UlkeID=RestoranUlkeID', false, "RestoranYorumSayisi='0' AND RestoranExcelYorum > 0 AND RestoranYorumHata < 4", 1);
	if ($RestoranBilgisi) {
		
		$RestoranBilgisi = end($RestoranBilgisi);

		$YorumSayisi = 0;

		$RestoranID = $RestoranBilgisi['RestoranID'];
		$PlaceID = $RestoranBilgisi['RestoranPlaceID'];
		$UlkeKodu = empty($RestoranBilgisi['UlkeDilKodu'])?'en':$RestoranBilgisi['UlkeDilKodu'];

		//echo 'RestoranID: '.$RestoranID.'<br />';
		echo 'PlaceID: '.$PlaceID.'<br />';
		echo 'Mekan Adı: '.$RestoranBilgisi['RestoranMekanAdi'].'<br /><br />';

		$Baglanti = 'https://www.google.com/maps/place/?q=place_id:'.$PlaceID.'&hl='.$UlkeKodu;
		//echo '<a href="'.$Baglanti.'" target="_blank">'.$Baglanti.'</a><br />';
		//$Baglanti = 'https://www.google.com/maps/place/?q=place_id:'.$PlaceID;

		$Header = array();
		$Header[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0';
		$Header[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8';
		$Header[] = 'Accept-Language: en-US,en;q=0.5';
		$Header[] = 'DNT: 1';
		$Header[] = 'Connection: keep-alive';
		$Header[] = 'Upgrade-Insecure-Requests: 1';
		$Header[] = 'Sec-Fetch-Dest: document';
		$Header[] = 'Sec-Fetch-Mode: navigate';
		$Header[] = 'Sec-Fetch-Site: none';
		$Header[] = 'Sec-Fetch-User: ?1';

		$Kaynak = VeriOku($Baglanti, $Header, $Proxy);

		$Yorumlar = preg_match('/window\.APP_INITIALIZATION_STATE(.*);window\.APP_FLAGS=/ms', $Kaynak, $match)?trim($match[1], ' =;'):false;
		$Yorumlar = json_decode($Yorumlar, true);

		//PR($Yorumlar);


		$Yorumlar = ltrim($Yorumlar[3][6], ")]}'");
		$Yorumlar = json_decode($Yorumlar, true);
		//PR($Yorumlar);
		//exit();

		if (is_array($Yorumlar[6][175][9][0][0])) {

			$Yorumlar = $Yorumlar[6][175][9][0][0];
			foreach ($Yorumlar as $Yorum1) {

			    $Yorum = $Yorum1[0][2][15][0][0];

			    $YorumSayisi++;

			    $Ekle = VeriEkle('yorumlar', array('YorumlarRestoranID' => $RestoranID, 'YorumlarYorum' => R($Yorum), 'YorumlarTarih' => time()));
			    if ($Ekle) {

			    	echo '<span style="color: green;">'.$Yorum.'</span><hr />';

			    }else{

			    	echo '<span style="color: red;">'.$Yorum.'</span><hr />';

			    }

			}

		}else{

			$Yorumlar = array();

		}
		
		//exit();
		if (count($Yorumlar)) {

			Q("UPDATE genelayarlar SET MekanYorumSayisi=MekanYorumSayisi+1");
			VeriGuncelle('restoranlar', array('RestoranYorumSayisi' => $YorumSayisi), "RestoranID='$RestoranID'");

		}else{

			Q("UPDATE restoranlar SET RestoranYorumHata=RestoranYorumHata+1 WHERE RestoranID='$RestoranID'");

		}

		echo '<br /><br />';

	}

}


?>