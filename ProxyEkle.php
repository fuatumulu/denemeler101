<link href="./vendors/switchery/dist/switchery.min.css" rel="stylesheet">
<link href="./build/css/custom.min.css" rel="stylesheet">
<div class="right_col" role="main">

	<div class="col-md-12 col-xs-12">

		<form class="form-horizontal form-label-left" method="POST" action="index.php?Sayfa=Proxyler">

			<div class="x_panel">

				<div class="x_title">
					<h2>Proxy Ekleme Paneli</h2>
					<div class="clearfix"></div>
				</div>

				<div class="x_content">

					<div class="form-group">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<select class="form-control" name="Ulke">

								<?php

									echo '<option value="0">Ülke Seçin</option>';
				                	$Ulkeler = VerileriVer('ulkeler');
				                	foreach ($Ulkeler as $Ulke) {
				                		
				                		echo '<option value="'.$Ulke['UlkeID'].'">'.$Ulke['UlkeBaslik'].'</option>';

				                	}

								?>
								
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<textarea class="form-control" rows="5" placeholder="Birden fazla proxyleri alt alta yazın.&#10;Örn: IP:PORT:KullanıcıAdı:Parola" name="Proxy"></textarea>
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