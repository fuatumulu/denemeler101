<?php
ob_start();

require('../Baglan.php');
require('../Fonksiyonlar.php');

if(GirisKontrol() != 1){

	exit('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=./Giris.php">');

}

$FooterLinkGrublar = array('REAL ESTATE', 'REAL ESTATE 2');

$KullaniciBilgileri = KullaniciBilgileri();
$KullaniciID = $KullaniciBilgileri['KullaniciID'];

$GenelAyarlar = VerileriVer('genelayarlar');
$GenelAyarlar = end($GenelAyarlar);

$Sayfa = isset($_GET['Sayfa'])?G('Sayfa'):'';

switch($Sayfa){

	default:
		$GenelBaslik = 'Yönetici Paneli';
		$PhpSayfa = 'Orta.php';
		break;
		
	case'GenelAyarlar':
		$GenelBaslik = 'Genel Ayarlar';
		$PhpSayfa = 'GenelAyarlar.php';
		break;
		
	case'RestoranEkle':
		$GenelBaslik = 'Restoran Ekle';
		$PhpSayfa = 'RestoranEkle.php';
		break;
		
	case'Restoranlar':
		$GenelBaslik = 'Restoranlar';
		$PhpSayfa = 'Restoranlar.php';
		break;

	case'RestoranDuzenle':
		$GenelBaslik = 'Restoran Düzenle';
		$PhpSayfa = 'RestoranDuzenle.php';
		break;

	case'Onaylanacaklar':
		$GenelBaslik = 'Onaylanacak Restoranlar';
		$PhpSayfa = 'Onaylanacaklar.php';
		break;

	case'Sayfalar':
		$GenelBaslik = 'Sayfalar';
		$PhpSayfa = 'Sayfalar.php';
		break;

	case'SayfaEkle':
		$GenelBaslik = 'Sayfa Ekle';
		$PhpSayfa = 'SayfaEkle.php';
		break;

	case'SayfaDuzenle':
		$GenelBaslik = 'Sayfa Düzenle';
		$PhpSayfa = 'SayfaDuzenle.php';
		break;

	case'Reklamlar':
		$GenelBaslik = 'Reklamlar';
		$PhpSayfa = 'Reklamlar.php';
		break;

	case'TumUrller':
		$GenelBaslik = 'Tüm Urller';
		$PhpSayfa = 'TumUrller.php';
		break;
		
	case'Proxyler':
		$GenelBaslik = 'Proxyler';
		$PhpSayfa = 'Proxyler.php';
		break;

	case'ProxyEkle':
		$GenelBaslik = 'Proxy Ekle';
		$PhpSayfa = 'ProxyEkle.php';
		break;

	case'ProxyDuzenle':
		$GenelBaslik = 'Proxy Düzenle';
		$PhpSayfa = 'ProxyDuzenle.php';
		break;

	case'Ulkeler':
		$GenelBaslik = 'Ülkeler';
		$PhpSayfa = 'Ulkeler.php';
		break;
		
	case'UlkeEkle':
		$GenelBaslik = 'Ülke Ekle';
		$PhpSayfa = 'UlkeEkle.php';
		break;
		
	case'UlkeDuzenle':
		$GenelBaslik = 'Ülke Düzenle';
		$PhpSayfa = 'UlkeDuzenle.php';
		break;
		
	case'ChatGPTApileri':
		$GenelBaslik = 'Chat GPT Apileri';
		$PhpSayfa = 'ChatGPTApileri.php';
		break;
		
	case'ChatGptPromtlar':
		$GenelBaslik = 'Chat GPT Promtları';
		$PhpSayfa = 'ChatGptPromtlar.php';
		break;
		
	case'ChatGptPromtEkle':
		$GenelBaslik = 'Chat Gpt Promt Ekle';
		$PhpSayfa = 'ChatGptPromtEkle.php';
		break;
		
	case'ChatGptPromtDuzenle':
		$GenelBaslik = 'Chat Gpt Promt Düzenle';
		$PhpSayfa = 'ChatGptPromtDuzenle.php';
		break;

	case'FooterLinkler':
		$GenelBaslik = 'Footer Linkler';
		$PhpSayfa = 'FooterLinkler.php';
		break;
		
	case'FooterLinkEkle':
		$GenelBaslik = 'Footer Link Ekle';
		$PhpSayfa = 'FooterLinkEkle.php';
		break;
		
	case'FooterLinkDuzenle':
		$GenelBaslik = 'Footer Link Düzenle';
		$PhpSayfa = 'FooterLinkDuzenle.php';
		break;

	case'Cikis':
		if(CikisYap()){

			Git('../');

		}else{

			exit('Çıkışta hata var.');

		}
		break;
		
}

require("Ust.php");
require("Sol.php");
require("UstMenu.php");
require($PhpSayfa);
require("Alt.php");

?>