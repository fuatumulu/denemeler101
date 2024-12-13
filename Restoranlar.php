<?php
	set_time_limit(0);
	require '../vendor/autoload.php';
	use PhpOffice\PhpSpreadsheet\IOFactory;

?>
<link href="./vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="./vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="./vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="./vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="./vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<!-- page content -->
<div class="right_col" role="main">

	<div class="col-md-12 col-sm-12 col-xs-12">
    <?php
    	
		if (isset($_POST['TopluSil'])) {

			$Silinen = 0;
			$Hatali = 0;
			$Silinecekler = $_POST['Silinecekler'];
			foreach ($Silinecekler as $Silinecek) {

		        $VeriSil = VeriSil('restoranlar', "RestoranID='$Silinecek'");

				if ($VeriSil) {

					$Silinen++;

				}else{

					$Hatali++;

				}


			}

			if ($Silinen) {

				$OlumluMesaj = 'Toplam '.$Silinen.' Restoran Silindi';

			}

			if ($Hatali) {

				$Hata = 'Toplam '.$Hatali.' Restoran Silinemedi';

			}

		}elseif(isset($_POST['ExcelDosyasiEkle'])){

    		$ExcelDosyasi = $_FILES["ExcelDosyasi"];
	        $Uzantisi = strtolower(pathinfo($ExcelDosyasi['name'],PATHINFO_EXTENSION));

	        $YeniAdi = 'ExcelDosyalari/'.uniqid().'.'.$Uzantisi;
	        if (move_uploaded_file($ExcelDosyasi["tmp_name"], $YeniAdi)) {


				$Spreadsheet = IOFactory::load($YeniAdi);
				$CalismaSayfasi = $Spreadsheet->getActiveSheet();

	            $OlumluMesaj = '';
	            $Hata = '';

				foreach ($CalismaSayfasi->getRowIterator() as $Keys => $Satir) {
				    $SatirNumarasi = $Satir->getRowIndex();

	            	if ($Keys < 2) {

	            		continue;

	            	}

				    //$MekanAdi = $CalismaSayfasi->getCell('A' . $SatirNumarasi)->getValue();
	            	

	                $MekanAdi = R(trim($CalismaSayfasi->getCell('A' . $SatirNumarasi)->getValue()));
	                $Kategori = R(trim($CalismaSayfasi->getCell('E' . $SatirNumarasi)->getValue()));
	                $RestoranTipi = R(trim($CalismaSayfasi->getCell('C' . $SatirNumarasi)->getValue()));
	                $Adresi = R(trim($CalismaSayfasi->getCell('G' . $SatirNumarasi)->getValue()." ".$CalismaSayfasi->getCell('N' . $SatirNumarasi)->getValue()));
	                $Telefonu = R(trim($CalismaSayfasi->getCell('F' . $SatirNumarasi)->getValue()));
	                $Resim = R(trim($CalismaSayfasi->getCell('AE' . $SatirNumarasi)->getValue()));
	                $LokasyonLatitude = R(trim($CalismaSayfasi->getCell('P' . $SatirNumarasi)->getValue()));
	                $LokasyonLongitude = R(trim($CalismaSayfasi->getCell('Q' . $SatirNumarasi)->getValue()));
	                $AcikKalmaZamanlari = R(trim($CalismaSayfasi->getCell('AH' . $SatirNumarasi)->getValue()));
	                $YorumMesajlari = R(substr(trim($CalismaSayfasi->getCell('V' . $SatirNumarasi)->getValue()), 0, 199));
	                $RatingDetay = R(trim($CalismaSayfasi->getCell('X' . $SatirNumarasi)->getValue()));
	                $Rating = R(trim($CalismaSayfasi->getCell('T' . $SatirNumarasi)->getValue()));
	                $PlaceID = R(trim($CalismaSayfasi->getCell('AZ' . $SatirNumarasi)->getValue()));
	                $RestoranOzellikleri = R(trim($CalismaSayfasi->getCell('AL' . $SatirNumarasi)->getValue()));
	                $YorumSayisi = R(trim($CalismaSayfasi->getCell('U' . $SatirNumarasi)->getValue()));
		                
	                $Sef = SefYap(trim($CalismaSayfasi->getCell('A' . $SatirNumarasi)->getValue()).'-'.substr(trim($CalismaSayfasi->getCell('AZ' . $SatirNumarasi)->getValue()), -7));

	                $Durum = 1;
					$VeriSay = VeriSay('restoranlar', 'RestoranID', "RestoranPlaceID='$PlaceID'");
					if ($VeriSay) {

						$Durum = 2;
		                $Sef = SefYap(trim($CalismaSayfasi->getCell('A' . $SatirNumarasi)->getValue())."-$VeriSay-".substr(trim($CalismaSayfasi->getCell('AZ' . $SatirNumarasi)->getValue()), -7));

					}

	                $Veri = array(
	                	'RestoranMekanAdi' => $MekanAdi,
	                	'RestoranSef' => $Sef,
	                	'RestoranKategori' => $Kategori,
	                	'RestoranRestoranTipi' => $RestoranTipi,
	                	'RestoranAdresi' => $Adresi,
	                	'RestoranTelefonu' => $Telefonu,
	                	'RestoranResim' => $Resim,
	                	'RestoranLokasyonLatitude' => $LokasyonLatitude,
	                	'RestoranLokasyonLongitude' => $LokasyonLongitude,
	                	'RestoranAcikKalmaZamanlari' => $AcikKalmaZamanlari,
	                	'RestoranYorumMesajlari' => $YorumMesajlari,
	                	'RestoranRatingDetay' => $RatingDetay,
	                	'RestoranRating' => $Rating,
	                	'RestoranPlaceID' => $PlaceID,
	                	'RestoranOzellikleri' => $RestoranOzellikleri,
	                	'RestoranTarih' => time(),
	                	'RestoranDurum' => $Durum,
	                	'RestoranExcelYorum' => $YorumSayisi
	                );

	                $Ekle = VeriEkle('restoranlar', $Veri);
	                if ($Ekle) {
	                	
						$OlumluMesaj .= $MekanAdi.' restoranı eklendi<br />';

	                }else{

						$Hata .= $MekanAdi.' restoranı eklenemedi<br />';

	                }
										
	            }

	        }else{

	            $Hata = 'Excel dosyası yüklenemedi';

	        }

		}elseif(isset($_POST['ExcelDosyasiEkle22'])){

    		$ExcelDosyasi = $_FILES["ExcelDosyasi"];
	        $Uzantisi = strtolower(pathinfo($ExcelDosyasi['name'],PATHINFO_EXTENSION));

	        $YeniAdi = 'ExcelDosyalari/'.uniqid().'.'.$Uzantisi;
	        if (move_uploaded_file($ExcelDosyasi["tmp_name"], $YeniAdi)) {

	            require_once dirname(__FILE__) . '/ExcelClasses/PHPExcel.php';
	            
	            try {

	                $ExcellDosyasi = PHPExcel_IOFactory::load($YeniAdi);

	            } catch(Exception $e) {

	                if(file_exists($YeniAdi)){
	                    
	                    unlink($YeniAdi);

	                }

	                die('Excell Dosyası Yüklemede Hata Oluştu: => "'.pathinfo($ExcellDosyasi,PATHINFO_BASENAME).'": '.$e->getMessage());

	            }

	            /*
	            if(file_exists($YeniAdi)){
	                
	                unlink($YeniAdi);

	            }
	            */

	            $TumVeriler = $ExcellDosyasi->getActiveSheet()->toArray(null,true,true,true);


	            $OlumluMesaj = '';
	            $Hata = '';
	            foreach ($TumVeriler as $Keys => $Veri) {
	            	
	            	if ($Keys < 2) {

	            		continue;

	            	}

	                $MekanAdi = R(trim($Veri['A'])); // varchar 100
	                $Kategori = R(trim($Veri['E'])); // varchar 50
	                $RestoranTipi = R(trim($Veri['C'])); // varchar 50
	                $Adresi = R(trim($Veri['G']." ".$Veri['N'])); // varchar 150
	                $Telefonu = R(trim($Veri['F'])); // varchar 20
	                $Resim = R(trim($Veri['AE'])); // text
	                $LokasyonLatitude = R(trim($Veri['P'])); // varchar 20
	                $LokasyonLongitude = R(trim($Veri['Q'])); // varchar 20
	                $AcikKalmaZamanlari = R(trim($Veri['AH'])); // text
	                $YorumMesajlari = R(substr(trim($Veri['V']), 0, 199)); // varchar 200
	                $RatingDetay = R(trim($Veri['X'])); // varchar 60
	                $Rating = R(trim($Veri['T'])); // varchar 5
	                $PlaceID = R(trim($Veri['AZ'])); // varchar 50
	                $RestoranOzellikleri = R(trim($Veri['AL'])); // text
	                $YorumSayisi = R(trim($Veri['U'])); // text
	                
	                $Sef = SefYap(trim($Veri['A']).'-'.substr(trim($Veri['AZ']), -7));

	                $Durum = 1;
					$VeriSay = VeriSay('restoranlar', 'RestoranID', "RestoranPlaceID='$PlaceID'");
					if ($VeriSay) {

						$Durum = 2;
		                $Sef = SefYap(trim($Veri['A'])."-$VeriSay-".substr(trim($Veri['AZ']), -7));

					}

	                $Veri = array(
	                	'RestoranMekanAdi' => $MekanAdi,
	                	'RestoranSef' => $Sef,
	                	'RestoranKategori' => $Kategori,
	                	'RestoranRestoranTipi' => $RestoranTipi,
	                	'RestoranAdresi' => $Adresi,
	                	'RestoranTelefonu' => $Telefonu,
	                	'RestoranResim' => $Resim,
	                	'RestoranLokasyonLatitude' => $LokasyonLatitude,
	                	'RestoranLokasyonLongitude' => $LokasyonLongitude,
	                	'RestoranAcikKalmaZamanlari' => $AcikKalmaZamanlari,
	                	'RestoranYorumMesajlari' => $YorumMesajlari,
	                	'RestoranRatingDetay' => $RatingDetay,
	                	'RestoranRating' => $Rating,
	                	'RestoranPlaceID' => $PlaceID,
	                	'RestoranOzellikleri' => $RestoranOzellikleri,
	                	'RestoranTarih' => time(),
	                	'RestoranDurum' => $Durum,
	                	'RestoranExcelYorum' => $YorumSayisi
	                );

	                $Ekle = VeriEkle('restoranlar', $Veri);
	                if ($Ekle) {
	                	
						$OlumluMesaj .= $MekanAdi.' restoranı eklendi<br />';

	                }else{

						$Hata .= $MekanAdi.' restoranı eklenemedi<br />';

	                }

	            }

	        }else{

	            $Hata = 'Excel dosyası yüklenemedi';

	        }

		}elseif (isset($_POST['Ekle'])) {

			$ResimBilgisi = '';
            $Resim = $_FILES['Resim'];
	        if(!empty($_FILES['Resim']['name'])){

	            require_once('ResimDuzenlemeClass.php');

	            $Klasor = '../images';
	            $LogoYolu = LogoYukle($Klasor, $_FILES['Resim'], uniqid());
	            if($LogoYolu['Durum']){

	                $ResimBilgisi = $LogoYolu['ResimYolu'];

	            }

	        }

			$MekanAdi = P('MekanAdi');
			$Kategori = P('Kategori');
			$RestoranTipi = P('RestoranTipi');
			$Adresi = P('Adres');
			$Telefonu = P('Telefon');
			$LokasyonLatitude = P('LokasyonLatitude');
			$LokasyonLongitude = P('LokasyonLongitude');
			$AcikKalmaZamanlari = P('AcikKalmaZamanlari');
			$YorumMesajlari = P('YorumMesajlari');
			$RatingDetay = P('RatingDetay');
			$Rating = P('Rating');
			$PlaceID = P('PlaceID');

	        $Sef = SefYap(trim($_POST['MekanAdi']).'-'.substr(trim($_POST['PlaceID']), -7));

            $Veri = array(
            	'RestoranMekanAdi' => $MekanAdi,
	            'RestoranSef' => $Sef,
            	'RestoranKategori' => $Kategori,
            	'RestoranRestoranTipi' => $RestoranTipi,
            	'RestoranAdresi' => $Adresi,
            	'RestoranTelefonu' => $Telefonu,
            	'RestoranResim' => $ResimBilgisi,
            	'RestoranLokasyonLatitude' => $LokasyonLatitude,
            	'RestoranLokasyonLongitude' => $LokasyonLongitude,
            	'RestoranAcikKalmaZamanlari' => $AcikKalmaZamanlari,
            	'RestoranYorumMesajlari' => $YorumMesajlari,
            	'RestoranRatingDetay' => $RatingDetay,
            	'RestoranRating' => $Rating,
            	'RestoranPlaceID' => $PlaceID,
            	'RestoranTarih' => time()
            );

            $Ekle = VeriEkle('restoranlar', $Veri);
            if ($Ekle) {
            	
				$OlumluMesaj .= $MekanAdi.' restoranı eklendi<br />';

            }else{

				$Hata .= $MekanAdi.' restoranı eklenemedi<br />';

            }

		}elseif (isset($_POST['Duzenle'])) {

			$ID = P('ID');

			$ResimBilgisi = false;
            $Resim = $_FILES['Resim'];
	        if(!empty($_FILES['Resim']['name'])){

	            require_once('ResimDuzenlemeClass.php');

	            $Klasor = '../images';
	            $LogoYolu = LogoYukle($Klasor, $_FILES['Resim'], uniqid());
	            if($LogoYolu['Durum']){

	                $ResimBilgisi = $LogoYolu['ResimYolu'];

	            }

	        }

			$MekanAdi = P('MekanAdi');
			$Kategori = P('Kategori');
			$RestoranTipi = P('RestoranTipi');
			$Adresi = P('Adres');
			$Telefonu = P('Telefon');
			$LokasyonLatitude = P('LokasyonLatitude');
			$LokasyonLongitude = P('LokasyonLongitude');
			$AcikKalmaZamanlari = P('AcikKalmaZamanlari');
			$YorumMesajlari = P('YorumMesajlari');
			$RatingDetay = P('RatingDetay');
			$Rating = P('Rating');
			$PlaceID = P('PlaceID');
			$RestoranChatGptYorum = P('RestoranChatGptYorum');
			$Durum = P('Durum');

	        $Sef = SefYap(trim($_POST['MekanAdi']).'-'.substr(trim($_POST['PlaceID']), -7));

            $Veri = array(
            	'RestoranMekanAdi' => $MekanAdi,
	            'RestoranSef' => $Sef,
            	'RestoranKategori' => $Kategori,
            	'RestoranRestoranTipi' => $RestoranTipi,
            	'RestoranAdresi' => $Adresi,
            	'RestoranTelefonu' => $Telefonu,
            	'RestoranLokasyonLatitude' => $LokasyonLatitude,
            	'RestoranLokasyonLongitude' => $LokasyonLongitude,
            	'RestoranAcikKalmaZamanlari' => $AcikKalmaZamanlari,
            	'RestoranYorumMesajlari' => $YorumMesajlari,
            	'RestoranRatingDetay' => $RatingDetay,
            	'RestoranRating' => $Rating,
            	'RestoranPlaceID' => $PlaceID,
            	'RestoranDurum' => $Durum,
            	'RestoranChatGptYorum' => $RestoranChatGptYorum
            );

            if ($ResimBilgisi) {
	            $Veri['RestoranResim'] = $ResimBilgisi;
            }

			$Sonuc = VeriGuncelle('restoranlar', $Veri, "RestoranID='$ID'");
			if(!$Sonuc){

				$Hata = '<strong>'.$MekanAdi.'</strong> Restoranı Düzenlenemedi.';

			}else{

				$OlumluMesaj = '<strong>'.$MekanAdi.'</strong> Restoranı Düzenlendi.';

			}

		}elseif (isset($_GET['Sil'])) {

	        $RestoranID = G('Sil');

	        $SilmeBilgisi = VerileriVer('restoranlar', false, "RestoranID='$RestoranID'", 1);
	        $SilmeBilgisi = end($SilmeBilgisi);

	        $VeriSil = VeriSil('restoranlar', "RestoranID='$RestoranID'");
	        if($VeriSil){

	            $OlumluMesaj = '<strong>'.$SilmeBilgisi['RestoranMekanAdi'].'</strong> Restoranı Silindi.';

	        }else{

	            $Hata = '<strong>'.$SilmeBilgisi['RestoranMekanAdi'].'</strong> Restoranı Silinemedi.';

	        }

		}elseif (isset($_GET['YorumlariSil'])) {

	        $RestoranID = G('YorumlariSil');

	        $SilmeBilgisi = VerileriVer('restoranlar', false, "RestoranID='$RestoranID'", 1);
	        $SilmeBilgisi = end($SilmeBilgisi);

	        $VeriSil = VeriSil('yorumlar', "YorumlarRestoranID='$RestoranID'");
	        if($VeriSil){

	        	Q("UPDATE genelayarlar SET MekanYorumSayisi=MekanYorumSayisi-1");
	        	VeriGuncelle('restoranlar', array('RestoranYorumSayisi' => 0, 'RestoranYorumHata' => 0), "RestoranID='$RestoranID'");
	            $OlumluMesaj = '<strong>'.$SilmeBilgisi['RestoranMekanAdi'].'</strong> Restoranına Ait Yorumlar Silindi.';

	        }else{

	            $Hata = '<strong>'.$SilmeBilgisi['RestoranMekanAdi'].'</strong> Restoranına Ait Yorumlar Silinemedi.';

	        }

		}elseif (isset($_POST['TumunuSil'])) {

			Q("TRUNCATE `restoranlar`");
			
		}

	?>
		<div class="col-md-12 col-xs-12">

			<?php if(!empty($OlumluMesaj)){ OlumluMesaj($OlumluMesaj); }?>
			<?php if(!empty($Hata)){ HataMesaji($Hata); }?>

		</div>


		<form class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data">

			<div class="x_panel">

				<div class="x_content">

					<div class="form-group">
						<div class="col-md-10 col-sm-10 col-xs-10">
							<input type="text" class="form-control" value="" name="MekanAdi" placeholder="Aranacak Mekanı Yazın">
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="submit" class="btn btn-success" style="width: 100%" value="Ara" name="Ara">
						</div>
					</div>

				</div>

			</div>

		</form>

	    <div class="x_panel">

	        <div class="x_content">
	        	<form action="" method="POST">
		            <table class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
		                <thead>
		                    <tr>
		                        <th style="width: 5%; text-align: center;">Sil</th>
		                        <th style="width: 5%; text-align: center;">Say</th>
		                        <th style="width: 25%;">Restoran Adı</th>
		                        <th style="width: 20%; text-align: center;">Place ID</th>
		                        <th style="text-align: center;">Yorum</th>
		                        <th style="text-align: center;">Tarih</th>
		                        <th style="text-align: center;">Durum</th>
		                        <th style="text-align: center;">İşlem</th>
		                    </tr>
		                </thead>

		                <tbody>
		                <?php

		                	$Limit = 500;
		                	$SQL = "RestoranDurum='1'";
		                	if (isset($_POST['Ara'])) {
		                		
		                		$MekanAdi = P('MekanAdi');
		                		$SQL = "RestoranMekanAdi LIKE '%$MekanAdi%' AND RestoranDurum='1'";
			                	$Limit = 1500;

		                	}

							$ToplamRestoran = VeriSay('restoranlar', 'RestoranID', $SQL);

			                $AktifSayfa = isset($_GET['Sayfasi']) && is_numeric($_GET['Sayfasi'])?$_GET['Sayfasi']:1;
			                $Baslangic  = ($AktifSayfa * $Limit) - $Limit; 

			                $Durum = 'Aktif';
		                	$Say = 0;
		                	$Restoranlar = VerileriVer('restoranlar', false, $SQL, $Limit, false, $Baslangic);
		                	foreach ($Restoranlar as $Restoran) {

		                		$Say++;
		                		$RestoranID = $Restoran['RestoranID'];

		                		if ($Restoran['RestoranDurum'] == 1) {
		                			
					                $Durum = 'Aktif';

		                		}elseif ($Restoran['RestoranDurum'] == 2) {
					               
					                $Durum = 'Onaylanacak';

		                		}else{

					                $Durum = 'Pasif';

		                		}
						?>
		                    <tr>
			                    <td align="center"><input type="checkbox" name="Silinecekler[]" value="<?=$RestoranID?>" class="Secilenler"></td>
		                        <td align="center"><?=$Say?></td>
		                        <td><?=$Restoran['RestoranMekanAdi']?></td>
		                        <td><?=$Restoran['RestoranPlaceID']?></td>
		                        <td align="center"><?=$Restoran['RestoranYorumSayisi']?></td>
		                        <td align="center"><?=date('d.m.Y H:i:s', $Restoran['RestoranTarih'])?></td>
		                        <td align="center"><?=$Durum?></td>
		                        <td>
		                        	<a href="index.php?Sayfa=Restoranlar&YorumlariSil=<?=$RestoranID?>" onclick="if(confirm('<?=$Restoran['RestoranMekanAdi']?> Restoranına Ait Yorumlar Silinsin mi?')){ return true; }else{ return false;}" style="width: 48%; float: left;">
		                        		<button type="button" class="btn btn-info btn-xs" style="width: 100%;">Yorumları Sil</button>
		                        	</a>
		                        	<a href="index.php?Sayfa=Restoranlar&Sil=<?=$RestoranID?>" onclick="if(confirm('<?=$Restoran['RestoranMekanAdi']?> Restoranı Silinsin mi?')){ return true; }else{ return false;}" style="width: 48%; float: left; margin-left: 5px;">
		                        		<button type="button" class="btn btn-danger btn-xs" style="width: 100%;">Sil</button>
		                        	</a>
		                        	<a href="index.php?Sayfa=RestoranDuzenle&ID=<?=$RestoranID?>" style="width: 48%; float: left;">
		                        		<button type="button" class="btn btn-warning btn-xs" style="width: 100%;">Düzenle</button>
		                        	</a>
		                        	<a href="<?=$GenelAyarlar['SiteURL']?>/<?=$Restoran['RestoranSef']?>" style="width: 48%; float: left; margin-left: 5px;" target="_blank">
		                        		<button type="button" class="btn btn-success btn-xs" style="width: 100%;">Görüntüle</button>
		                        	</a>
		                        </td>
		                    </tr>
		                <?php }?>
		                </tbody>
		            </table>
		            <?php
		            	if ($ToplamRestoran) {
		            		
		            		?>

					            <div class="btn btn-primary" onclick="TumunuSec()">Tümünü Seç</div>
					            <button type="submit" class="btn btn-danger" name="TopluSil">Seçilenleri Sil</button>

		            		<?php

		            	}
		            ?>
	            </form>

	            <form action="" method="POST" onsubmit='return confirm("Tüm mekanlar silinsin mi?");'>
					<button type="submit" class="btn btn-danger" name="TumunuSil">Tüm Mekanları Sil</button>
	            </form>
				<nav aria-label="Page navigation example">
					<ul class="pagination">
			            <?php
			                $ToplamSayfa = ceil($ToplamRestoran / $Limit);
			                
			                if($AktifSayfa > 1){

			                	echo '<li class="page-item"><a class="page-link" href="index.php?Sayfa=Restoranlar&Sayfasi='.($AktifSayfa-1).'">Önceki</a></li>';

			                }

			               	for($x = - 3; $x <= $ToplamSayfa; $x++){
		                
			                    if(($x > 0) && ($x > $AktifSayfa-3) && ($x < $AktifSayfa+3)){

			                    	if ($AktifSayfa == $x) {
			                    		
			                    		echo '<li class="page-item active"><a class="page-link">'.$x.'</a></li>';

			                    	}else{

			                    		echo '<li class="page-item"><a class="page-link" href="index.php?Sayfa=Restoranlar&Sayfasi='.$x.'">'.$x.'</a></li>';

			                    	}

			                    }

		                    }

			                if($AktifSayfa < $ToplamSayfa){

			                	echo '<li class="page-item"><a class="page-link" href="index.php?Sayfa=Restoranlar&Sayfasi='.($AktifSayfa+1).'">Sonraki</a></li>';

			                }

			            ?>
					</ul>
				</nav>

	        </div>

	    </div>

	</div>

</div>
<script type="text/javascript">

    function TumunuSec(){

        $(".Secilenler").each(function(){
        
            if(this.checked){
                this.checked = false;
            }else{
                this.checked = true;
            }
        
        });

    }

</script>