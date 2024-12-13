<?php
    
    $ID = G('ID');
    $ChatGptPromtBilgileri = VerileriVer('chatgptpromt', false, "ChatGptPromtID='$ID'", 1);
    if(!isset($_GET['ID']) || !is_numeric($_GET['ID']) || empty($ChatGptPromtBilgileri)){

        Git('index.php?Sayfa=ChatGptPromtlar');

    }

    $ChatGptPromtBilgileri = end($ChatGptPromtBilgileri);

?>
<link href="./vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="./vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="./vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="./vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="./vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<!-- page content -->
<div class="right_col" role="main">

	<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="col-md-12 col-xs-12">

			<?php if(!empty($OlumluMesaj)){ OlumluMesaj($OlumluMesaj); }?>
			<?php if(!empty($Hata)){ HataMesaji($Hata); }?>

		</div>

		<form class="form-horizontal form-label-left" method="POST" action="./index.php?Sayfa=ChatGptPromtlar">

			<div class="x_panel">

				<div class="col-md-12 col-sm-12 col-xs-12">
					<h2 style="margin-bottom: 0; margin-left: 5px;">Promt Ekle</h2>
				</div>

				<div class="x_content">

					<div class="form-group" style="margin-top: 10px;">
						<label class="col-md-12 col-sm-12 col-xs-12">Ülke</label>
						<div class="col-md-12 col-sm-12 col-xs-12">

							<select class="form-control" name="UlkeID">
								<?php
									$Veriler = VerileriVer('ulkeler', false, "UlkeDurum='1'");
									foreach ($Veriler as $Veri) {
										
										?>

											<option value="<?=$Veri['UlkeID']?>" <?=$Veri['UlkeID'] == $ChatGptPromtBilgileri['ChatGptPromtUlkeID']?'selected':''?>><?=$Veri['UlkeBaslik']?></option>

										<?php

									}
								?>
							</select>

						</div>

					</div>

					<div class="form-group" style="margin-top: 10px;">
						<label class="col-md-12 col-sm-12 col-xs-12">Promt Kalıbı (Yorumlu)</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<textarea class="form-control" name="PromtlarYorumlu" rows="5" placeholder="Promt Bilgisini Yazın (Yorumlu)"><?=$ChatGptPromtBilgileri['ChatGptPromtYorum']?></textarea>
							<span style="color: #4193bb; font-size: 12px; padding: 5px; float: left;">Kullanılabilir Etiketler: {MekanAdi}, {Adres}, {Yorumlar}</span>
						</div>
						
					</div>

					<div class="form-group" style="margin-top: 10px;">

						<label class="col-md-12 col-sm-12 col-xs-12">Promt Kalıbı (Yorumsuz)</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<textarea class="form-control" name="PromtlarYorumsuz" rows="5" placeholder="Promt Bilgisini Yazın (Yorumsuz)"><?=$ChatGptPromtBilgileri['ChatGptPromtYorumsuz']?></textarea>
							<span style="color: #4193bb; font-size: 12px; padding: 5px; float: left;">Kullanılabilir Etiketler: {MekanAdi}, {Adres}, {Yorumlar}</span>
						</div>
						
					</div>

					<div class="form-group" style="margin-top: 10px;">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<input type="hidden" name="ID" value="<?=$ChatGptPromtBilgileri['ChatGptPromtID']?>">
							<button type="submit" name="Duzenle" class="btn btn-success form-control">Kaydet</button>
						</div>
					</div>

				</div>

			</div>

		</form>

	</div>

</div>