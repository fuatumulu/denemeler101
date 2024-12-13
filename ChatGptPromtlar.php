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

			$UlkeID = P('UlkeID');
			$PromtlarYorumlu = P('PromtlarYorumlu');
			$PromtlarYorumsuz = P('PromtlarYorumsuz');

            $Veri = array(
            	'ChatGptPromtUlkeID' => $UlkeID,
            	'ChatGptPromtYorum' => $PromtlarYorumlu,
            	'ChatGptPromtYorumsuz' => $PromtlarYorumsuz,
            	'ChatGptPromtTarih' => time()
            );

            $Ekle = VeriEkle('chatgptpromt', $Veri);
            if ($Ekle) {
            	
				$OlumluMesaj .= 'Promt Eklendi<br />';

            }else{

				$Hata .= 'Promt Eklenemedi<br />';

            }

		}elseif (isset($_POST['Duzenle'])) {

			$ID = P('ID');

			$UlkeID = P('UlkeID');
			$PromtlarYorumlu = P('PromtlarYorumlu');
			$PromtlarYorumsuz = P('PromtlarYorumsuz');
			
            $Veri = array(
            	'ChatGptPromtUlkeID' => $UlkeID,
            	'ChatGptPromtYorum' => $PromtlarYorumlu,
            	'ChatGptPromtYorumsuz' => $PromtlarYorumsuz,
            );

			$Sonuc = VeriGuncelle('chatgptpromt', $Veri, "ChatGptPromtID='$ID'");
			if(!$Sonuc){

				$Hata .= 'Promt Düzenlenemedi.';

			}else{

				$OlumluMesaj .= 'Promt Düzenlendi.';

			}

		}elseif (isset($_GET['Sil'])) {

	        $ChatGptPromtID = G('Sil');

	        $VeriSil = VeriSil('chatgptpromt', "ChatGptPromtID='$ChatGptPromtID'");
	        if($VeriSil){
	        			        
	            $OlumluMesaj = 'Promt Silindi.';

	        }else{

	            $Hata = 'Promt Silinemedi.';

	        }

		}

	?>
		<div class="col-md-12 col-xs-12">

			<?php if(!empty($OlumluMesaj)){ OlumluMesaj($OlumluMesaj); }?>
			<?php if(!empty($Hata)){ HataMesaji($Hata); }?>

		</div>

	    <div class="x_panel">

			<div class="col-md-12 col-sm-12 col-xs-12">
				<h2 style="margin-bottom: 0; margin-left: 5px;">Promtlar</h2>
			</div>

	        <div class="x_content">
	            <table class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
	                <thead>
	                    <tr>
	                        <th style="width: 5%; text-align: center;">Say</th>
	                        <th>Promt (Yorumlu)</th>
	                        <th>Promt (Yorumsuz)</th>
	                        <th>Ülke</th>
	                        <th style="text-align: center;">Tarih</th>
	                        <th style="text-align: center;">Sil</th>
	                    </tr>
	                </thead>

	                <tbody>
	                <?php

	                	$SQL = false;

						$ToplamSayfa = VeriSay('chatgptpromt', 'ChatGptPromtID', $SQL);

		                $Limit = 50;
		                $AktifSayfa = isset($_GET['Sayfasi']) && is_numeric($_GET['Sayfasi'])?$_GET['Sayfasi']:1;
		                $Baslangic  = ($AktifSayfa * $Limit) - $Limit; 

		                $Durum = 'Aktif';
	                	$Say = 0;
	                	$Veriler = VerileriVer('chatgptpromt INNER JOIN ulkeler ON ChatGptPromtUlkeID=UlkeID', false, $SQL, $Limit, "ChatGptPromtID DESC", $Baslangic);
	                	foreach ($Veriler as $Veri) {

	                		$Say++;
	                		$ChatGptPromtID = $Veri['ChatGptPromtID'];

					?>
	                    <tr>
	                        <td align="center"><?=$Say?></td>
	                        <td><?=$Veri['ChatGptPromtYorum']?></td>
	                        <td><?=$Veri['ChatGptPromtYorumsuz']?></td>
	                        <td><?=$Veri['UlkeBaslik']?></td>
	                        <td align="center"><?=date('d.m.Y H:i:s', $Veri['ChatGptPromtTarih'])?></td>
	                        <td>
	                        	<a href="index.php?Sayfa=ChatGptPromtlar&Sil=<?=$ChatGptPromtID?>" onclick="if(confirm('Promt Silinsin mi?')){ return true; }else{ return false;}" style="width: 100%; float: left;">
	                        		<button type="button" class="btn btn-danger btn-xs" style="width: 100%;">Sil</button>
	                        	</a>
	                        	<a href="index.php?Sayfa=ChatGptPromtDuzenle&ID=<?=$ChatGptPromtID?>" style="width: 100%; float: left;">
	                        		<button type="button" class="btn btn-warning btn-xs" style="width: 100%;">Düzenle</button>
	                        	</a>
	                    </tr>
	                <?php }?>
	                </tbody>
	            </table>

	        </div>

	    </div>

	</div>

</div>