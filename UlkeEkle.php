<link href="./vendors/switchery/dist/switchery.min.css" rel="stylesheet">
<link href="./build/css/custom.min.css" rel="stylesheet">
<div class="right_col" role="main">

	<div class="col-md-12 col-xs-12">

		<form class="form-horizontal form-label-left" method="POST" action="index.php?Sayfa=Ulkeler">

			<div class="x_panel">
				
				<div class="x_title">
					<h2>Ülke Ekleme Paneli</h2>
					<div class="clearfix"></div>
				</div>
				
				<div class="x_content">
					
					<div class="form-group col-md-6 col-sm-6 col-xs-12" style="padding-left: 0;">
						<label class="col-md-12 col-sm-12 col-xs-12">Başlık</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<input type="text" class="form-control" value="" name="UlkeAdi" placeholder="Ülke Adını Yazın">
						</div>
					</div>

					<div class="form-group col-md-6 col-sm-6 col-xs-12" style="padding-right: 0;">
						<label class="col-md-12 col-sm-12 col-xs-12">Ülke Kodu</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<input type="text" class="form-control" value="" name="UlkeKisaKodu" placeholder="Ülke Kısa Kodunu Yazın">
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