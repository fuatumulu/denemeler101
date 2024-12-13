<?php 

if(isset($_POST['SiteURL'])){

	$Veri = array(
		'SiteURL' => P('SiteURL'),
		'SiteBaslik' => P('Title'),
		'SiteDescription' => P('Description'),
		'SiteKeywords' => P('Keywords')
	);

    if(!empty($_FILES['Logo']['name'])){

        require_once('ResimDuzenlemeClass.php');

        $Klasor = '../images';
        $LogoYolu = LogoYukle($Klasor, $_FILES['Logo'], 'Logo');
        if($LogoYolu['Durum']){

            $Veri['SiteLogo'] = $LogoYolu['ResimYolu'];

        }

    }
       
    $Veri['YorumBasligi'] = P('YorumBasligi');
    $Veri['AnalyticsKodu'] = P('AnalyticsKodu');
    $Veri['YorumCron'] = P('YorumCron');
    $Veri['YorumProxy'] = P('YorumProxy');
    $Veri['YorumSayisi'] = P('YorumSayisi');
    $Veri['EngellenecekRefler'] = P('EngellenecekRefler');

	$Sonuc = VeriGuncelle('genelayarlar', $Veri);
	if(!$Sonuc){

		$Hata = 'Ayarlar kayıt edilemedi';

	}else{

		
		$Veri = array();
		$Veri['KullaniciMailAdresi'] = P('MailAdresi');

		if (!empty($_POST['Parola'])) {
			
			$Veri['KullaniciParola'] = P('Parola');
			$Veri['KullaniciCerez'] = '';

		}

		VeriGuncelle('kullanicilar', $Veri, "KullaniciID='$KullaniciID'");
		$KullaniciBilgileri = KullaniciBilgileri();

		if(GirisKontrol() != 1){

			exit('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=./Giris.php">');

		}

		$GenelAyarlar = VerileriVer('genelayarlar');
		$GenelAyarlar = end($GenelAyarlar);

	}

}

?>


<!-- page content -->
<div class="right_col" role="main">

	<div class="col-md-12 col-xs-12">

		<?php if(isset($OlumluMesaj)){ OlumluMesaj($OlumluMesaj); }?>
		<?php if(isset($Hata)){ HataMesaji($Hata); }?>

	</div>

	<div class="col-md-12 col-xs-12">

		<form class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data">

			<div class="x_panel">

				<div class="x_title">
					<h2>Genel Ayarlar</h2>
					<div class="clearfix"></div>
				</div>

				<div class="x_content">

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Site URL</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<input type="text" class="form-control" value="<?=$GenelAyarlar['SiteURL']?>" name="SiteURL" placeholder="Site Url Bilgisini Yazın">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Site Başlık</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<input type="text" class="form-control" value="<?=$GenelAyarlar['SiteBaslik']?>" name="Title" placeholder="Site Başlık Bilgisini Yazın">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Site Description</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<input type="text" class="form-control" value="<?=$GenelAyarlar['SiteDescription']?>" name="Description" placeholder="Site Description Bilgisini Yazın">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Site Keywords</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<input type="text" class="form-control" value="<?=$GenelAyarlar['SiteKeywords']?>" name="Keywords" placeholder="Site Keywords Bilgisini Yazın">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Yorum Başlığı</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<input type="text" class="form-control" value="<?=$GenelAyarlar['YorumBasligi']?>" name="YorumBasligi" placeholder="Yorum Başlığı Bilgisini Yazın">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Analytics Kodu</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<textarea class="form-control" name="AnalyticsKodu" placeholder="Analytics Kodu Bilgisini Yazın" rows="5"><?=$GenelAyarlar['AnalyticsKodu']?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Site Logo</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<input type="file" name="Logo" style="margin-top: 10px;">
							<span style="color: #4193bb; font-size: 12px; padding: 5px; float: left;">Logoyu değiştirmek istemiyorsanız burayı boş bırakın.</span>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Mail Adresi</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<input type="text" class="form-control" value="<?=$KullaniciBilgileri['KullaniciMailAdresi']?>" name="MailAdresi" placeholder="Mail adresinizi yazın">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Parola</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<input type="text" class="form-control" value="" name="Parola" placeholder="Parolanızı değiştirmek istiyorsanız yazın.">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Engellenecekler</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<input type="text" class="form-control" value="<?=$GenelAyarlar['EngellenecekRefler']?>" name="EngellenecekRefler" placeholder="">

							<span style="color: #4193bb; font-size: 12px; padding: 5px; float: left;">Reflerden gelen sitelerin reklam gösterimini engellemek istediğiniz sitelerin listesini virgül ile ayrılarak yazın.</span>

						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Mekan Yorum</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<select class="form-control" name="YorumCron">
								<option value="0" <?=!$GenelAyarlar['YorumCron']?'selected':''?>>Yorum Çekilmesin</option>
								<?php
									for ($i=1; $i <= 50; $i++) { 

										echo '<option value="'.$i.'" '.($GenelAyarlar['YorumCron']==$i?'selected':'').'>'.$i.' Adet Mekan</a>';

									}
								?>
							</select>
							<span style="color: #4193bb; font-size: 12px; padding: 5px; float: left;">Yorumları çeken cron botunun tek seferde kaç tane mekanın yorumunu çekeceğidir.</span>

						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Yorum Proxy</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<input type="text" class="form-control" value="<?=$GenelAyarlar['YorumProxy']?>" name="YorumProxy" placeholder="IP:Port:KullanıcıAdı:Parola">
							<span style="color: #4193bb; font-size: 12px; padding: 5px; float: left;">Yorumları çeken cron botu için kullanılacak proxydir.</span>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">Yorum Sayısı</label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<select class="form-control" name="YorumSayisi">
								<option value="0" <?=!$GenelAyarlar['YorumSayisi']?'selected':''?>>Yorumlar Gösterilmesin</option>
								<?php
									for ($i=1; $i <= 8; $i++) { 

										echo '<option value="'.$i.'" '.($GenelAyarlar['YorumSayisi']==$i?'selected':'').'>'.$i.' Adet Yorum Gösterilsin</a>';

									}
								?>
							</select>
							<span style="color: #4193bb; font-size: 12px; padding: 5px; float: left;">Mekan sayfası altında listelenen yorum sayısıdır.</span>

						</div>
					</div>
					<?php
						$ToplamMekan = VeriSay('restoranlar', 'RestoranID', "RestoranDurum='1'");
						$ResimliMekan = VeriSay('restoranlar', 'RestoranID', "RestoranResimDurum > 0");
						$ToplamResim = VeriSay('resimler', 'ResimID');
						$MakaleliRestoran = VeriSay('restoranlar', 'RestoranID', "RestoranChatGptYorum IS NOT NULL");
						$CekilenYorumSayisi = VeriSay('restoranlar', 'RestoranID', "RestoranYorumSayisi > 0");
						
					?>
					<div class="form-group">

						<label class="control-label col-md-1 col-sm-1 col-xs-12"></label>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<span style="color: #ff5722; font-size: 12px; padding: 5px; float: left; font-weight: bold; width: 100%;">Toplam <?=number_format($ToplamMekan)?> mekandan <?=number_format($CekilenYorumSayisi)?> tane mekanın yorumu çekildi.</span><br />

							<span style="color: #ff5722; font-size: 12px; padding: 5px; float: left; font-weight: bold; width: 100%;">Toplam <?=number_format($ToplamMekan)?> mekandan <?=number_format($ResimliMekan)?> tane mekanın resmi çekildi. (Toplam Resim: <?=number_format($ToplamResim)?>)</span>

							<span style="color: #ff5722; font-size: 12px; padding: 5px; float: left; font-weight: bold; width: 100%;">Toplam <?=number_format($ToplamMekan)?> mekandan <?=number_format($MakaleliRestoran)?> tane mekanda makale bilgisi var.</span>
						</div>
					</div>

				</div>

			</div>

			<div class="form-group">

				<div class="col-md-12 col-sm-12 col-xs-12">

					<button type="submit" class="btn btn-success form-control">Kaydet</button>

				</div>

			</div>
		</form>

	</div>

</div>


    <script src="vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="build/js/custom.min.js"></script>
