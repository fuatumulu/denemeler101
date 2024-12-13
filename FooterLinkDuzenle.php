<?php
    
    $ID = G('ID');
    $FooterLinkBilgileri = VerileriVer('footerlinkler', false, "FooterLinkID='$ID'", 1);
    if(!isset($_GET['ID']) || !is_numeric($_GET['ID']) || empty($FooterLinkBilgileri)){

        Git('index.php?Neresi=FooterLinkler');

    }

    $FooterLinkBilgileri = end($FooterLinkBilgileri);

?>
<link href="./vendors/switchery/dist/switchery.min.css" rel="stylesheet">
<link href="./build/css/custom.min.css" rel="stylesheet">
<div class="right_col" role="main">

	<div class="col-md-12 col-xs-12">

		<form class="form-horizontal form-label-left" method="POST" action="index.php?Sayfa=FooterLinkler">

			<div class="x_panel">
				
				<div class="x_title">
					<h2>Footer Link Düzenleme Paneli</h2>
					<div class="clearfix"></div>
				</div>
				
				<div class="x_content">
					
					<div class="form-group col-md-3 col-sm-3 col-xs-12">
						<label class="col-md-12 col-sm-12 col-xs-12">Başlık</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<input type="text" class="form-control" value="<?=$FooterLinkBilgileri['FooterLinkBaslik']?>" name="Baslik" placeholder="Başlığı Yazın">
						</div>
					</div>

					<div class="form-group col-md-3 col-sm-3 col-xs-12">
						<label class="col-md-12 col-sm-12 col-xs-12">Link</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<input type="text" class="form-control" value="<?=$FooterLinkBilgileri['FooterLinkBaglanti']?>" name="Link" placeholder="Linki Yazın">
						</div>
					</div>

					<div class="form-group col-md-3 col-sm-3 col-xs-12">
						<label class="col-md-12 col-sm-12 col-xs-12">Grup</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<select class="form-control" name="Grup">
								<?php
									foreach ($FooterLinkGrublar as $FooterLinkGrup) {
										
										echo '<option value="'.$FooterLinkGrup.'" '.($FooterLinkBilgileri['FooterLinkGrup'] == $FooterLinkGrup?'selected':'').'>'.$FooterLinkGrup.'</option>';

									}
								?>
							</select>
						</div>
					</div>

					<div class="form-group col-md-3 col-sm-3 col-xs-12">
						<label class="col-md-12 col-sm-12 col-xs-12">Durum</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<select class="form-control" name="Durum">
								<option value="1" <?=$FooterLinkBilgileri['FooterLinkDurum']?'selected':''?>>Aktif</option>
								<option value="0" <?=!$FooterLinkBilgileri['FooterLinkDurum']?'selected':''?>>Pasif</option>
							</select>
						</div>
					</div>
					
				</div>
				
			</div>

			<div class="form-group">

				<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0;">

					<input type="hidden" name="ID" value="<?=$FooterLinkBilgileri['FooterLinkID']?>">
					<button type="submit" name="Duzenle" class="btn btn-success form-control">Kaydet</button>

				</div>

			</div>

		</form>

	</div>

</div>