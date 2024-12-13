<?php
    
    $ID = G('ID');
    $SayfaBilgileri = VerileriVer('sayfalar', false, "SayfaID='$ID'", 1);
    if(!isset($_GET['ID']) || !is_numeric($_GET['ID']) || empty($SayfaBilgileri)){

        Git('index.php?Neresi=Sayfalar');

    }

    $SayfaBilgileri = end($SayfaBilgileri);

?>
<link href="./vendors/switchery/dist/switchery.min.css" rel="stylesheet">
<link href="./build/css/custom.min.css" rel="stylesheet">
<div class="right_col" role="main">

	<div class="col-md-12 col-xs-12">

		<form class="form-horizontal form-label-left" method="POST" action="index.php?Sayfa=Sayfalar" enctype="multipart/form-data">

			<div class="x_panel">

				<div class="x_title">
					<h2>Sayfa Ekleme Paneli</h2>
					<div class="clearfix"></div>
				</div>

				<div class="x_content">

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Başlık</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<input type="text" class="form-control" value="<?=$SayfaBilgileri['SayfaBaslik']?>" name="Baslik" placeholder="Başlık Bilgisini Yazın">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Açıklama</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<textarea name="Aciklama" id="Aciklama" style="width: 100%;" rows="15"><?=$SayfaBilgileri['SayfaIcerik']?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Durum</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<select class="form-control" name="Durum">
								<option value="0" <?=$SayfaBilgileri['SayfaDurum']==0?'selected':''?>>Onaysız</option>
								<option value="1" <?=$SayfaBilgileri['SayfaDurum']==1?'selected':''?>>Onaylı</option>
							</select>
						</div>
					</div>

				</div>

			</div>

			<div class="form-group">

				<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0;">

					<input type="hidden" name="ID" value="<?=$SayfaBilgileri['SayfaID']?>">
					<button type="submit" name="Duzenle" class="btn btn-success form-control">Kaydet</button>

				</div>

			</div>

		</form>

	</div>

</div>

<style type="text/css">
	.ck-editor__editable_inline {
	    min-height: 400px;
	}

	#Aciklamasi .ck-editor__editable_inline {
	    min-height: 150px;
	}
</style>
<script src="//cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/translations/tr.js"></script>

<script>
	
    CKEDITOR.replace( 'Aciklama' );

</script>