
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
			foreach ($Silinecekler as $FooterLinkID) {

		        $VeriSil = VeriSil('footerlinkler', "FooterLinkID='$FooterLinkID'");
				if ($VeriSil) {

					$Silinen++;

				}else{

					$Hatali++;

				}

			}

			if ($Silinen) {

				$OlumluMesaj = 'Toplam '.$Silinen.' Footer Link Silindi';

			}

			if ($Hatali) {

				$Hata = 'Toplam '.$Hatali.' Footer Link Silinemedi';

			}

		}elseif (isset($_POST['Ekle'])) {

			$Baslik = P('Baslik');
			$Link = P('Link');
			$Grup = P('Grup');

            $Veri = array(
            	'FooterLinkGrup' => $Grup,
            	'FooterLinkBaslik' => $Baslik,
            	'FooterLinkBaglanti' => $Link,
            	'FooterLinkTarih' => time()
            );
            
            $Ekle = VeriEkle('footerlinkler', $Veri);
            if ($Ekle) {
            	
				$OlumluMesaj = $Baslik.' footer linki eklendi<br />';

            }else{

				$Hata = $Baslik.' footer linki eklenemedi<br />';

            }

		}elseif (isset($_POST['Duzenle'])) {

			$ID = P('ID');

			$Baslik = P('Baslik');
			$Link = P('Link');
			$Durum = P('Durum');
			$Grup = P('Grup');

            $Veri = array(
            	'FooterLinkGrup' => $Grup,
            	'FooterLinkBaslik' => $Baslik,
            	'FooterLinkBaglanti' => $Link,
            	'FooterLinkDurum' => $Durum
            );

			$Sonuc = VeriGuncelle('footerlinkler', $Veri, "FooterLinkID='$ID'");
			if(!$Sonuc){

				$Hata = '<strong>'.$Baslik.'</strong> Footer Linki Düzenlenemedi.';

			}else{

				$OlumluMesaj = '<strong>'.$Baslik.'</strong> Footer Linki Düzenlendi.';

			}

		}elseif (isset($_GET['Sil'])) {

	        $FooterLinkID = G('Sil');

	        $SilmeBilgisi = VerileriVer('footerlinkler', false, "FooterLinkID='$FooterLinkID'", 1);
	        $SilmeBilgisi = end($SilmeBilgisi);

	        $VeriSil = VeriSil('footerlinkler', "FooterLinkID='$FooterLinkID'");
	        if($VeriSil){

	            $OlumluMesaj = '<strong>'.$SilmeBilgisi['FooterLinkBaslik'].'</strong> Footer Linki Silindi.';

	        }else{

	            $Hata = '<strong>'.$SilmeBilgisi['FooterLinkBaslik'].'</strong> Footer Linki Silinemedi.';

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
		                        <th style="">Footer Link</th>
		                        <th style="text-align: center;">Tarih</th>
		                        <th style="text-align: center;">Durum</th>
		                        <th style="text-align: center;">İşlem</th>
		                    </tr>
		                </thead>

		                <tbody>
			                <?php

								$ToplamSayfa = VeriSay('footerlinkler', 'FooterLinkID');

				                $Limit      = 50;
				                $AktifSayfa = isset($_GET['Sayfasi']) && is_numeric($_GET['Sayfasi'])?$_GET['Sayfasi']:1;
				                $Baslangic  = ($AktifSayfa * $Limit) - $Limit; 

				                $Durum = 'Aktif';
			                	$Say = 0;
			                	$Veriler = VerileriVer('footerlinkler', false, false, $Limit, false, $Baslangic);
			                	foreach ($Veriler as $Veri) {

			                		$Say++;
			                		$FooterLinkID = $Veri['FooterLinkID'];

			                		if ($Veri['FooterLinkDurum'] == 1) {
			                			
						                $Durum = 'Aktif';

			                		}else{

						                $Durum = 'Pasif';

			                		}
							?>
		                    <tr>
				                <td align="center"><input type="checkbox" name="Silinecekler[]" value="<?=$FooterLinkID?>" class="Secilenler"></td>
		                        <td align="center"><?=$Say?></td>
		                        <td><a href="<?=$Veri['FooterLinkBaglanti']?>"><?=$Veri['FooterLinkBaslik']?></a></td>
		                        <td align="center"><?=date('d.m.Y H:i:s', $Veri['FooterLinkTarih'])?></td>
		                        <td align="center"><?=$Durum?></td>
		                        <td>
		                        	<a href="index.php?Sayfa=FooterLinkler&Sil=<?=$FooterLinkID?>" onclick="if(confirm('<?=$Veri['FooterLinkBaslik']?> Footer Linki Silinsin mi? Footer Linkye ait tüm restoranlar silinir.')){ return true; }else{ return false;}" style="width: 48%; float: left;">
		                        		<button type="button" class="btn btn-danger btn-xs" style="width: 100%;">Sil</button>
		                        	</a>
		                        	<a href="index.php?Sayfa=FooterLinkDuzenle&ID=<?=$FooterLinkID?>" style="width: 48%; float: left; margin-left: 5px;">
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

			                	echo '<li class="page-item"><a class="page-link" href="index.php?Sayfa=FooterLinkler&Sayfasi='.($AktifSayfa-1).'">Önceki</a></li>';

			                }

			               	for($x = - 3; $x <= $ToplamSayfa; $x++){
		                
			                    if(($x > 0) && ($x > $AktifSayfa-3) && ($x < $AktifSayfa+3)){

			                    	if ($AktifSayfa == $x) {
			                    		
			                    		echo '<li class="page-item active"><a class="page-link">'.$x.'</a></li>';

			                    	}else{

			                    		echo '<li class="page-item"><a class="page-link" href="index.php?Sayfa=FooterLinkler&Sayfasi='.$x.'">'.$x.'</a></li>';

			                    	}

			                    }

		                    }

			                if($AktifSayfa < $ToplamSayfa){

			                	echo '<li class="page-item"><a class="page-link" href="index.php?Sayfa=FooterLinkler&Sayfasi='.($AktifSayfa+1).'">Sonraki</a></li>';

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