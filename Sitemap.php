<?php

require('Baglan.php');
require('Fonksiyonlar.php');

header('Content-type: Application/xml; charset="utf8"', true);
$GenelAyarlar = VerileriVer('genelayarlar');
$GenelAyarlar = end($GenelAyarlar);

?>
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <?php

	    $Site = $_SERVER['HTTP_HOST'];
	    $Tarih = date("Y-m-d") . "T" . date('H:i:s') . "+00:00";

		$Limit = 250;

        $AktifSayfa = isset($_GET['Sayfasi']) && is_numeric($_GET['Sayfasi'])?$_GET['Sayfasi']:1;
        $Baslangic  = ($AktifSayfa * $Limit) - $Limit; 

		$Restoranlar = VerileriVer('restoranlar', false, "RestoranDurum='1'", $Limit, false, $Baslangic);
		foreach ($Restoranlar as $Restoran) {
		?>
        <url>
            <loc><?=$GenelAyarlar['SiteURL']?>/<?=$Restoran['RestoranSef']?></loc>
            <lastmod><?=$Tarih?></lastmod>
            <changefreq>daily</changefreq>
            <priority>1.00</priority>
        </url>
    <?php } ?>


</urlset>