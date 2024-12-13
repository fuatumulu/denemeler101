<?php
    
    $ToplamMekan = VeriSay('restoranlar', 'RestoranID', "RestoranMekanAdi LIKE '%$Kelime%'");
    $Limit = 12;
    $ToplamSayfa = ceil($ToplamMekan / $Limit);
    $ToplamSayfa = $ToplamSayfa?$ToplamSayfa:1;
    $AktifSayfa = isset($_GET['page']) && is_numeric($_GET['page'])?$_GET['page']:1;
    $Baslangic  = ($AktifSayfa * $Limit) - $Limit; 
    
    $TumMekanlar = array();
    $Restoranlar = VerileriVer('restoranlar', false, "RestoranMekanAdi LIKE '%$Kelime%' AND RestoranDurum='1'", $Limit, "RestoranMekanAdi ASC", $Baslangic);
?>
            

            <div class="row" style="border-bottom:1px solid #e1e1e1">
                <div class="twelve columns" style="text-align:center;margin:10px"><b>
                    <a href="<?=$GenelAyarlar['SiteURL']?>" style="text-decoration:none;color:#000" class="vmtitle"><?=ucfirst(str_replace(array('http://','https://'), '', $GenelAyarlar['SiteURL']))?></a>
                </b></div>
            </div>

            <div class="row" style="margin-top:10px">
                <div class="twelve columns">
                    <b>
                        <a href="<?=$GenelAyarlar['SiteURL']?>">Home</a> - <?=$Kelime?>
                    </b>
                </div>
            </div>

            <div class="row" style="margin-top:10px">
                <h1><b>Search in "<?=$Kelime?>"</b></h1>
            </div>
            <div class="row">

                <div class="twelve columns" style="margin-top:10px;border-bottom:1px solid #e1e1e1">
                    <b>Found: <?=number_format($ToplamMekan)?> place Types, <?=number_format($ToplamSayfa)?> Pages</b><br>
                    <b>Page:&nbsp;&nbsp; 

                    <?php

                        if ($AktifSayfa > 1) {
                            
                            echo '<a href="'.$GenelAyarlar['SiteURL'].'/search?q='.$Kelime.'&page=1" style="padding-right:10px">First</a>';

                        }
                        
                        for($x = ($AktifSayfa - 3); $x <= ($AktifSayfa + 3); $x++){
                            
                            if ($x > 0 && $x <= $ToplamSayfa ) {

                                if ($x == $AktifSayfa) {

                                    echo '<span style="padding-right:10px;color:red">'.$x.'</span> ';

                                }else{

                                    echo '<a href="'.$GenelAyarlar['SiteURL'].'/search?q='.$Kelime.'&page='.$x.'" style="padding-right:10px">'.$x.'</a>';

                                }

                            }

                        }

                        if ($AktifSayfa < $ToplamSayfa) {

                            echo '<a href="'.$GenelAyarlar['SiteURL'].'/search?q='.$Kelime.'&page='.$ToplamSayfa.'" style="padding-right:10px">Last</a>';

                        }

                    ?>
                    </b>
                </div>
            </div>

                
                <?php

                    //echo '<div class="six columns" style="margin-top:10px">';
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


            <div class="row" style="margin-top: 15px;">

                <div class="twelve columns" style="border-top:1px solid #e1e1e1; padding-top: 10px; padding-bottom: 10px;">

                    <b>Found: <?=number_format($ToplamMekan)?> place Types, <?=number_format($ToplamSayfa)?> Pages</b><br>
                    <b>Page:&nbsp;&nbsp; 

                    <?php

                        if ($AktifSayfa > 1) {
                            
                            echo '<a href="'.$GenelAyarlar['SiteURL'].'/search?q='.$Kelime.'&page=1" style="padding-right:10px">First</a>';

                        }
                        
                        for($x = ($AktifSayfa - 3); $x <= ($AktifSayfa + 3); $x++){
                            
                            if ($x > 0 && $x <= $ToplamSayfa ) {

                                if ($x == $AktifSayfa) {

                                    echo '<span style="padding-right:10px;color:red">'.$x.'</span> ';

                                }else{

                                    echo '<a href="'.$GenelAyarlar['SiteURL'].'/search?q='.$Kelime.'&page='.$x.'" style="padding-right:10px">'.$x.'</a>';

                                }

                            }

                        }

                        if ($AktifSayfa < $ToplamSayfa) {

                            echo '<a href="'.$GenelAyarlar['SiteURL'].'/search?q='.$Kelime.'&page='.$ToplamSayfa.'" style="padding-right:10px">Last</a>';

                        }

                    ?>
                    </b>

                </div>

            </div>
