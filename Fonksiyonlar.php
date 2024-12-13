<?php

function KodlardaOlusanSorunlar($HataNo,$HataAciklamasi,$Dizin,$HataSatiri){

    $Hat = '';
    foreach($_REQUEST as $Gelen => $a):
        $Hat .= $Gelen.' => '.$a.'|';
    endforeach;

    $Hata = 'Hata No: '.$HataNo."\n";
    $Hata .= 'Hata Açıklaması: '.$HataAciklamasi."\n";
    $Hata .= 'Hata Dizin: '.$Dizin."\n";
    $Hata .= 'Hata Satırı: '.$HataSatiri."\n";
    $Hata .= 'Gelen Değer: '.trim($Hat,'|')."\n";
    $Hata .= 'Geldiği Sayfa: '.getenv('HTTP_REFERER')."\n";
    $Hata .= 'Tarih: '.date('d.m.Y H:i:s')."\n";
    $Hata .= str_repeat('=',60)."\n";
    
    file_put_contents('SistemdeOlusanHatalar.log',$Hata,FILE_APPEND);

}

set_error_handler('KodlardaOlusanSorunlar');

function R($a){
    global $MysqlBaglan;
    return mysqli_real_escape_string($MysqlBaglan, $a);

}

function G($Adi){
    
    return R($_GET[$Adi]);
    
}

function P($Adi){
    
    return R($_POST[$Adi]);
    
}

function Q($Gelen){
    global $MysqlBaglan;
    return mysqli_query($MysqlBaglan,$Gelen);
    
}

function F($Gelen){

    return mysqli_fetch_array($Gelen);

}

function VeriEkle($TabloAdi, $Veri){
    global $MysqlBaglan;

    $TabloAdlari = implode(', ', array_keys($Veri));
    $Veriler = implode("', '", $Veri);

    //echo "INSERT INTO $TabloAdi ($TabloAdlari) VALUES ('$Veriler')";
    $Sonuc = Q("INSERT INTO $TabloAdi ($TabloAdlari) VALUES ('$Veriler')") === TRUE?1:0;

    if($Sonuc){

        return $MysqlBaglan->insert_id;

    }else{

        return 0;

    }
    
}

function VeriGuncelle($TabloAdi, $Veriler, $Kosul = false, $SayisalIslem = false){
    global $MysqlBaglan;

    $Kosul = $Kosul?'WHERE '.$Kosul:'';

    $Veri = '';
    foreach ($Veriler as $Key => $Verisi) {

        $VeriSonuc = trim($Verisi);
        if($SayisalIslem){

            $Veri .= $Key." = $Verisi, ";

        }else{

            $Veri .= $Key." = '$Verisi', ";

        }


    }

    $Veri = trim($Veri, ', ');

    //echo "UPDATE $TabloAdi SET $Veri $Kosul\n\n";
    return Q("UPDATE $TabloAdi SET $Veri $Kosul") === TRUE?1:0;

}

function VeriSil($TabloAdi, $Kosul = false){
    global $MysqlBaglan;

    $Kosul = $Kosul?'WHERE '.$Kosul:'';
    $Sonuc = Q("DELETE FROM $TabloAdi $Kosul")=== TRUE?1:0;
    return $Sonuc;
    
}

function VerileriVer($TabloAdi, $Sutunlar = false, $Kosul = false, $Limits = false, $Order = false, $Baslangic = 0){

    $Sutunlar = $Sutunlar?implode(',', $Sutunlar):'*';
    $Kosul = $Kosul?'WHERE '.$Kosul:'';
    $Order = $Order?'ORDER BY '.$Order:'';
    $Limit = $Limits?'LIMIT '.$Baslangic.','.$Limits:'';

    $Tumu = array();
    
    //echo "SELECT $Sutunlar FROM $TabloAdi $Kosul $Order $Limit<br /><br />";
    $Veriler = Q("SELECT $Sutunlar FROM $TabloAdi $Kosul $Order $Limit");
    while ($Veri = F($Veriler)) {
        $Tumu[] = $Veri;
    }

    return $Tumu;

}

function VerileriVerIndex($TabloAdi, $Sutunlar = false, $Kosul = false, $Limits = false, $Order = false, $Baslangic = 0){

    $Sutunlar = $Sutunlar?implode(',', $Sutunlar):'*';
    $Kosul = $Kosul?'WHERE '.$Kosul:'';
    $Order = $Order?'ORDER BY '.$Order:'';
    $Limit = $Limits?'LIMIT '.$Baslangic.','.$Limits:'';

    $Tumu = array();
    
    //echo "SELECT $Sutunlar FROM $TabloAdi $Kosul $Order $Limit<br /><br />";
    $Veriler = Q("SELECT * FROM (
    SELECT * FROM `restoranlar` 
    ORDER BY `RestoranExcelYorum` DESC 
    LIMIT 1000
) AS subquery
ORDER BY RAND()
LIMIT 12");
    while ($Veri = F($Veriler)) {
        $Tumu[] = $Veri;
    }

    return $Tumu;

}



function VeriSay($TabloAdi, $Sutun = '*', $Kosul = false){

    $VeriSay = VerileriVer($TabloAdi, array('COUNT('.$Sutun.') AS Toplam'), $Kosul);
    $VeriSay = end($VeriSay);
    return $VeriSay['Toplam'];

}

function PR($Veri){

    echo '<pre>';
    print_r($Veri);
    echo '</pre>';

}

function GirisYap(){

    $MailAdresi = isset($_POST['MailAdresi'])?P('MailAdresi'):'';
    $Parola = isset($_POST['Parola'])?P('Parola'):'';
    $BeniHatirla = true;
        
    if(GirisKontrol() != 1){
        
        $Varmi = VeriSay('kullanicilar', 'KullaniciID', "KullaniciMailAdresi='$MailAdresi' AND KullaniciParola='$Parola' AND KullaniciDurum='1'");
        if($Varmi){
            
            $Cookie = md5($MailAdresi.$Parola.getenv('REMOTE_ADDR'));

            $Zaman = time()+(3600*2);
            if($BeniHatirla){

                $Zaman = strtotime("+5 years");

            }

            setcookie ("Kullanici", $Cookie, $Zaman, "/");
            setcookie ("BeniHatirla", $BeniHatirla, $Zaman, "/");

            $Veriler = array(
                'KullaniciCerez' => $Cookie
            );

            VeriGuncelle('kullanicilar', $Veriler, "KullaniciMailAdresi='$MailAdresi' AND KullaniciParola='$Parola'");
            return true;
            
        }else{
            
            return false;
            
        }
    
    }else{
    
        return true;
    
    }

}

function GirisKontrol(){

    $Cokie = isset($_COOKIE['Kullanici'])?true:false;
    if($Cokie){
        
        $Cookie = R($_COOKIE['Kullanici']);
        $BeniHatirla = isset($_COOKIE['BeniHatirla'])?R($_COOKIE['BeniHatirla']):false;
        $Kontrol = VeriSay('kullanicilar', 'KullaniciID', "KullaniciCerez='$Cookie'");
        
        if($Kontrol){

            $Tarih = time();

            $Veriler = array(
                'KullaniciSonAktivite' => $Tarih
            );

            VeriGuncelle('kullanicilar', $Veriler, "KullaniciCerez='$Cookie'");

            $Zaman = time()+(3600*2);
            if($BeniHatirla){

                $Zaman = strtotime("+5 years");

            }
            
            setcookie ("Kullanici", $Cookie, $Zaman, "/");
            setcookie ("BeniHatirla", $BeniHatirla, $Zaman, "/");

            return 1;
        
        }else{
        
            return 2;
        
        }
        
    }else{
        
        return 0;
        
    }
    
}

function CikisYap(){
    
    $Cokie = isset($_COOKIE['Kullanici'])?true:false;
    if($Cokie){
    
        $Cookie = R($_COOKIE['Kullanici']);
        setcookie ("Kullanici",'',time()-200,"/");

        $Veriler = array(
            'KullaniciCerez' => '0'
        );

        VeriGuncelle('kullanicilar', $Veriler, "KullaniciCerez='$Cookie'");
        return 1;
    
    }else{
        
        return 0;
        
    }
    
}

function KullaniciBilgileri(){

    $Cokie = isset($_COOKIE['Kullanici'])?true:false;
    if($Cokie){
        
        $Cookie = R($_COOKIE['Kullanici']);
        return F(Q("SELECT * FROM kullanicilar WHERE KullaniciCerez='$Cookie'")); 
                
    }else{
        
        return 0;
        
    }

}

function Git($Sayfa, $Devam = false){

    echo '<meta http-equiv="refresh" content="0; url='.$Sayfa.'">';
    
    if(!$Devam){
        
        exit();

    }

}

function LogoYukle($Klasor, $ResimYolu, $ResimAdi, $Uzanti = 'png'){

    $ResimKaynak = new Upload($ResimYolu);
    $ResimKaynak->image_convert = $Uzanti;
    $ResimKaynak->file_new_name_body = $ResimAdi;
    $ResimKaynak->file_max_size = '9999999';
    $ResimKaynak->image_max_pixels = 999999999999;
    $ResimKaynak->image_min_pixels = 9;
    //$ResimKaynak->file_overwrite = true;
    $ResimKaynak->allowed = array ( 'image/*' );
    $ResimKaynak->Process( ($Klasor?$Klasor:'./') );
    if ( $ResimKaynak->processed ){

        $ResimYolu = ($Klasor?trim($Klasor,'/').'/':'').$ResimKaynak->file_dst_name;
        $ResimYolu = str_replace("../", '', $ResimYolu);
        return array( 'Durum' => 1, 'ResimYolu' => $ResimYolu );

    } else {

        return array('Durum' => 0, 'Mesaj' => $ResimKaynak->error);

    }

}

function SefYap($Veri){
        
    $Veri = str_replace ("ç","c",trim($Veri));
    $Veri = str_replace ("Ç","C",$Veri);
    $Veri = str_replace ("Ğ","G",$Veri);
    $Veri = str_replace ("ğ","g",$Veri);
    $Veri = str_replace ("İ","I",$Veri);
    $Veri = str_replace ("ı","i",$Veri);
    $Veri = str_replace ("ş","s",$Veri);
    $Veri = str_replace ("Ş","S",$Veri);
    $Veri = str_replace ("Ö","O",$Veri);
    $Veri = str_replace ("ö","o",$Veri);
    $Veri = str_replace ("Ü","U",$Veri);
    $Veri = str_replace ("ü","u",$Veri); 
    $Veri =  strtolower($Veri);

    $ara = array('&nbsp','&amp', '&quot;', '<', '>', '&#39', '&#92'); 
    $Veri = str_replace ($ara, '', $Veri); 
    
    $ara = array(' ', '(', ')', '\'', '?', 'http://', '&', '\r\n', '\n', '/', '\\', '+'); 
    $Veri = str_replace ($ara, '-', $Veri); 

    $ara = array('/[^a-z0-9\-<>]/', 
                '/[\-]+/', 
                '/<[^>]*>/'); 
    $degistir = array('', 
                    '-', 
                    ''); 
    $Veri = preg_replace ($ara, $degistir, $Veri); 
    return $Veri;
    
}

function VeriOku($Baglanti, $Header = false, $Proxy = false){

    $Ref = parse_url($Baglanti);
    $Ref = $Ref['host'];

    $CurlBasla = curl_init ();
    curl_setopt($CurlBasla, CURLOPT_URL, $Baglanti);
    
    if(!empty($Proxy['IP']) && !empty($Proxy['Port'])){
        
        $ProxyIP = trim($Proxy['IP']);
        $ProxyPort = trim($Proxy['Port']);
        $ProxyKullaniciAdi = !empty($Proxy['KullaniciAdi'])?trim($Proxy['KullaniciAdi']):false;
        $ProxyParola = !empty($Proxy['Parola'])?trim($Proxy['Parola']):false;

        curl_setopt($CurlBasla, CURLOPT_PROXY, $ProxyIP.':'.$ProxyPort);

        if($ProxyKullaniciAdi){
            curl_setopt($CurlBasla, CURLOPT_PROXYUSERPWD, $ProxyKullaniciAdi.':'.$ProxyParola);
        }

    }
    
    curl_setopt($CurlBasla, CURLOPT_REFERER, 'http://'.$Ref);
    curl_setopt($CurlBasla, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($CurlBasla, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($CurlBasla, CURLOPT_SSL_VERIFYPEER, false);

    if($Header){

        curl_setopt($CurlBasla, CURLOPT_HTTPHEADER, $Header);

    }
    $Sonuc = curl_exec ($CurlBasla);
    curl_close($CurlBasla);
    return $Sonuc;

}

function CokluIstek($Baglantilar, $Proxy, $TimeOut = 300){

    $Curl = array();
    $Sonuc = array();

    $Basla = curl_multi_init();

    foreach ($Baglantilar as $ID => $Baglanti) {

        $Ref = parse_url($Baglanti);
        $Ref = $Ref['host'];
        $Tarayici = "Mozilla/5.0 (Windows; U; Windows NT 6.1; tr; rv:1.9.2.10) Gecko/20100914 Firefox/3.6.10";

        $Curl[$ID] = curl_init();        
        curl_setopt($Curl[$ID], CURLOPT_URL, $Baglanti);
        curl_setopt($Curl[$ID], CURLOPT_HEADER, 0);
        curl_setopt($Curl[$ID], CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($Curl[$ID], CURLOPT_REFERER, 'http://'.$Ref);
        curl_setopt($Curl[$ID], CURLOPT_USERAGENT, $Tarayici);
        curl_setopt($Curl[$ID], CURLOPT_ENCODING, "");
        curl_setopt($Curl[$ID], CURLOPT_AUTOREFERER, 1);

        if(!empty($Proxy['IP']) && !empty($Proxy['Port'])){
            
            $ProxyIP = $Proxy['IP'];
            $ProxyPort = $Proxy['Port'];
            $ProxyKullaniciAdi = !empty($Proxy['KullaniciAdi'])?$Proxy['KullaniciAdi']:false;
            $ProxyParola = !empty($Proxy['Parola'])?$Proxy['Parola']:false;

            curl_setopt($Curl[$ID], CURLOPT_PROXY, $ProxyIP.':'.$ProxyPort);

            if($ProxyKullaniciAdi){

                curl_setopt($Curl[$ID], CURLOPT_PROXYUSERPWD, $ProxyKullaniciAdi.':'.$ProxyParola);

            }

        }

        curl_setopt($Curl[$ID], CURLOPT_CONNECTTIMEOUT, $TimeOut);
        curl_setopt($Curl[$ID], CURLOPT_TIMEOUT, $TimeOut);
        curl_setopt($Curl[$ID], CURLOPT_MAXREDIRS, 5);
        curl_setopt($Curl[$ID], CURLOPT_SSL_VERIFYPEER, false);
        curl_multi_add_handle($Basla, $Curl[$ID]);

    }

    $aktif= null;
    do {
        curl_multi_exec($Basla, $aktif);
    } while ($aktif> 0);

    foreach ($Curl as $ID => $c) {
        $Sonuc[$ID] = curl_multi_getcontent($c);
        curl_multi_remove_handle($Basla, $c);
    }

    curl_multi_close($Basla);

    return $Sonuc;

}

function HataMesaji($Mesaj){

    ?>

        <div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" onclick="$('.ModalGizle2').hide(10)">×</span></button>
            <strong>Hata!</strong> <?=$Mesaj?>
        </div>

    <?php

}

function OlumluMesaj($Mesaj){

    ?>

        <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <strong style="float: left; margin-right: 10px;">Olumlu!</strong> <?=$Mesaj?>
        </div>

    <?php

}

function isJson($Veri) {

    json_decode($Veri);
    return (json_last_error() == JSON_ERROR_NONE);

}

function GoogleScraperData($Baglanti = false, $Proxy = false){

    $Veriler = array();
    
    $Header = array();
    $Header[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0';
    $Header[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8';
    $Header[] = 'Accept-Language: tr-TR,tr;q=0.8,en-US;q=0.5,en;q=0.3';
    $Header[] = 'DNT: 1';
    $Header[] = 'Connection: keep-alive';
    $Header[] = 'Upgrade-Insecure-Requests: 1';
    $Header[] = 'Sec-Fetch-Dest: document';
    $Header[] = 'Sec-Fetch-Mode: navigate';
    $Header[] = 'Sec-Fetch-Site: none';
    $Header[] = 'Sec-Fetch-User: ?1';

    $CurlBasla = curl_init ();
    curl_setopt($CurlBasla, CURLOPT_URL, $Baglanti);
    curl_setopt($CurlBasla, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($CurlBasla, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($CurlBasla, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($CurlBasla, CURLOPT_HTTPHEADER, $Header);
    if($Proxy){
        
        $Proxy = explode(':', $Proxy);
        curl_setopt($CurlBasla, CURLOPT_PROXY, trim($Proxy[0]).':'.trim($Proxy[1]));

        if(!empty($Proxy[2]) && !empty($Proxy[3])){

            curl_setopt($CurlBasla, CURLOPT_PROXYUSERPWD, trim($Proxy[2]).':'.trim($Proxy[3]));

        }

    }

    $Kaynak = curl_exec ($CurlBasla);
    curl_close($CurlBasla);

    $Kaynak = str_replace('/*""*/', '', $Kaynak);

    if (isJson($Kaynak)) {
        
        $Kaynak = json_decode($Kaynak, true);
        $Kaynak = $Kaynak['d'];
        $Kaynak = str_replace(")]}'", '', $Kaynak);

        if (!isJson($Kaynak)) {

            return array('Durum' => 0, 'Mesaj' => 'Url Hata #2');

        }else{

            $DiziSiralamasi = 14;

        }

    }else{
        
        return array('Durum' => 0, 'Mesaj' => 'Url Hata #1');

    }
    
    if (isJson($Kaynak)) {
        
        $Kaynak = json_decode($Kaynak, true);

        if ($DiziSiralamasi == 6) {
            
            $Sonuclar = array($Kaynak);
            $Sonuclar = is_array($Kaynak[0][1])?$Kaynak[0][1]:array();

        }else{

            $Sonuclar = is_array($Kaynak[0][1])?$Kaynak[0][1]:array();

        }


        foreach ($Sonuclar as $Key => $Sonuc) {
            
            if ($DiziSiralamasi == 14) {

                if (!$Key) {
                    
                    continue;

                }

            }

            $MekanAdi = $Sonuc[$DiziSiralamasi][11];
            $RatingOrtalamasi = $Sonuc[$DiziSiralamasi][4][7];
            $ToplamYorum = $Sonuc[$DiziSiralamasi][4][8];
            $Kategorileri = json_encode($Sonuc[$DiziSiralamasi][13], JSON_UNESCAPED_UNICODE);
            $Adresi = $Sonuc[$DiziSiralamasi][18];
            $CalismaSaatleri = $Sonuc[$DiziSiralamasi][34][1];

            $WebSitesi = $Sonuc[$DiziSiralamasi][7][0];

            $Latitude = $Sonuc[$DiziSiralamasi][9][2];
            $Longitude = $Sonuc[$DiziSiralamasi][9][3];

            $SubType = json_encode($Sonuc[$DiziSiralamasi][13], JSON_UNESCAPED_UNICODE);
            $Type = $Sonuc[$DiziSiralamasi][13][0];
            
            $YildizDetaylari = array();
            $Yildizlar = $Sonuc[$DiziSiralamasi][52][3];
            foreach ($Yildizlar as $Key => $Yildiz) {
                
                $YildizDetaylari[($Key+1)] =  $Yildiz;

            }

            $YildizDetaylari = json_encode($YildizDetaylari, JSON_UNESCAPED_UNICODE);

            $TumYorumEtiketleri = array();
            $YorumEtiketleri = $Sonuc[$DiziSiralamasi][153][0];
            foreach ($YorumEtiketleri as $YorumEtiket) {

                $TumYorumEtiketleri[] = $YorumEtiket[1];

            }
            $TumYorumEtiketleri = json_encode($TumYorumEtiketleri, JSON_UNESCAPED_UNICODE);

            $CalismaZamanlari = array();
            foreach ($CalismaSaatleri as $CalismaSaati) {

                $GunAdi = $CalismaSaati[0];
                $Zamani = $CalismaSaati[1][0];

                $CalismaZamanlari[$GunAdi] = $Zamani;

            }

            $CalismaZamanlari = json_encode($CalismaZamanlari, JSON_UNESCAPED_UNICODE);

            $MekanSecenekleri = array();
            $Secenekleri = $Sonuc[$DiziSiralamasi][100];
            foreach ($Secenekleri as $Keyi => $Secenekler) {

                foreach ($Secenekler as $Key => $Secenek) {

                    $MekanSecenekleri[$Secenek[1]] = array();

                    foreach ($Secenek[2] as $Keyi2 => $Secenegi) {

                        if (!$Keyi2 && empty($Secenegi[2][1][0][1])) {

                            $MekanSecenekleri[$Secenek[1]][] = $Secenek[1];

                        }else{

                            if (!empty($Secenegi[2][1][0][1])) {

                                $MekanSecenekleri[$Secenek[1]][] = $Secenegi[2][1][0][1];

                            }

                        }

                    }

                }

            }

            $MekanSecenekleri = json_encode($MekanSecenekleri, JSON_UNESCAPED_UNICODE);

            $LokasyonDetay = $Sonuc[$DiziSiralamasi][183][1];
            $ToplamLokasyon = count($LokasyonDetay);

            $Ulke = $LokasyonDetay[($ToplamLokasyon-1)];
            $Il = $LokasyonDetay[($ToplamLokasyon-2)];
            $PostaKodu = $LokasyonDetay[($ToplamLokasyon-3)];
            $Ilce = $LokasyonDetay[($ToplamLokasyon-4)];

            $Telefon = $Sonuc[$DiziSiralamasi][178][0][0];
            $Category = $Sonuc[$DiziSiralamasi][164][0][1];

            $Logo = $Sonuc[$DiziSiralamasi][157];
            $GoogleID = $Sonuc[$DiziSiralamasi][227][0][0];
            $PlaceID = $Sonuc[$DiziSiralamasi][78];
            $CID = $Sonuc[$DiziSiralamasi][37][0][0][29][1];

            $Veriler[] = array(

                'MekanAdi' => $MekanAdi,
                'Kategoriler' => $Kategorileri,
                'RatingOrtalamasi' => $RatingOrtalamasi,
                'ToplamYorum' => $ToplamYorum,
                'Adresi' => $Adresi,
                'CalismaZamanlari' => $CalismaZamanlari,
                'MekanSecenekleri' => $MekanSecenekleri,
                'Latitude' => $Latitude,
                'Longitude' => $Longitude,
                'Ulke' => $Ulke,
                'Il' => $Il,
                'PostaKodu' => $PostaKodu,
                'Ilce' => $Ilce,
                'WebSitesi' => $WebSitesi,
                'Telefon' => $Telefon,
                'SubType' => $SubType,
                'Type' => $Type,
                'Category' => $Category,
                'YildizDetaylari' => $YildizDetaylari,
                'TumYorumEtiketleri' => $TumYorumEtiketleri,
                'Logo' => $Logo,
                'GoogleID' => $GoogleID,
                'PlaceID' => $PlaceID,
                'CID' => $CID,

            );

            //echo 'Mekan Adı: '.$MekanAdi.'<br />';
            //echo 'Kategorileri: '.implode(',', $Kategorileri).'<br />';
            //echo 'RatingOrtalamasi: '.$RatingOrtalamasi.'<br />';
            //echo 'ToplamYorum: '.$ToplamYorum.'<br />';
            //echo 'Adresi: '.$Adresi.'<br />';
            //echo 'CalismaZamanlari: '.$CalismaZamanlari.'<br />';
            //echo 'MekanSecenekleri: '.$MekanSecenekleri.'<br />';
            //echo 'Latitude: '.$Latitude.'<br />';
            //echo 'Longitude: '.$Longitude.'<br />';
            //echo 'Ulke: '.$Ulke.'<br />';
            //echo 'Il: '.$Il.'<br />';
            //echo 'PostaKodu: '.$PostaKodu.'<br />';
            //echo 'Ilce: '.$Ilce.'<br />';
            //echo 'WebSitesi: '.$WebSitesi.'<br />';
            //echo 'Telefon: '.$Telefon.'<br />';
            //echo 'SubType: '.$SubType.'<br />';
            //echo 'Type: '.$Type.'<br />';
            //echo 'Category: '.$Category.'<br />';
            //echo 'YildizDetaylari: '.$YildizDetaylari.'<br />';
            //echo 'TumYorumEtiketleri: '.$TumYorumEtiketleri.'<br />';
            //echo 'Logo: '.$Logo.'<br />';
            //echo 'GoogleID: '.$GoogleID.'<br />';
            //echo 'PlaceID: '.$PlaceID.'<br />';
            //echo 'CID: '.$CID.'<br />';
            //PR($Sonuc);
            //break;
            
        }
        
    }
    
    if ($Veriler) {
        
        return array('Durum' => 1, 'Detaylar' => $Veriler);

    }else{

        return array('Durum' => 0, 'Mesaj' => 'Veri Bulunamadı');

    }

}

function GoogleScraperData2($Baglanti = false, $Kaynak = false){

    $Veriler = array();

    if ($Baglanti) {
        
        $Header = array();
        $Header[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0';
        $Header[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8';
        $Header[] = 'Accept-Language: tr-TR,tr;q=0.8,en-US;q=0.5,en;q=0.3';
        $Header[] = 'DNT: 1';
        $Header[] = 'Connection: keep-alive';
        $Header[] = 'Upgrade-Insecure-Requests: 1';
        $Header[] = 'Sec-Fetch-Dest: document';
        $Header[] = 'Sec-Fetch-Mode: navigate';
        $Header[] = 'Sec-Fetch-Site: none';
        $Header[] = 'Sec-Fetch-User: ?1';

        $CurlBasla = curl_init ();
        curl_setopt($CurlBasla, CURLOPT_URL, $Baglanti);
        curl_setopt($CurlBasla, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($CurlBasla, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($CurlBasla, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($CurlBasla, CURLOPT_HTTPHEADER, $Header);
        $Kaynak = curl_exec ($CurlBasla);
        curl_close($CurlBasla);

        $Kaynak = str_replace(")]}'", '', $Kaynak);

        if (isJson($Kaynak)) {
            
            $Kaynaklar = json_decode($Kaynak, true);
            $Kaynaklar = $Kaynaklar[0];
            
        }else{
            
            return array('Durum' => 0, 'Mesaj' => 'Url Hata #1');

        }

    }else{

        if ($Kaynak) {

            //$Kaynak = stripcslashes($Kaynak);
            //$Kaynak = str_replace(array('",")]}\''), '', $Kaynak);
            //$Kaynak = str_replace(array("\")]}'"), '', $Kaynak);

            if (isJson($Kaynak)) {
                
                $Kaynaklar = json_decode($Kaynak, true);
                $Kaynak1 = $Kaynaklar[3][5];
                $Kaynak2 = end($Kaynaklar[3]);


                $Kaynak = str_replace(")]}'", '', $Kaynak2);

                if (!isJson($Kaynak)) {

                    return array('Durum' => 0, 'Mesaj' => 'Kaynak Kod Hata #3');

                }else{

                    $Kaynaklar = json_decode($Kaynak, true);
                    $Kaynaklar = $Kaynaklar[24][0];

                }
                
            }else{

                return array('Durum' => 0, 'Mesaj' => 'Kaynak Kod Hata #2');

            }

        }else{

            return array('Durum' => 0, 'Mesaj' => 'Kaynak Kod Hata #1');

        }

    }

    if (isJson($Kaynaklar)) {
        
        foreach ($Kaynaklar as $Key => $Kaynak) {
            
            //if ($Kaynak[20] == 'Photo') {
                $ResimID = $Kaynak[0];
                $Veriler[] = $ResimID;
                //echo $Key.' - <a href="https://lh5.googleusercontent.com/p/'.$ResimID.'" target="_blank">'.$ResimID.'</a><br />';
            //}

        }
        
    }

    return $Veriler;

}

function ChatGptAra($AranacakBaslik, $ChatgptKey, $KacSeferDonsun = 10){

    //echo 'AranacakBaslik: '.nl2br($AranacakBaslik).'<br /><hr />';
    $Veri = array(
        'model' => 'text-davinci-003',
        'prompt' => $AranacakBaslik,
        'temperature' => 0.5,
        'max_tokens' => 2500,
        'top_p' =>  1.0,
        'frequency_penalty' => 0.0,
        'presence_penalty' => 0.0
    );

    $Baglanti = 'https://api.openai.com/v1/completions';


    $Header = array();
    $Header[] = "Content-Type: application/json";
    $Header[] = "Authorization: Bearer ".$ChatgptKey;

    for ($i=0; $i < $KacSeferDonsun; $i++) { 

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $Baglanti);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $Header);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($Veri));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        $Sonuc = curl_exec($ch);
        curl_close($ch);

        $Sonuc = json_decode($Sonuc, true);

        if (isset($Sonuc['error']['message'])) {
            
            return array('Durum' => 2, 'Mesaj' => $Sonuc['error']['message'].' '.$Sonuc['error']['code']);
            return false;

        }

        $Yazi = isset($Sonuc['choices'][0]['text'])?$Sonuc['choices'][0]['text']:false;

        if ($Yazi) {
            
            //echo '<br /><br /><br />'.nl2br($Yazi).'<hr />';
            return array('Durum' => 1, 'Mesaj' => $Yazi);
            break;

        }

        sleep(3);

    }

    return array('Durum' => 0, 'Mesaj' => false);

}

function ChatGptAra2($AranacakBaslik, $ChatgptKey, $KacSeferDonsun = 10){

    //echo 'AranacakBaslik: '.nl2br($AranacakBaslik).'<br /><hr />';
    $Veri = array(
        'model' => 'gpt-3.5-turbo-16k',
        'messages' => [
            ['role' => 'user', 'content' => $AranacakBaslik],
        ]
    );

    $Baglanti = 'https://api.openai.com/v1/chat/completions';

    $Header = array();
    $Header[] = "Content-Type: application/json";
    $Header[] = "Authorization: Bearer ".$ChatgptKey;

    for ($i=0; $i < $KacSeferDonsun; $i++) { 

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $Baglanti);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $Header);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($Veri));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        $Sonuc = curl_exec($ch);
        curl_close($ch);

        $Sonuc = json_decode($Sonuc, true);

        if (isset($Sonuc['error']['message'])) {
            
            return array('Durum' => 2, 'Mesaj' => $Sonuc['error']['message'].' '.$Sonuc['error']['code']);
            return false;

        }

        $Yazi = isset($Sonuc['choices'][0]['message']['content'])?$Sonuc['choices'][0]['message']['content']:false;
        
        if ($Yazi) {
            
            //echo '<br /><br /><br />'.nl2br($Yazi).'<hr />';
            return array('Durum' => 1, 'Mesaj' => $Yazi);
            break;

        }

        sleep(3);

    }

    return array('Durum' => 0, 'Mesaj' => false);

}

function ReklamKontrol2($EngellenecekSiteler, $ReklamKodu = false){

    $EngellenecekSiteler = is_array($EngellenecekSiteler)?$EngellenecekSiteler:explode(',', $EngellenecekSiteler);
    $EngellenecekSiteler = array_map('trim', $EngellenecekSiteler);

    $GelenRef = isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:false;

    $CookieAdi = "FilreliSite";

    $Durum = true;

    if (!isset($_COOKIE[$CookieAdi])) {

        if (!empty($GelenRef)) {

            $RefDomain = parse_url($GelenRef, PHP_URL_HOST);
            $RefAltDomain = explode('.', $RefDomain);

            if(count($RefAltDomain) > 2) {

                $RefDomain = $RefAltDomain[count($RefAltDomain)-2].'.'.$RefAltDomain[count($RefAltDomain)-1];

            }

            if (in_array($RefDomain, $EngellenecekSiteler)) {
                
                setcookie($CookieAdi, "true", time() + (86400 * 30), "/");
                $Durum = false;

            }

        } 

    } else {

        $Durum = false;

    }

    if ($Durum) {
        
        return $ReklamKodu?$ReklamKodu:true;
        
    }

    return false;

}

function ReklamKontrol($EngellenecekSiteler, $ReklamKodu = false){

    $EngellenecekSiteler = is_array($EngellenecekSiteler)?$EngellenecekSiteler:explode(',', $EngellenecekSiteler);
    $EngellenecekSiteler = array_map('trim', $EngellenecekSiteler);

    $GelenRef = isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:false;

    $CookieAdi = "FilreliSite";

    $Durum = true;

    if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'bot') !== false) {
        
        setcookie($CookieAdi, "true", time() + (86400 * 30), "/");
        $Durum = false;

    }

    if (!isset($_COOKIE[$CookieAdi]) && $Durum) {

        if (!empty($GelenRef)) {

            $RefDomain = parse_url($GelenRef, PHP_URL_HOST);
            $RefAltDomain = explode('.', $RefDomain);

            if(count($RefAltDomain) > 2) {

                $RefDomain = $RefAltDomain[count($RefAltDomain)-2].'.'.$RefAltDomain[count($RefAltDomain)-1];

            }

            if (in_array($RefDomain, $EngellenecekSiteler)) {
                
                setcookie($CookieAdi, "true", time() + (86400 * 30), "/");
                $Durum = false;

            }

        } 

    } else {

        $Durum = false;

    }

    if ($Durum) {
        
        return $ReklamKodu?$ReklamKodu:true;
        
    }

    return false;

}


?>