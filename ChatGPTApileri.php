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

			$ApiKey = P('ApiKey');

            $Veri = array(
            	'ChatGptApiKey' => $ApiKey,
            	'ChatGptApiTarih' => time()
            );

            $Ekle = VeriEkle('chatgptapi', $Veri);
            if ($Ekle) {
            	
				$OlumluMesaj .= $ApiKey.' Eklendi<br />';

            }else{

				$Hata .= $ApiKey.' Eklenemedi<br />';

            }

		}elseif (isset($_GET['Sil'])) {

	        $ChatGptApiID = G('Sil');

	        $SilmeBilgisi = VerileriVer('chatgptapi', false, "ChatGptApiID='$ChatGptApiID'", 1);
	        $SilmeBilgisi = end($SilmeBilgisi);

	        $VeriSil = VeriSil('chatgptapi', "ChatGptApiID='$ChatGptApiID'");
	        if($VeriSil){
	        			        
	            $OlumluMesaj = '<strong>'.$SilmeBilgisi['ChatGptApiKey'].'</strong> Silindi.';

	        }else{

	            $Hata = '<strong>'.$SilmeBilgisi['ChatGptApiKey'].'</strong> Silinemedi.';

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

					<div class="form-group" style="margin-top: 10px;">
						<div class="col-md-10 col-sm-10 col-xs-10">
							<input type="text" class="form-control" value="" name="ApiKey" placeholder="Eklenecek Api Keyi Yazın">
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="submit" class="btn btn-success" style="width: 100%" value="Kaydet" name="Ekle">
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
	                        <th style="">Key</th>
	                        <th style="">Not</th>
	                        <th style="text-align: center;">Kullanım Sayısı</th>
	                        <th style="text-align: center;">Son İşlem</th>
	                        <th style="text-align: center;">Tarih</th>
	                        <th style="text-align: center;">Durum</th>
	                        <th style="text-align: center;">Sil</th>
	                    </tr>
	                </thead>

	                <tbody>
	                <?php

	                	$SQL = false;

						$ToplamSayfa = VeriSay('chatgptapi', 'ChatGptApiID', $SQL);

		                $Limit = 50;
		                $AktifSayfa = isset($_GET['Sayfasi']) && is_numeric($_GET['Sayfasi'])?$_GET['Sayfasi']:1;
		                $Baslangic  = ($AktifSayfa * $Limit) - $Limit; 

		                $Durum = 'Aktif';
	                	$Say = 0;
	                	$Veriler = VerileriVer('chatgptapi', false, $SQL, $Limit, false, $Baslangic);
	                	foreach ($Veriler as $Veri) {

	                		$Say++;
	                		$ChatGptApiID = $Veri['ChatGptApiID'];

	                		if ($Veri['ChatGptApiDurum'] == 1) {
	                			
				                $Durum = 'Aktif';

	                		}else{

				                $Durum = 'Pasif';

	                		}

					?>
	                    <tr <?=$Veri['ChatGptApiHataSayisi'] > 2?'style="background-color: #e16d6b; color: white;"':''?>>
	                        <td align="center"><?=$Say?></td>
	                        <td><?=$Veri['ChatGptApiKey']?></td>
	                        <td><?=$Veri['ChatGptApiNot']?></td>
	                        <td align="center"><?=number_format($Veri['ChatGptApiKullanimSayisi'])?></td>
	                        <td align="center"><?=$Veri['ChatGptApiSonKullanim']?date('d.m.Y H:i:s', $Veri['ChatGptApiSonKullanim']):' - '?></td>
	                        <td align="center"><?=date('d.m.Y H:i:s', $Veri['ChatGptApiTarih'])?></td>
	                        <td align="center"><?=$Durum?></td>
	                        <td>
	                        	<a href="index.php?Sayfa=ChatGPTApileri&Sil=<?=$ChatGptApiID?>" onclick="if(confirm('<?=$Veri['ChatGptApiKey']?> Api Key Silinsin mi?')){ return true; }else{ return false;}" style="width: 100%; float: left;">
	                        		<button type="button" class="btn btn-danger btn-xs" style="width: 100%;">Sil</button>
	                        	</a>
	                    </tr>
	                <?php }?>
	                </tbody>
	            </table>

	        </div>

	    </div>

	</div>

</div>