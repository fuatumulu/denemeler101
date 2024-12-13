
<link href="./vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="./vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="./vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="./vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="./vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<!-- page content -->
<div class="right_col" role="main">

	<div class="col-md-12 col-sm-12 col-xs-12">
    <?php
    	
		
		if (isset($_POST['Onayla'])) {

			$Onaylanan = 0;
			$Hatali = 0;
			$Onaylanacaklar = $_POST['Onayla'];
			foreach ($Onaylanacaklar as $Onaylanacak) {


		    	if (isset($_POST['SecilenleriSil'])) {

			        $Sonuc = VeriSil('restoranlar', "RestoranID='$Onaylanacak'");

		    	}else{

					$Sonuc = VeriGuncelle('restoranlar', array('RestoranDurum' => 1), "RestoranID='$Onaylanacak'");

		    	}

				if ($Sonuc) {

					$Onaylanan++;

				}else{

					$Hatali++;

				}


			}

			if ($Onaylanan) {

				$OlumluMesaj = 'Toplam '.$Onaylanan.' Restoran '.(isset($_POST['SecilenleriSil'])?'Silindi':'Onaylandı');

			}

			if ($Hatali) {

				$Hata = 'Toplam '.$Hatali.' Restoran '.(isset($_POST['SecilenleriSil'])?'Silinemedi':'Onaylanamadı');

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

		}

	?>
		<div class="col-md-12 col-xs-12">

			<?php if(!empty($OlumluMesaj)){ OlumluMesaj($OlumluMesaj); }?>
			<?php if(!empty($Hata)){ HataMesaji($Hata); }?>

		</div>

	    <div class="x_panel">

	        <div class="x_content">
	        	<form action="" method="POST">
		            <table class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
		                <thead>
		                    <tr>
		                        <th style="width: 5%; text-align: center;">Say</th>
		                        <th>Restoran Adı</th>
		                        <th>Place ID</th>
		                        <th>Rating</th>
		                        <th style="text-align: center;">Tarih</th>
		                        <th style="text-align: center;">Durum</th>
		                        <th style="text-align: center;">İşlem</th>
		                    </tr>
		                </thead>

		                <tbody>
		                <?php

							$ToplamRestoran = VeriSay('restoranlar', 'RestoranID', "RestoranDurum='2'");

			                $Limit = 500;
			                $AktifSayfa = isset($_GET['Sayfasi']) && is_numeric($_GET['Sayfasi'])?$_GET['Sayfasi']:1;
			                $Baslangic  = ($AktifSayfa * $Limit) - $Limit; 

			                $Durum = 'Aktif';
		                	$Say = 0;
		                	$Restoranlar = VerileriVer('restoranlar', false, "RestoranDurum='2'", $Limit, false, $Baslangic);
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
		                        <td align="center"><input type="checkbox" name="Onayla[]" value="<?=$RestoranID?>" class="Secilenler"></td>
		                        <td><?=$Restoran['RestoranMekanAdi']?></td>
		                        <td><?=$Restoran['RestoranPlaceID']?></td>
		                        <td><?=$Restoran['RestoranRating']?></td>
		                        <td align="center"><?=date('d.m.Y H:i:s', $Restoran['RestoranTarih'])?></td>
		                        <td align="center"><?=$Durum?></td>
		                        <td>
		                        	<a href="index.php?Sayfa=Restoranlar&Sil=<?=$RestoranID?>" onclick="if(confirm('<?=$Restoran['RestoranMekanAdi']?> Manşeti Silinsin mi?')){ return true; }else{ return false;}" style="width: 48%; float: left;">
		                        		<button type="button" class="btn btn-danger btn-xs" style="width: 100%;">Sil</button>
		                        	</a>
		                        	<a href="index.php?Sayfa=RestoranDuzenle&ID=<?=$RestoranID?>" style="width: 48%; float: left; margin-left: 5px;">
		                        		<button type="button" class="btn btn-warning btn-xs" style="width: 100%;">Düzenle</button>
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
					            <button type="submit" class="btn btn-success">Onayla</button>
					            <button type="submit" name="SecilenleriSil" class="btn btn-danger">Seçilenleri Sil</button>

		            		<?php

		            	}
		            ?>
	            </form>
				<nav aria-label="Page navigation example">
					<ul class="pagination">
			            <?php
			                $ToplamSayfa = ceil($ToplamRestoran / $Limit);
			                
			                if($AktifSayfa > 1){

			                	echo '<li class="page-item"><a class="page-link" href="index.php?Sayfa=Onaylanacaklar&Sayfasi='.($AktifSayfa-1).'">Önceki</a></li>';

			                }

			               	for($x = - 3; $x <= $ToplamSayfa; $x++){
		                
			                    if(($x > 0) && ($x > $AktifSayfa-3) && ($x < $AktifSayfa+3)){

			                    	if ($AktifSayfa == $x) {
			                    		
			                    		echo '<li class="page-item active"><a class="page-link">'.$x.'</a></li>';

			                    	}else{

			                    		echo '<li class="page-item"><a class="page-link" href="index.php?Sayfa=Onaylanacaklar&Sayfasi='.$x.'">'.$x.'</a></li>';

			                    	}

			                    }

		                    }

			                if($AktifSayfa < $ToplamSayfa){

			                	echo '<li class="page-item"><a class="page-link" href="index.php?Sayfa=Onaylanacaklar&Sayfasi='.($AktifSayfa+1).'">Sonraki</a></li>';

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