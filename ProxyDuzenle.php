<?php
    
    $ID = G('ID');
    $ProxyBilgileri = VerileriVer('proxyler', false, "ProxylerID='$ID'", 1);
    if(!isset($_GET['ID']) || !is_numeric($_GET['ID']) || empty($ProxyBilgileri)){

        Git('index.php?Neresi=Proxyler');

    }

    $ProxyBilgileri = end($ProxyBilgileri);

?>
<link href="./vendors/switchery/dist/switchery.min.css" rel="stylesheet">
<link href="./build/css/custom.min.css" rel="stylesheet">
<div class="right_col" role="main">

	<div class="col-md-12 col-xs-12">

		<form class="form-horizontal form-label-left" method="POST" action="index.php?Sayfa=Proxyler">

			<div class="x_panel">

				<div class="x_title">
					<h2>Proxy Düzenleme Paneli</h2>
					<div class="clearfix"></div>
				</div>

				<div class="x_content">

					<div class="form-group">
						<div class="col-md-4 col-sm-4 col-xs-4">
							<select class="form-control" name="Ulke">

								<?php

									echo '<option value="0">Ülke Seçin</option>';
				                	$Ulkeler = VerileriVer('ulkeler');
				                	foreach ($Ulkeler as $Ulke) {
				                		
				                		echo '<option value="'.$Ulke['UlkeID'].'" '.($ProxyBilgileri['ProxylerUlkeID']==$Ulke['UlkeID']?'selected':'').'>'.$Ulke['UlkeBaslik'].'</option>';

				                	}

								?>
								
							</select>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<input type="text" name="Proxy" class="form-control" value="<?=$ProxyBilgileri['ProxylerProxy']?>">
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
							<select class="form-control" name="Durum">
								<option value="1" <?=$ProxyBilgileri['ProxylerDurum']?'selected':''?>>Aktif</option>
								<option value="0" <?=!$ProxyBilgileri['ProxylerDurum']?'selected':''?>>Pasif</option>
							</select>
						</div>
					</div>

				</div>

			</div>

			<div class="form-group">

				<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0;">

					<input type="hidden" name="ID" value="<?=$ProxyBilgileri['ProxylerID']?>">
					<button type="submit" name="Duzenle" class="btn btn-success form-control">Kaydet</button>

				</div>

			</div>

		</form>

	</div>

</div>