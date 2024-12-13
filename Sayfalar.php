
<link href="./vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="./vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="./vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="./vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="./vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<!-- page content -->
<div class="right_col" role="main">

	<div class="col-md-12 col-sm-12 col-xs-12">
    <?php
    	
		if (isset($_POST['Ekle'])) {

			$Baslik = P('Baslik');
			$Aciklama = P('Aciklama');

            $Veri = array(
            	'SayfaBaslik' => $Baslik,
            	'SayfaIcerik' => $Aciklama,
            	'SayfaTarih' => time()
            );

            $Ekle = VeriEkle('sayfalar', $Veri);
            if ($Ekle) {
            	
				$OlumluMesaj = $Baslik.' sayfası eklendi<br />';

            }else{

				$Hata = $Baslik.' sayfası eklenemedi<br />';

            }

		}elseif (isset($_POST['Duzenle'])) {

			$ID = P('ID');

			$Baslik = P('Baslik');
			$Aciklama = P('Aciklama');
			$Durum = P('Durum');

            $Veri = array(
            	'SayfaBaslik' => $Baslik,
            	'SayfaIcerik' => $Aciklama,
            	'SayfaDurum' => $Durum
            );

			$Sonuc = VeriGuncelle('sayfalar', $Veri, "SayfaID='$ID'");
			if(!$Sonuc){

				$Hata = '<strong>'.$Baslik.'</strong> Sayfası Düzenlenemedi.';

			}else{

				$OlumluMesaj = '<strong>'.$Baslik.'</strong> Sayfası Düzenlendi.';

			}

		}elseif (isset($_GET['Sil'])) {

	        $SayfaID = G('Sil');

	        $SilmeBilgisi = VerileriVer('sayfalar', false, "SayfaID='$SayfaID'", 1);
	        $SilmeBilgisi = end($SilmeBilgisi);

	        $VeriSil = VeriSil('sayfalar', "SayfaID='$SayfaID'");
	        if($VeriSil){

	            $OlumluMesaj = '<strong>'.$SilmeBilgisi['SayfaBaslik'].'</strong> Sayfası Silindi.';

	        }else{

	            $Hata = '<strong>'.$SilmeBilgisi['SayfaBaslik'].'</strong> Sayfası Silinemedi.';

	        }

		}

	?>
		<div class="col-md-12 col-xs-12">

			<?php if(!empty($OlumluMesaj)){ OlumluMesaj($OlumluMesaj); }?>
			<?php if(!empty($Hata)){ HataMesaji($Hata); }?>

		</div>

	    <div class="x_panel">

	        <div class="x_content">
	            <table class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
	                <thead>
	                    <tr>
	                        <th style="width: 5%; text-align: center;">Say</th>
	                        <th style="width: 45%">Başlık</th>
	                        <th style="text-align: center;">Tarih</th>
	                        <th style="text-align: center;">Durum</th>
	                        <th style="text-align: center;">İşlem</th>
	                    </tr>
	                </thead>

	                <tbody>
	                <?php

						$ToplamSayfa = VeriSay('sayfalar', 'SayfaID');

		                $Limit      = 50;
		                $AktifSayfa = isset($_GET['Sayfasi']) && is_numeric($_GET['Sayfasi'])?$_GET['Sayfasi']:1;
		                $Baslangic  = ($AktifSayfa * $Limit) - $Limit; 

		                $Durum = 'Aktif';
	                	$Say = 0;
	                	$Sayfalar = VerileriVer('sayfalar', false, false, $Limit, false, $Baslangic);
	                	foreach ($Sayfalar as $Sayfa) {

	                		$Say++;
	                		$SayfaID = $Sayfa['SayfaID'];

	                		if ($Sayfa['SayfaDurum'] == 1) {
	                			
				                $Durum = 'Aktif';

	                		}else{

				                $Durum = 'Pasif';

	                		}
					?>
	                    <tr>
	                        <td align="center"><?=$Say?></td>
	                        <td><a href="../page-<?=$Sayfa['SayfaID']?>"><?=$Sayfa['SayfaBaslik']?></a></td>
	                        <td align="center"><?=date('d.m.Y H:i:s', $Sayfa['SayfaTarih'])?></td>
	                        <td align="center"><?=$Durum?></td>
	                        <td>
	                        	<a href="index.php?Sayfa=Sayfalar&Sil=<?=$SayfaID?>" onclick="if(confirm('<?=$Sayfa['SayfaBaslik']?> Sayfası Silinsin mi?')){ return true; }else{ return false;}" style="width: 48%; float: left;">
	                        		<button type="button" class="btn btn-danger btn-xs" style="width: 100%;">Sil</button>
	                        	</a>
	                        	<a href="index.php?Sayfa=SayfaDuzenle&ID=<?=$SayfaID?>" style="width: 48%; float: left; margin-left: 5px;">
	                        		<button type="button" class="btn btn-warning btn-xs" style="width: 100%;">Düzenle</button>
	                        	</a>
	                        </td>
	                    </tr>
	                <?php }?>
	                </tbody>
	            </table>

				<nav aria-label="Page navigation example">
					<ul class="pagination">
			            <?php
			                $ToplamSayfa = ceil($ToplamSayfa / $Limit);
			                
			                if($AktifSayfa > 1){

			                	echo '<li class="page-item"><a class="page-link" href="index.php?Sayfa=Sayfalar&Sayfasi='.($AktifSayfa-1).'">Önceki</a></li>';

			                }

			               	for($x = - 3; $x <= $ToplamSayfa; $x++){
		                
			                    if(($x > 0) && ($x > $AktifSayfa-3) && ($x < $AktifSayfa+3)){

			                    	if ($AktifSayfa == $x) {
			                    		
			                    		echo '<li class="page-item active"><a class="page-link">'.$x.'</a></li>';

			                    	}else{

			                    		echo '<li class="page-item"><a class="page-link" href="index.php?Sayfa=Sayfalar&Sayfasi='.$x.'">'.$x.'</a></li>';

			                    	}

			                    }

		                    }

			                if($AktifSayfa < $ToplamSayfa){

			                	echo '<li class="page-item"><a class="page-link" href="index.php?Sayfa=Sayfalar&Sayfasi='.($AktifSayfa+1).'">Sonraki</a></li>';

			                }

			            ?>
					</ul>
				</nav>

	        </div>

	    </div>

	</div>

</div>