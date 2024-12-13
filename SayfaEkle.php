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
							<input type="text" class="form-control" value="" name="Baslik" placeholder="Başlık Bilgisini Yazın">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Açıklama</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<textarea name="Aciklama" id="Aciklama" style="width: 100%;" rows="15"></textarea>
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