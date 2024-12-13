<?php 
require('../Baglan.php');
require('../Fonksiyonlar.php');

ignore_user_abort(true);
set_time_limit(0);

if (isset($_GET['ID'])) {

	$RestoranID = G('ID');
	$ChatgptKey = G('ChatgptKey');
	$Bilgiler = VerileriVer("restoranlar", false, "RestoranID='$RestoranID'");
	if ($Bilgiler) {

		$Bilgiler = end($Bilgiler);
		
		sleep(rand(1,5));
		
		$RestoranID = $Bilgiler['RestoranID'];
		$UlkeID = $Bilgiler['RestoranUlkeID'];
		$MekanAdi = $Bilgiler['RestoranMekanAdi'];
		$Adresi = $Bilgiler['RestoranAdresi'];

		$TumYorumlar = array();
		$Yorumlar = VerileriVer('yorumlar', false, "YorumlarRestoranID='$RestoranID'", 8);
		foreach ($Yorumlar as $Yorum) {
			
			$TumYorumlar[] = $Yorum['YorumlarYorum'];

		}

		$PromtBilgisi = VerileriVer('chatgptpromt', false, "ChatGptPromtUlkeID='$UlkeID'", 1);
		if ($PromtBilgisi) {
			
			$PromtBilgisi = end($PromtBilgisi);

			$ChatGptPromtYorum = $PromtBilgisi['ChatGptPromtYorum'];
			$ChatGptPromtYorumsuz = $PromtBilgisi['ChatGptPromtYorumsuz'];

		}


		$KacSeferDenesin = 3;
		$AranacakBaslik = $TumYorumlar?$ChatGptPromtYorum:$ChatGptPromtYorumsuz;
		
		$Yorumlar = implode("\n\n", $TumYorumlar);
		$AranacakBaslik = str_replace(array('{MekanAdi}', '{Adres}', '{Yorumlar}'), array($MekanAdi, $Adresi, $Yorumlar), $AranacakBaslik);

		$Sonuc = ChatGptAra2($AranacakBaslik, $ChatgptKey, $KacSeferDenesin);
		if ($Sonuc['Durum'] == 1) {
			
			$Mesaj = R($Sonuc['Mesaj']);
			VeriGuncelle('restoranlar', array('RestoranChatGptYorum' => $Mesaj), "RestoranID='$RestoranID'");
			echo '<a href="./Yonetici/index.php?Sayfa=RestoranDuzenle&ID='.$RestoranID.'">'.$MekanAdi.'</a> Mekanı Güncellendi<br />';
			Q("UPDATE chatgptapi SET ChatGptApiNot='', ChatGptApiHataSayisi='0' WHERE ChatGptApiKey='$ChatgptKey'");

		}elseif ($Sonuc['Durum'] == 2) {
			
			$Mesaj = R($Sonuc['Mesaj']);
			VeriGuncelle('chatgptapi', array('ChatGptApiNot' => $Mesaj), "ChatGptApiKey='$ChatgptKey'");

			$Tarih = ($Tarih + 300);
			Q("UPDATE chatgptapi SET ChatGptApiSonKullanim='$Tarih', ChatGptApiHataSayisi=ChatGptApiHataSayisi+1 WHERE ChatGptApiKey='$ChatgptKey'");

			echo $ChatgptKey.' Api Keyde Hata Meydana Geldi. '.$Mesaj.'<br />';

		}else{

			echo $ChatgptKey.' Api Keyde Hata Meydana Geldi.<br />';

		}

	}else{

		echo 'Mekan Bulunamadı<br />';

	}

}else{

	/*
	$Bilgiler = VerileriVer("restoranlar", false, "RestoranChatGptYorum IS NULL", 8);
	foreach ($Bilgiler as $Bilgi) {

		$RestoranID = $Bilgi['RestoranID'];

		$Domain = 'https://placejuice.com/Yonetici/CronChatGpt.php?ID='.$RestoranID;
		echo $Domain.'<br />';
		
	    $Curl = curl_init ();
	    curl_setopt($Curl, CURLOPT_URL, $Domain);
	    curl_setopt($Curl, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($Curl, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($Curl, CURLOPT_FOLLOWLOCATION, 1);
	    curl_setopt($Curl, CURLOPT_CONNECTTIMEOUT, 3); 
	    curl_setopt($Curl, CURLOPT_TIMEOUT, 3);
	    $Kaynak = curl_exec ($Curl);
	    curl_close($Curl);

	}
	*/

	$SuankiZaman = time();
	$Apiler = array();
	$ApiBilgileri = VerileriVer("chatgptapi", false, "ChatGptApiDurum='1' AND ChatGptApiSonKullanim < $SuankiZaman", false, "ChatGptApiSonKullanim ASC");
	foreach ($ApiBilgileri as $ApiBilgi) {

		$Apiler[] = array('ChatGptApiID' => $ApiBilgi['ChatGptApiID'], 'ChatGptApiKey' => $ApiBilgi['ChatGptApiKey']);

	}


	$Say = 0;
	$Domainler = array();
	$Bilgiler = VerileriVer("restoranlar", false, "RestoranChatGptYorum IS NULL", 12);
	foreach ($Bilgiler as $Bilgi) {

		$RestoranID = $Bilgi['RestoranID'];

		if (empty($Apiler[$Say])) {

			$Say = 0;

			if (empty($Apiler[$Say])) {

				echo 'Api Key Bulunamadı<br />';
				continue;

			}

		}

		$ApiBilgisi = $Apiler[$Say];

		$Say++;

		$ChatGptApiID = $ApiBilgisi['ChatGptApiID'];
		$ChatgptKey = $ApiBilgisi['ChatGptApiKey'];

		$Tarih = time();
		Q("UPDATE chatgptapi SET ChatGptApiSonKullanim='$Tarih', ChatGptApiKullanimSayisi=ChatGptApiKullanimSayisi+1 WHERE ChatGptApiID='$ChatGptApiID'");

		$Domainler[] = 'https://placejuice.com/Yonetici/CronChatGpt.php?ID='.$RestoranID.'&ChatgptKey='.$ChatgptKey;

	}

	//PR($Domainler);
	CokluIstek($Domainler, false, 10);

}

echo '<br /><a href="./CronChatGpt.php?Denem='.time().rand().'">./CronChatGpt.php</a><br />';

?>