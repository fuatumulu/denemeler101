<?php

	if (isset($_POST['Kaydet'])) {

		$Reklam1 = P('Reklam1');
		$Reklam2 = P('Reklam2');
		$Reklam3 = P('Reklam3');
		$Reklam4 = P('Reklam4');
		$Reklam5 = P('Reklam5');
		$Reklam6 = P('Reklam6');
		$Reklam7 = P('Reklam7');
		$Reklam8 = P('Reklam8');
		$Reklam9 = P('Reklam9');
		$Reklam10 = P('Reklam10');
		$Reklam11 = P('Reklam11');
		$Reklam12 = P('Reklam12');

        $Veri = array(
        	'Reklam1' => $Reklam1,
        	'Reklam2' => $Reklam2,
        	'Reklam3' => $Reklam3,
        	'Reklam4' => $Reklam4,
        	'Reklam5' => $Reklam5,
        	'Reklam6' => $Reklam6,
        	'Reklam7' => $Reklam7,
        	'Reklam8' => $Reklam8,
        	'Reklam9' => $Reklam9,
        	'Reklam10' => $Reklam10,
        	'Reklam11' => $Reklam11,
        	'Reklam12' => $Reklam12,
        );

        $Ekle = VeriGuncelle('reklamlar', $Veri);
        if ($Ekle) {
        	
			$OlumluMesaj = 'Reklamlar Eklendi / Düzenlendi';

        }else{

			$Hata = 'Reklamlar Eklemede veya Düzenlenlemede Hata Meydana Geldi';

        }

	}

	$Reklamlar = VerileriVer('reklamlar', false, false, 1);
	$Reklamlar = end($Reklamlar);

?>
<link href="./vendors/switchery/dist/switchery.min.css" rel="stylesheet">
<link href="./build/css/custom.min.css" rel="stylesheet">
<div class="right_col" role="main">

	<div class="col-md-12 col-xs-12">

		<form class="form-horizontal form-label-left" method="POST" action="index.php?Sayfa=Reklamlar" enctype="multipart/form-data">

			<div class="col-md-12 col-xs-12">

				<?php if(!empty($OlumluMesaj)){ OlumluMesaj($OlumluMesaj); }?>
				<?php if(!empty($Hata)){ HataMesaji($Hata); }?>

			</div>

			<div class="x_panel">

				<div class="x_title">
					<h2>Reklam Ekleme / Düzenleme Paneli</h2>
					<div class="clearfix"></div>
				</div>

				<div class="x_content">

					<div class="form-group">
						<label class="col-md-12 col-sm-12 col-xs-12">Detay Sayfası Başlık Üstü</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<textarea class="form-control" name="Reklam1" placeholder="Reklam #1 Kodunu Yazın" rows="7"><?=$Reklamlar['Reklam1']?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-12 col-sm-12 col-xs-12">Detay Sayfası Özellikler Üstü</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<textarea class="form-control" name="Reklam2" placeholder="Reklam #2 Kodunu Yazın" rows="7"><?=$Reklamlar['Reklam2']?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-12 col-sm-12 col-xs-12">Detay Sayfası Özellikler Altı</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<textarea class="form-control" name="Reklam3" placeholder="Reklam #3 Kodunu Yazın" rows="7"><?=$Reklamlar['Reklam3']?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-12 col-sm-12 col-xs-12">Detay Sayfası 1. Yorumun Altı</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<textarea class="form-control" name="Reklam6" placeholder="Reklam Kodunu Yazın" rows="7"><?=$Reklamlar['Reklam6']?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-12 col-sm-12 col-xs-12">Detay Sayfası 3. Yorumun Altı</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<textarea class="form-control" name="Reklam7" placeholder="Reklam Kodunu Yazın" rows="7"><?=$Reklamlar['Reklam7']?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-12 col-sm-12 col-xs-12">Detay Sayfası 8. Yorumun Altı</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<textarea class="form-control" name="Reklam8" placeholder="Reklam Kodunu Yazın" rows="7"><?=$Reklamlar['Reklam8']?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-12 col-sm-12 col-xs-12">Detay Sayfası Makale 1. Paragraf Altı</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<textarea class="form-control" name="Reklam9" placeholder="Reklam Kodunu Yazın" rows="7"><?=$Reklamlar['Reklam9']?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-12 col-sm-12 col-xs-12">Detay Sayfası Makale 3. Paragraf Altı</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<textarea class="form-control" name="Reklam10" placeholder="Reklam Kodunu Yazın" rows="7"><?=$Reklamlar['Reklam10']?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-12 col-sm-12 col-xs-12">Detay Sayfası Makale 5. Paragraf Altı</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<textarea class="form-control" name="Reklam11" placeholder="Reklam Kodunu Yazın" rows="7"><?=$Reklamlar['Reklam11']?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-12 col-sm-12 col-xs-12">Detay Sayfası Makale Sonu</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<textarea class="form-control" name="Reklam12" placeholder="Reklam Kodunu Yazın" rows="7"><?=$Reklamlar['Reklam12']?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-12 col-sm-12 col-xs-12">Reklam #4</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<textarea class="form-control" name="Reklam4" placeholder="Reklam #4 Kodunu Yazın" rows="7"><?=$Reklamlar['Reklam4']?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-12 col-sm-12 col-xs-12">Reklam #5</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<textarea class="form-control" name="Reklam5" placeholder="Reklam #5 Kodunu Yazın" rows="7"><?=$Reklamlar['Reklam5']?></textarea>
						</div>
					</div>

				</div>

			</div>

			<div class="form-group">

				<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0;">

					<button type="submit" name="Kaydet" class="btn btn-success form-control">Kaydet</button>

				</div>

			</div>

		</form>

	</div>

</div>