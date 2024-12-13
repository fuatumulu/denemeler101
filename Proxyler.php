
<link href="./vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="./vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="./vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="./vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="./vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<!-- page content -->
<div class="right_col" role="main">

	<div class="col-md-12 col-sm-12 col-xs-12">
    <?php
    	
		$OlumluMesaj = '';
		$Hata = '';

		if (isset($_POST['Ekle'])) {

			$Ulke = P('Ulke');
			$Proxyler = explode("\n", $_POST['Proxy']);
			foreach ($Proxyler as $Proxy) {

	            $Veri = array(
	            	'ProxylerUlkeID' => $Ulke,
	            	'ProxylerProxy' => R($Proxy),
	            	'ProxylerTarih' => time()
	            );

	            $Ekle = VeriEkle('proxyler', $Veri);
	            if ($Ekle) {
	            	
					$OlumluMesaj .= $Proxy.' Eklendi<br />';

	            }else{

					$Hata .= $Proxy.' Eklenemedi<br />';

	            }

        	}

		}elseif (isset($_POST['Duzenle'])) {

			$ID = P('ID');

			$Ulke = P('Ulke');
			$Proxy = P('Proxy');
			$Durum = P('Durum');
			
            $Veri = array(
            	'ProxylerUlkeID' => $Ulke,
            	'ProxylerProxy' => $Proxy,
            	'ProxylerDurum' => $Durum
            );

			$Sonuc = VeriGuncelle('proxyler', $Veri, "ProxylerID='$ID'");
			if(!$Sonuc){

				$Hata .= '<strong>'.$Proxy.'</strong> Düzenlenemedi.';

			}else{

				$OlumluMesaj .= '<strong>'.$Proxy.'</strong> Düzenlendi.';

			}

		}elseif (isset($_GET['Sil'])) {

	        $ProxylerID = G('Sil');

	        $SilmeBilgisi = VerileriVer('proxyler', false, "ProxylerID='$ProxylerID'", 1);
	        $SilmeBilgisi = end($SilmeBilgisi);

	        $VeriSil = VeriSil('proxyler', "ProxylerID='$ProxylerID'");
	        if($VeriSil){
	        			        
	            $OlumluMesaj = '<strong>'.$SilmeBilgisi['ProxylerProxy'].'</strong> Silindi.';

	        }else{

	            $Hata = '<strong>'.$SilmeBilgisi['ProxylerProxy'].'</strong> Silinemedi.';

	        }

		}

	?>
		<div class="col-md-12 col-xs-12">

			<?php if(!empty($OlumluMesaj)){ OlumluMesaj($OlumluMesaj); }?>
			<?php if(!empty($Hata)){ HataMesaji($Hata); }?>

		</div>

		<form class="form-horizontal form-label-left" method="POST" action="">

			<div class="x_panel">

				<div class="x_content">

					<div class="form-group">
						<div class="col-md-10 col-sm-10 col-xs-10">
							<input type="text" class="form-control" value="" name="AranacakProxy" placeholder="Aranacak Proxyi Yazın">
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
	            <table class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
	                <thead>
	                    <tr>
	                        <th style="width: 5%; text-align: center;">Say</th>
	                        <th style="">IP</th>
	                        <th style="">Port</th>
	                        <th style="">Kullanıcı Adı</th>
	                        <th style="">Parola</th>
	                        <th style="text-align: center;">Yorum Sayısı</th>
	                        <th style="text-align: center;">Son İşlem</th>
	                        <th style="text-align: center;">Tarih</th>
	                        <th style="text-align: center;">Durum</th>
	                        <th style="text-align: center;">Sil</th>
	                    </tr>
	                </thead>

	                <tbody>
	                <?php

	                	$SQL = false;
	                	if (isset($_POST['AranacakProxy'])) {
	                		
	                		$AranacakProxy = P('AranacakProxy');
	                		$SQL = "ProxylerProxy LIKE '%$AranacakProxy%'";
		                	$Limit = 1500;

	                	}

						$ToplamSayfa = VeriSay('proxyler', 'ProxylerID', $SQL);

		                $Limit = 50;
		                $AktifSayfa = isset($_GET['Sayfasi']) && is_numeric($_GET['Sayfasi'])?$_GET['Sayfasi']:1;
		                $Baslangic  = ($AktifSayfa * $Limit) - $Limit; 

		                $Durum = 'Aktif';
	                	$Say = 0;
	                	$Veriler = VerileriVer('proxyler', false, $SQL, $Limit, false, $Baslangic);
	                	foreach ($Veriler as $Veri) {

	                		$Say++;
	                		$ProxylerID = $Veri['ProxylerID'];

	                		if ($Veri['ProxylerDurum'] == 1) {
	                			
				                $Durum = 'Aktif';

	                		}else{

				                $Durum = 'Pasif';

	                		}

							$Proxy1 = explode(':', $Veri['ProxylerProxy']);
							$IP = isset($Proxy1[0])?$Proxy1[0]:'';
							$Port = isset($Proxy1[1])?$Proxy1[1]:'';
							$KullaniciAdi = isset($Proxy1[2])?$Proxy1[2]:'';
							$Parola = isset($Proxy1[3])?$Proxy1[3]:'';


					?>
	                    <tr>
	                        <td align="center"><?=$Say?></td>
	                        <td><?=$IP?></td>
	                        <td><?=$Port?></td>
	                        <td><?=$KullaniciAdi?></td>
	                        <td><?=$Parola?></td>
	                        <td align="center"><?=number_format($Veri['ProxylerCekilenYorumSayisi'])?></td>
	                        <td align="center"><?=number_format($Veri['ProxylerSonIslemTarihi'])?></td>
	                        <td align="center"><?=date('d.m.Y H:i:s', $Veri['ProxylerTarih'])?></td>
	                        <td align="center"><?=$Durum?></td>
	                        <td>
	                        	<a href="index.php?Sayfa=Proxyler&Sil=<?=$ProxylerID?>" onclick="if(confirm('<?=$IP?> IP Numaralı Proxy Silinsin mi?')){ return true; }else{ return false;}" style="width: 48%; float: left;">
	                        		<button type="button" class="btn btn-danger btn-xs" style="width: 100%;">Sil</button>
	                        	</a>
	                        	<a href="index.php?Sayfa=ProxyDuzenle&ID=<?=$ProxylerID?>" style="width: 48%; float: left; margin-left: 5px;">
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

			                	echo '<li class="page-item"><a class="page-link" href="index.php?Sayfa=Proxyler&Sayfasi='.($AktifSayfa-1).'">Önceki</a></li>';

			                }

			               	for($x = - 3; $x <= $ToplamSayfa; $x++){
		                
			                    if(($x > 0) && ($x > $AktifSayfa-3) && ($x < $AktifSayfa+3)){

			                    	if ($AktifSayfa == $x) {
			                    		
			                    		echo '<li class="page-item active"><a class="page-link">'.$x.'</a></li>';

			                    	}else{

			                    		echo '<li class="page-item"><a class="page-link" href="index.php?Sayfa=Proxyler&Sayfasi='.$x.'">'.$x.'</a></li>';

			                    	}

			                    }

		                    }

			                if($AktifSayfa < $ToplamSayfa){

			                	echo '<li class="page-item"><a class="page-link" href="index.php?Sayfa=Proxyler&Sayfasi='.($AktifSayfa+1).'">Sonraki</a></li>';

			                }

			            ?>
					</ul>
				</nav>

	        </div>

	    </div>

	</div>

</div>