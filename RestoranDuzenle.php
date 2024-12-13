<?php
    
    $ID = G('ID');
    $RestoranBilgileri = VerileriVer('restoranlar', false, "RestoranID='$ID'", 1);
    if(!isset($_GET['ID']) || !is_numeric($_GET['ID']) || empty($RestoranBilgileri)){

        Git('index.php?Neresi=Restoranlar');

    }

    $RestoranBilgileri = end($RestoranBilgileri);

?>
<link href="./vendors/switchery/dist/switchery.min.css" rel="stylesheet">
<link href="./build/css/custom.min.css" rel="stylesheet">
<div class="right_col" role="main">

	<div class="col-md-12 col-xs-12">
		
		<form class="form-horizontal form-label-left" method="POST" action="index.php?Sayfa=Restoranlar" enctype="multipart/form-data">

			<div class="x_panel">

				<div class="x_title">
					<h2>Restoran Ekleme</h2>
					<div class="clearfix"></div>
				</div>

				<div class="x_content">

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Mekan Adı</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<input type="text" class="form-control" value="<?=$RestoranBilgileri['RestoranMekanAdi']?>" name="MekanAdi" placeholder="Mekan Adı Bilgisini Yazın">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Kategori</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<input type="text" class="form-control" value="<?=$RestoranBilgileri['RestoranKategori']?>" name="Kategori" placeholder="Kategori Bilgisini Yazın">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Restoran Tipi</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<input type="text" class="form-control" value="<?=$RestoranBilgileri['RestoranRestoranTipi']?>" name="RestoranTipi" placeholder="Restoran Tipi Bilgisini Yazın">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Adres</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<input type="text" class="form-control" value="<?=$RestoranBilgileri['RestoranAdresi']?>" name="Adres" placeholder="Adres Bilgisini Yazın">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Telefon</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<input type="text" class="form-control" value="<?=$RestoranBilgileri['RestoranTelefonu']?>" name="Telefon" placeholder="Telefon Bilgisini Yazın">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Resim</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<label style="cursor: pointer; margin-top: 7px;">
								<input type="file" class="js-switch" name="Resim" />
							</label>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Lokasyon Latitude</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<input type="text" class="form-control" value="<?=$RestoranBilgileri['RestoranLokasyonLatitude']?>" name="LokasyonLatitude" placeholder="Lokasyon Latitude Bilgisini Yazın">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Lokasyon Longitude</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<input type="text" class="form-control" value="<?=$RestoranBilgileri['RestoranLokasyonLongitude']?>" name="LokasyonLongitude" placeholder="Lokasyon Longitude Bilgisini Yazın">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Açık Kalma Zaman</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<input type="text" class="form-control" value='<?=$RestoranBilgileri['RestoranAcikKalmaZamanlari']?>' name="AcikKalmaZamanlari" placeholder='Açık Kalma Zamanlarını Yazın. Örn: {"Monday": "Closed", "Tuesday": "9AM\u20138PM", "Wednesday": "9AM\u20139PM"}'>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Yorum Mesaj Linki</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<input type="text" class="form-control" value="<?=$RestoranBilgileri['RestoranYorumMesajlari']?>" name="YorumMesajlari" placeholder="Yorum Mesaj Link Bilgisini Yazın">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Rating Detay</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<input type="text" class="form-control" value='<?=$RestoranBilgileri['RestoranRatingDetay']?>' name="RatingDetay" placeholder='Rating Detay Bilgisini Yazın. Örn: {"1": 11, "2": 4, "3": 13, "4": 36, "5": 154}'>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Rating</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<input type="text" class="form-control" value="<?=$RestoranBilgileri['RestoranRating']?>" name="Rating" placeholder="Rating Bilgisini Yazın">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Place ID</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<input type="text" class="form-control" value="<?=$RestoranBilgileri['RestoranPlaceID']?>" name="PlaceID" placeholder="Place ID Bilgisini Yazın">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Chat GPT Makale</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<textarea class="form-control" name="RestoranChatGptYorum" rows="13" placeholder="Chat GPT Makalesi"><?=trim($RestoranBilgileri['RestoranChatGptYorum'])?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Durum</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<select class="form-control" name="Durum">
								<option value="0" <?=$RestoranBilgileri['RestoranDurum']==0?'selected':''?>>Onaysız</option>
								<option value="1" <?=$RestoranBilgileri['RestoranDurum']==1?'selected':''?>>Onaylı</option>
								<option value="2" <?=$RestoranBilgileri['RestoranDurum']==2?'selected':''?>>Onaylanacak</option>
							</select>
						</div>
					</div>

				</div>

			</div>

			<div class="form-group">

				<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0;">

					<input type="hidden" name="ID" value="<?=$RestoranBilgileri['RestoranID']?>">
					<button type="submit" name="Duzenle" class="btn btn-success form-control">Kaydet</button>

				</div>

			</div>

		</form>

	</div>

</div>