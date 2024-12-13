<link href="./vendors/switchery/dist/switchery.min.css" rel="stylesheet">
<link href="./build/css/custom.min.css" rel="stylesheet">
<div class="right_col" role="main">

	<div class="col-md-12 col-xs-12">

		<form class="form-horizontal form-label-left" method="POST" action="index.php?Sayfa=FooterLinkler">

			<div class="x_panel">
				
				<div class="x_title">
					<h2>Footer Link Ekleme Paneli</h2>
					<div class="clearfix"></div>
				</div>
				
				<div class="x_content">
					
					<div class="form-group col-md-4 col-sm-4 col-xs-12">
						<label class="col-md-12 col-sm-12 col-xs-12">Başlık</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<input type="text" class="form-control" value="" name="Baslik" placeholder="Başlığı Yazın">
						</div>
					</div>

					<div class="form-group col-md-4 col-sm-4 col-xs-12">
						<label class="col-md-12 col-sm-12 col-xs-12">Link</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<input type="text" class="form-control" value="" name="Link" placeholder="Linki Yazın">
						</div>
					</div>

					<div class="form-group col-md-4 col-sm-4 col-xs-12">
						<label class="col-md-12 col-sm-12 col-xs-12">Grup</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<select class="form-control" name="Grup">
								<?php
									foreach ($FooterLinkGrublar as $FooterLinkGrup) {
										
										echo '<option value="'.$FooterLinkGrup.'">'.$FooterLinkGrup.'</option>';

									}
								?>
							</select>
						</div>
					</div>

				</div>
				
			</div>

			<div class="form-group">

				<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0;">

					<button type="submit" name="Ekle" class="btn btn-success form-control">Kaydet</button>

				</div>

			</div>

		</form>

	</div>

</div>