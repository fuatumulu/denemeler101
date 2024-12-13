<div class="col-md-3 left_col menu_fixed mCustomScrollbar _mCS_1 mCS-autoHide">

    <div class="left_col scroll-view">

        <div class="navbar nav_title" style="border: 0;">

            <a href="index.php" class="site_title" style="text-align: center;">Panel</span></a>

        </div>

        <div class="clearfix"></div>
        <br />

        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3 style="font-size: 12px;">Menüler</h3>

                <ul class="nav side-menu">

                    <li <?=$Sayfa==''?'class="active"':''?>><a href="./"><i class="fa fa-home"></i> Ana Sayfa</a></li>
                    <li <?=$Sayfa=='GenelAyarlar'?'class="active"':''?>><a href="./index.php?Sayfa=GenelAyarlar"><i class="fa fa-edit"></i> Genel Ayarlar</a></li>
                    <li <?=$Sayfa=='RestoranEkle'?'class="active"':''?>><a href="./index.php?Sayfa=RestoranEkle"><i class="fa fa-edit"></i> Restoran Ekle</a></li>
                    <li <?=$Sayfa=='Restoranlar'?'class="active"':''?>><a href="./index.php?Sayfa=Restoranlar"><i class="fa fa-edit"></i> Restoranlar</a></li>
                    <li <?=$Sayfa=='Onaylanacaklar'?'class="active"':''?>><a href="./index.php?Sayfa=Onaylanacaklar"><i class="fa fa-edit"></i> Onaylanacaklar</a></li>
                    <li <?=$Sayfa=='SayfaEkle'?'class="active"':''?>><a href="./index.php?Sayfa=SayfaEkle"><i class="fa fa-edit"></i> Sayfa Ekle</a></li>
                    <li <?=$Sayfa=='Sayfalar'?'class="active"':''?>><a href="./index.php?Sayfa=Sayfalar"><i class="fa fa-edit"></i> Sayfalar</a></li>
                    <li <?=$Sayfa=='Reklamlar'?'class="active"':''?>><a href="./index.php?Sayfa=Reklamlar"><i class="fa fa-edit"></i> Reklamlar</a></li>
                    <li <?=$Sayfa=='TumUrller'?'class="active"':''?>><a href="./index.php?Sayfa=TumUrller"><i class="fa fa-edit"></i> Tüm Urller</a></li>
                    <li <?=$Sayfa=='UlkeEkle' || $Sayfa=='Ulkeler'?'class="active"':''?>><a><i class="fa fa-align-justify"></i> Ülkeler <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" <?=$Sayfa=='UlkeEkle' || $Sayfa=='Ulkeler'?'style="display: block;"':''?>>
                            <li <?=$Sayfa=='UlkeEkle'?'class="active"':''?>><a href="./index.php?Sayfa=UlkeEkle">Ülke Ekle</a></li>
                            <li <?=$Sayfa=='Ulkeler'?'class="active"':''?>><a href="./index.php?Sayfa=Ulkeler">Ülkeler</a></li>
                        </ul>
                    </li>
                    <li <?=$Sayfa=='ChatGPTApileri'?'class="active"':''?>><a href="./index.php?Sayfa=ChatGPTApileri"><i class="fa fa-edit"></i> Chat GPT Apileri</a></li>
                    <li <?=$Sayfa=='ChatGptPromtEkle' || $Sayfa=='ChatGptPromtlar' || $Sayfa == 'ChatGptPromtDuzenle'?'class="active"':''?>><a><i class="fa fa-align-justify"></i> Chat GPT Promtlar <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" <?=$Sayfa=='ChatGptPromtEkle' || $Sayfa=='ChatGptPromtlar' || $Sayfa == 'ChatGptPromtDuzenle'?'style="display: block;"':''?>>
                            <li <?=$Sayfa=='ChatGptPromtEkle'?'class="active"':''?>><a href="./index.php?Sayfa=ChatGptPromtEkle">Promt Ekle</a></li>
                            <li <?=$Sayfa=='ChatGptPromtlar' || $Sayfa == 'ChatGptPromtDuzenle'?'class="active"':''?>><a href="./index.php?Sayfa=ChatGptPromtlar">Chat GPT Promtlar</a></li>
                        </ul>
                    </li>
                    <li <?=$Sayfa=='ProxyEkle'||$Sayfa=='Proxyler'?'class="active"':''?>><a><i class="fa fa-align-justify"></i> Proxyler <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" <?=$Sayfa=='ProxyEkle'||$Sayfa=='Proxyler'?'style="display: block;"':''?>>
                            <li <?=$Sayfa=='ProxyEkle'?'class="active"':''?>><a href="./index.php?Sayfa=ProxyEkle">Proxy Ekle</a></li>
                            <li <?=$Sayfa=='Proxyler'?'class="active"':''?>><a href="./index.php?Sayfa=Proxyler">Proxyler</a></li>
                        </ul>
                    </li>
                    <li <?=$Sayfa=='FooterLinkEkle'||$Sayfa=='FooterLinkler'?'class="active"':''?>><a><i class="fa fa-align-justify"></i> Footer Linkler <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" <?=$Sayfa=='FooterLinkEkle'||$Sayfa=='FooterLinkler'?'style="display: block;"':''?>>
                            <li <?=$Sayfa=='FooterLinkEkle'?'class="active"':''?>><a href="./index.php?Sayfa=FooterLinkEkle">Footer Link Ekle</a></li>
                            <li <?=$Sayfa=='FooterLinkler'?'class="active"':''?>><a href="./index.php?Sayfa=FooterLinkler">Footer Linkler</a></li>
                        </ul>
                    </li>

                    <li <?=$Sayfa=='Cikis'?'class="active"':''?>><a href="./index.php?Sayfa=Cikis"><i class="fa fa-close"></i> Çıkış Yap</a></li>

                </ul>

            </div>

        </div>

    </div>

</div>