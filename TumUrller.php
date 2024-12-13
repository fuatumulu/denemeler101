<link href="./vendors/switchery/dist/switchery.min.css" rel="stylesheet">
<link href="./build/css/custom.min.css" rel="stylesheet">
<div class="right_col" role="main">

	<div class="col-md-12 col-xs-12">

		<div class="x_panel">

			<div class="x_title">
				<h2>Sitede Buluna Onaylı Restoranların Bağlantıları</h2>
				<div class="clearfix"></div>
			</div>

	 		<?php

				if (isset($_POST['UrlAlindi'])) {

					VeriGuncelle('restoranlar', array('RestoranUrlDurum' => 1), "RestoranDurum='1'");

				}

				$TumBaglantilar = '';
				$Restoranlar = VerileriVer('restoranlar', false, "RestoranDurum='1' AND RestoranUrlDurum='0'");
				foreach ($Restoranlar as $Restoran) {

					$TumBaglantilar .= $GenelAyarlar['SiteURL'].'/'.$Restoran['RestoranSef']."\n";

				}

			?> 

			<div class="x_content">

				<div class="form-group">
					<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0;">
						<textarea class="form-control" rows="21"><?=trim($TumBaglantilar)?></textarea>
					</div>
				</div>

				<div style="clear: both;"></div>
				<div class="form-group" style="margin-top: 10px;">

					<div class="col-md-12 col-sm-12 col-xs-12">

						<form action="" method="post">
							<button type="submit" class="btn btn-success form-control" name="UrlAlindi">Url Bilgisi Alındı</button>
						</form>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>