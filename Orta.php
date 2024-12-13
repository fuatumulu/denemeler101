<?php
    
    $ToplamUlkesi = 0;
    $TumUlkeler = array();
    $Ulkeler = VerileriVer('ulkeler', false, "UlkeDurum='1'", false, "UlkeBaslik ASC");
    foreach ($Ulkeler as $Ulke) {
        
        $TumUlkeler[substr($Ulke['UlkeBaslik'], 0, 1)][] = $Ulke;
        $ToplamUlkesi++;

    }

?>
<?php

            if(ReklamKontrol($EngellenecekSiteler)){

                ?>


                <?php

   }
?>

            <div class="row" style="border-bottom:1px solid #e1e1e1">
                <div class="twelve columns" style="text-align:center;margin:10px"><b>
                    <a href="<?=$GenelAyarlar['SiteURL']?>" style="text-decoration:none;color:#000" class="vmtitle"><?=ucfirst(str_replace(array('http://','https://'), '', $GenelAyarlar['SiteURL']))?></a>
                </b></div>
            </div>
            <div class="row" style="margin-top:10px">
                <div class="twelve columns"><b>Home</b></div>
            </div>
            <div class="row">
                <div class="four columns" style="margin-top:10px"><a href="<?=$GenelAyarlar['SiteURL']?>"></a></div>
                
                <div style="clear: both;"></div>
 				<main class="main-search-page" style="padding: 0; min-height: auto; border-radius: 15px; margin: 15px auto;">
                    <div class="container" style=" min-height: auto; width: 100%">
                        <div class="box" style="max-width: 95%;">
                            <form action="./search" method="GET" class="pressed">
                                <i class="uil uil-search search-icon"></i>
                                <input type="text" name="q" class="search-input" placeholder="Search Places">
                                <button type="submit" class="submit-button btn-primary">Search</button>
                            </form>
                        </div>
                    </div>
                </main>
				
                <div class="row">
                    <div class="twelve columns" style="margin-top:10px">
                        <h1>Countries</h1>
                    </div>
                </div>
                <div class="row">

                    <?php

                        $GenelSay = 0;
                        foreach ($TumUlkeler as $BasHarfi => $Ulkeler) {

                                $Say = 0;
                                foreach ($Ulkeler as $Ulke) {
                                    
                                    $GenelSay++;

                                    if ($Say == 3) {

                                        echo '</div><div class="row">';
                                        $Say = 0;

                                    }

                                    $UlkeAdi = str_replace(" Of ", ' of ', mb_convert_case($Ulke['UlkeBaslik'], MB_CASE_TITLE, "UTF-8"));

                                    echo '<div class="four columns" style="margin-top:10px"><a href="'.$GenelAyarlar['SiteURL'].'/'.$Ulke['UlkeKisaKodu'].'/">'.$UlkeAdi.'</a></div>';
                                    
                                    $Say++;

                                }


                        }

                    ?>

                </div>

            </div>
 <?php
  global $MysqlBaglan;
                $Restoranlar = VerileriVerIndex('restoranlar', false, "RestoranDurum='1'", 12);
                echo '<div class="row">';

                $Say = 1;

                $GenelSay = 1;
                foreach ($Restoranlar as $Mekan) {
                    
                    if ($Say%2) {


                        echo '</div><div class="row">';


                    }

                    echo '<div class="six columns" style="margin-top:10px"><p><b>'.$Say.'. <a href="'.$GenelAyarlar['SiteURL'].'/'.$Mekan['RestoranSef'].'">'.$Mekan['RestoranMekanAdi'].'</a></b><br>'.$Mekan['RestoranAdresi'].'<br>Coordinate: <a href="https://www.google.com/maps/place/'.$Mekan['RestoranLokasyonLatitude'].','.$Mekan['RestoranLokasyonLongitude'].'" target="_blank" rel="noreferrer nofollow">'.$Mekan['RestoranLokasyonLatitude'].', '.$Mekan['RestoranLokasyonLongitude'].'</a><br></p></div>';

                    $Say++;
                    $GenelSay++;

                }

                echo '</div>';

            ?>
           
