<?php header('Content-Type: application/json; charset=utf-8');


header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require('Baglan.php');
require('Fonksiyonlar.php');

if (isset($_GET['MekanVer'])) {
	
	$Sonuclar = array('Durum' => 0, 'Mesaj' => 'Mekan Bulunamadı');


	//$Bilgiler = VerileriVer("restoranlar", false, "RestoranResimDurum='0'", 1, "RestoranID ASC");
	$Bilgiler = VerileriVer("restoranlar", false, false, 1, "RestoranResimDurum ASC");
	if ($Bilgiler) {

		$Bilgiler = end($Bilgiler);

		$RestoranID = (int) $Bilgiler['RestoranID'];
		$RestoranPlaceID = $Bilgiler['RestoranPlaceID'];

		$RestoranID2 = $Bilgiler['RestoranID'];
		VeriGuncelle('restoranlar', array('RestoranResimDurum' => time()), "RestoranID='$RestoranID2'");

		$Tarih = time();
		//Q("UPDATE restoranlar SET RestoranResimDurum ='$Tarih' WHERE RestoranID='$RestoranID2'");

		$Sonuclar = array();
		$Sonuclar['Durum'] = 1;
		$Sonuclar['RestoranID'] = (int) $RestoranID;
		$Sonuclar['RestoranPlaceID'] = $RestoranPlaceID;

		$Sonuclar['Baglanti'] = 'https://www.google.com/maps/place/?hl=en&q=place_id:'.$RestoranPlaceID;

	}


	echo json_encode($Sonuclar, JSON_UNESCAPED_UNICODE);

}elseif (isset($_GET['DosyaKaydet']) || isset($_GET['UrlBilgisi'])) {

	$RestoranID = G('RestoranID');
	if (isset($_FILES['KaynakKod']['tmp_name'])) {

	    $dosyaYolu = $_FILES['KaynakKod']['tmp_name'];

	    $icerik = file_get_contents($dosyaYolu);
		$Resimler = GoogleScraperData2(false, $icerik);

	}elseif ( isset($_GET['UrlBilgisi']) ) {

		$Baglanti = 'https://www.google.com'.urldecode($_GET['UrlBilgisi']);

		$Resimler = GoogleScraperData2($Baglanti);

	}

	$Limit = 8;
	$ToplamResim = VeriSay('resimler', 'ResimID', "ResimRestoranID='$RestoranID'");

	$Sonuclari = array();
	if (!empty($Resimler)) {

		$Sonuc = "";
		foreach ($Resimler as $Resim) {

			if ($ToplamResim < $Limit) {

				$Kontrol = VeriSay('resimler', 'ResimID', "ResimGoogleResimID='$Resim'");
				if (!$Kontrol) {
					
					$Veri = array(
						'ResimRestoranID' => $RestoranID,
						'ResimGoogleResimID' => $Resim,
						'ResimTarih' => time()
					);
					
					$Ekle = VeriEkle('resimler', $Veri);
					if ($Ekle) {
							
						$ToplamResim++;
						$Sonuclari[] = $Resim.' Eklendi'."\n<br />";

					}else{

						$Sonuclari[] = $Resim.' Eklenemedi'."\n<br />";

					}

				}else{

					$Sonuclari[] = $Resim.' Daha önce eklenmiş'."\n<br />";

				}

			}

		}

	}

	$Sonuclar = array('Mesaj' => $Sonuclari);
	$Sonuclar = array('Durum' => 1, 'Mesaj' => 'Veri Eklendi');
	echo json_encode($Sonuclar, JSON_UNESCAPED_UNICODE);

}

?>