
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
			foreach ($Silinecekler as $UlkeID) {

		        $VeriSil = VeriSil('ulkeler', "UlkeID='$UlkeID'");
				if ($VeriSil) {

			        VeriSil('mekanlar', "MekanUlkeID='$UlkeID'");
					$Silinen++;

				}else{

					$Hatali++;

				}


			}

			if ($Silinen) {

				$OlumluMesaj = 'Toplam '.$Silinen.' Ülke Silindi';

			}

			if ($Hatali) {

				$Hata = 'Toplam '.$Hatali.' Ülke Silinemedi';

			}

		}elseif (isset($_POST['Ekle'])) {

			$UlkeAdi = P('UlkeAdi');
			$UlkeKisaKodu = P('UlkeKisaKodu');

            $Veri = array(
            	'UlkeBaslik' => $UlkeAdi,
            	'UlkeKisaKodu' => $UlkeKisaKodu,
            	'UlkeTarih' => time()
            );

            $Ekle = VeriEkle('ulkeler', $Veri);
            if ($Ekle) {
            	
				$OlumluMesaj = $UlkeAdi.' ülkesi eklendi<br />';

            }else{

				$Hata = $UlkeAdi.' ülkesi eklenemedi<br />';

            }

		}elseif (isset($_POST['Duzenle'])) {

			$ID = P('ID');

			$UlkeAdi = P('UlkeAdi');
			$UlkeKisaKodu = P('UlkeKisaKodu');
			
			$Durum = P('Durum');

            $Veri = array(
            	'UlkeBaslik' => $UlkeAdi,
            	'UlkeKisaKodu' => $UlkeKisaKodu,
            	'UlkeDurum' => $Durum
            );

			$Sonuc = VeriGuncelle('ulkeler', $Veri, "UlkeID='$ID'");
			if(!$Sonuc){

				$Hata = '<strong>'.$UlkeAdi.'</strong> Ülkesi Düzenlenemedi.';

			}else{

				$OlumluMesaj = '<strong>'.$UlkeAdi.'</strong> Ülkesi Düzenlendi.';

			}

		}elseif (isset($_GET['Sil'])) {

	        $UlkeID = G('Sil');

	        $SilmeBilgisi = VerileriVer('ulkeler', false, "UlkeID='$UlkeID'", 1);
	        $SilmeBilgisi = end($SilmeBilgisi);

	        $VeriSil = VeriSil('ulkeler', "UlkeID='$UlkeID'");
	        if($VeriSil){

		        VeriSil('mekanlar', "MekanUlkeID='$UlkeID'");

	            $OlumluMesaj = '<strong>'.$SilmeBilgisi['UlkeBaslik'].'</strong> Ülkesi Silindi.';

	        }else{

	            $Hata = '<strong>'.$SilmeBilgisi['UlkeBaslik'].'</strong> Ülkesi Silinemedi.';

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
		                        <th style="width: 5%; text-align: center;">Seç</th>
		                        <th style="width: 5%; text-align: center;">Say</th>
		                        <th style="">Ülke</th>
		                        <th style="text-align: center;">Tarih</th>
		                        <th style="text-align: center;">Durum</th>
		                        <th style="text-align: center;">İşlem</th>
		                    </tr>
		                </thead>

		                <tbody>
			                <?php

								$ToplamSayfa = VeriSay('ulkeler', 'UlkeID');

				                $Limit      = 50;
				                $AktifSayfa = isset($_GET['Sayfasi']) && is_numeric($_GET['Sayfasi'])?$_GET['Sayfasi']:1;
				                $Baslangic  = ($AktifSayfa * $Limit) - $Limit; 

				                $Durum = 'Aktif';
			                	$Say = 0;
			                	$Veriler = VerileriVer('ulkeler', false, false, $Limit, false, $Baslangic);
			                	foreach ($Veriler as $Veri) {

			                		$Say++;
			                		$UlkeID = $Veri['UlkeID'];

			                		if ($Veri['UlkeDurum'] == 1) {
			                			
						                $Durum = 'Aktif';

			                		}else{

						                $Durum = 'Pasif';

			                		}
							?>
		                    <tr>
				                <td align="center"><input type="checkbox" name="Silinecekler[]" value="<?=$UlkeID?>" class="Secilenler"></td>
		                        <td align="center"><?=$Say?></td>
		                        <td><?=$Veri['UlkeBaslik']?></td>
		                        <td align="center"><?=date('d.m.Y H:i:s', $Veri['UlkeTarih'])?></td>
		                        <td align="center"><?=$Durum?></td>
		                        <td>
		                        	<a href="index.php?Sayfa=Ulkeler&Sil=<?=$UlkeID?>" onclick="if(confirm('<?=$Veri['UlkeBaslik']?> Ülkesi Silinsin mi? Ülkeye ait tüm restoranlar silinir.')){ return true; }else{ return false;}" style="width: 48%; float: left;">
		                        		<button type="button" class="btn btn-danger btn-xs" style="width: 100%;">Sil</button>
		                        	</a>
		                        	<a href="index.php?Sayfa=UlkeDuzenle&ID=<?=$UlkeID?>" style="width: 48%; float: left; margin-left: 5px;">
		                        		<button type="button" class="btn btn-warning btn-xs" style="width: 100%;">Düzenle</button>
		                        	</a>
		                        </td>
		                    </tr>
		                <?php }?>
		                </tbody>
		            </table>
		            <?php
		            	if ($ToplamSayfa) {
		            		
		            		?>

					            <div class="btn btn-primary" onclick="TumunuSec()">Tümünü Seç</div>
					            <button type="submit" class="btn btn-danger" name="TopluSil">Seçilenleri Sil</button>

		            		<?php

		            	}
		            ?>
		        </form>
				<nav aria-label="Page navigation example">
					<ul class="pagination">
			            <?php
			                $ToplamSayfa = ceil($ToplamSayfa / $Limit);
			                
			                if($AktifSayfa > 1){

			                	echo '<li class="page-item"><a class="page-link" href="index.php?Sayfa=Ulkeler&Sayfasi='.($AktifSayfa-1).'">Önceki</a></li>';

			                }

			               	for($x = - 3; $x <= $ToplamSayfa; $x++){
		                
			                    if(($x > 0) && ($x > $AktifSayfa-3) && ($x < $AktifSayfa+3)){

			                    	if ($AktifSayfa == $x) {
			                    		
			                    		echo '<li class="page-item active"><a class="page-link">'.$x.'</a></li>';

			                    	}else{

			                    		echo '<li class="page-item"><a class="page-link" href="index.php?Sayfa=Ulkeler&Sayfasi='.$x.'">'.$x.'</a></li>';

			                    	}

			                    }

		                    }

			                if($AktifSayfa < $ToplamSayfa){

			                	echo '<li class="page-item"><a class="page-link" href="index.php?Sayfa=Ulkeler&Sayfasi='.($AktifSayfa+1).'">Sonraki</a></li>';

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