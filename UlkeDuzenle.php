<?php
    
    $ID = G('ID');
    $UlkeBilgileri = VerileriVer('ulkeler', false, "UlkeID='$ID'", 1);
    if(!isset($_GET['ID']) || !is_numeric($_GET['ID']) || empty($UlkeBilgileri)){

        Git('index.php?Neresi=Ulkeler');

    }

    $UlkeBilgileri = end($UlkeBilgileri);

?>
<link href="./vendors/switchery/dist/switchery.min.css" rel="stylesheet">
<link href="./build/css/custom.min.css" rel="stylesheet">
<div class="right_col" role="main">

	<div class="col-md-12 col-xs-12">

		<form class="form-horizontal form-label-left" method="POST" action="index.php?Sayfa=Ulkeler" enctype="multipart/form-data">

			<div class="x_panel">

				<div class="x_title">
					<h2>Ülke Düzenleme Paneli</h2>
					<div class="clearfix"></div>
				</div>

				<div class="x_content">

					<div class="form-group col-md-6 col-sm-6 col-xs-12" style="padding-left: 0;">
						<label class="col-md-12 col-sm-12 col-xs-12">Başlık</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<input type="text" class="form-control" value="<?=$UlkeBilgileri['UlkeBaslik']?>" name="UlkeAdi" placeholder="Ülke Adını Yazın">
						</div>
					</div>

					<div class="form-group col-md-6 col-sm-6 col-xs-12" style="padding-right: 0;">
						<label class="col-md-12 col-sm-12 col-xs-12">Ülke Kodu</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<input type="text" class="form-control" value="<?=$UlkeBilgileri['UlkeKisaKodu']?>" name="UlkeKisaKodu" placeholder="Ülke Kısa Kodunu Yazın">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-12 col-sm-12 col-xs-12">Durum</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<select class="form-control" name="Durum">
								<option value="0" <?=$UlkeBilgileri['UlkeDurum']==0?'selected':''?>>Onaysız</option>
								<option value="1" <?=$UlkeBilgileri['UlkeDurum']==1?'selected':''?>>Onaylı</option>
							</select>
						</div>
					</div>

				</div>

			</div>

			<div class="form-group">

				<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0;">

					<input type="hidden" name="ID" value="<?=$UlkeBilgileri['UlkeID']?>">
					<button type="submit" name="Duzenle" class="btn btn-success form-control">Kaydet</button>

				</div>

			</div>

		</form>

	</div>

</div>