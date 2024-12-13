<?php
ob_start();

require('Baglan.php');
require('Fonksiyonlar.php');


$GenelAyarlar = VerileriVer('genelayarlar');
$GenelAyarlar = end($GenelAyarlar);

$GenelAyarlar['SiteURL'] = 'https://locationoverworld.com';
$Kodlar = '<!-- Örnek Kodlar -->';

$Reklamlar = VerileriVer('reklamlar');
$Reklamlar = end($Reklamlar);

$EngellenecekSiteler = $GenelAyarlar['EngellenecekRefler'];

ReklamKontrol($EngellenecekSiteler);

$Sayfa = isset($_GET['Sayfa'])?G('Sayfa'):'';

switch($Sayfa){

	default:
		$GenelBaslik = $GenelAyarlar['SiteBaslik'];
		$PhpSayfa = 'Orta.php';
		break;
	
	case 'ManageListing':
		$GenelBaslik = 'Manage Listing - '.$GenelAyarlar['SiteBaslik'];
		$PhpSayfa = 'ManageListing.php';
		break;

	case'Detay':

		$Sef = R($_GET['Sef']);
		
		if (!empty($Sef)) {
			
			$RestoranBilgisi = VerileriVer('restoranlar', false, "RestoranSef='$Sef' AND RestoranDurum='1'");
			if ($RestoranBilgisi) {

				$RestoranBilgisi = end($RestoranBilgisi);

				$GenelBaslik = $RestoranBilgisi['RestoranMekanAdi'].' - '.$GenelAyarlar['SiteBaslik'];
				$PhpSayfa = 'Detay.php';

			}else{
				
				file_put_contents('Hatalilar.log', $GenelAyarlar['SiteURL'].'/'.$Sef."|||||||".$_SERVER['HTTP_USER_AGENT']."|||||||".getenv("REMOTE_ADDR")."\n", FILE_APPEND);
				$GenelBaslik = $GenelAyarlar['SiteBaslik'];
				$PhpSayfa = 'Orta.php';

			}
			
		}else{

			$GenelBaslik = $GenelAyarlar['SiteBaslik'];
			$PhpSayfa = 'Orta.php';

		}
		break;

	case'Pages':

		$SayfaID = R($_GET['ID']);
		$SayfaBilgisi = VerileriVer('sayfalar', false, "SayfaID='$SayfaID' AND SayfaDurum='1'");

		if ($SayfaBilgisi) {

			$SayfaBilgisi = end($SayfaBilgisi);

			$GenelBaslik = $SayfaBilgisi['SayfaBaslik'].' - '.$GenelAyarlar['SiteBaslik'];
			$PhpSayfa = 'Sayfa.php';

		}else{

			$GenelBaslik = $GenelAyarlar['SiteBaslik'];
			$PhpSayfa = 'Orta.php';

		}

		break;
		
	case 'Mekanlar':

		$GenelBaslik = $GenelAyarlar['SiteBaslik'];
		$PhpSayfa = 'Orta.php';

		$UlkeKodu = G('UlkeKod');
	    $UlkeBilgisi = VerileriVer('ulkeler', false, "UlkeKisaKodu='$UlkeKodu'");
	    if ($UlkeBilgisi) {

	    	$UlkeBilgisi = end($UlkeBilgisi);
	    	$UlkeID = $UlkeBilgisi['UlkeID'];
	    	$UlkeKisaKodu = $UlkeBilgisi['UlkeKisaKodu'];

			$GenelBaslik = $UlkeBilgisi['UlkeBaslik'].' | '.$GenelAyarlar['SiteBaslik'];
			$PhpSayfa = 'Mekanlar.php';

	    }

		break;

	case 'AramaSonucu':
		$GenelBaslik = 'Search - '.$GenelAyarlar['SiteBaslik'];
		$PhpSayfa = 'AramaSonucu.php';

		if (isset($_GET['Kelime'])) {
			
			$Kelime = htmlspecialchars(htmlentities(G('Kelime')));
			$GenelBaslik = $Kelime.' - '.$GenelAyarlar['SiteBaslik'];
			$PhpSayfa = 'AramaSonucu.php';

		}

		break;


}

if ($PhpSayfa == 'ManageListing.php' || $PhpSayfa == 'Detay.php' || $PhpSayfa == 'Sayfa.php') {

	require($PhpSayfa);

}else{

	require('Ust.php');
	require($PhpSayfa);
	require('Alt.php');

}

?>