<html lang="en">
        <link rel="icon" href="images/favicon.png">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <meta name="viewport" content="width=device-width">
        <meta charset="utf-8">
        <title><?=$GenelBaslik?></title>
        <link rel="icon" href="images/favicon.png">
        <link rel="stylesheet" href="css/346b7eacf5f167bf.css" data-n-g>
        <link rel="stylesheet" href="css/5649d9f65f3285f8.css" data-n-p>
        <style id="__jsx-3032750110">
            #nprogress {
                pointer-events: none
            }       

            #nprogress .bar {
                background: #4E66F8;
                position: fixed;
                z-index: 9999;
                top: 0;
                left: 0;
                width: 100%;
                height: 3px
            }

            #nprogress .peg {
                display: block;
                position: absolute;
                right: 0px;
                width: 100px;
                height: 100%;
                box-shadow: 0 0 10px #4E66F8, 0 0 5px #4E66F8;
                opacity: 1;
                -webkit-transform: rotate(3deg) translate(0px, -4px);
                -ms-transform: rotate(3deg) translate(0px, -4px);
                -webkit-transform: rotate(3deg) translate(0px, -4px);
                -moz-transform: rotate(3deg) translate(0px, -4px);
                -ms-transform: rotate(3deg) translate(0px, -4px);
                transform: rotate(3deg) translate(0px, -4px)
            }

            #nprogress .spinner {
                display: block;
                position: fixed;
                z-index: 1031;
                top: 15px;
                right: 15px
            }

            #nprogress .spinner-icon {
                width: 18px;
                height: 18px;
                box-sizing: border-box;
                border: solid 2px transparent;
                border-top-color: #4E66F8;
                border-left-color: #4E66F8;
                border-radius: 50%;
                -webkit-animation: nprogresss-spinner 400ms linear infinite;
                -webkit-animation: nprogress-spinner 400ms linear infinite;
                animation: nprogress-spinner 400ms linear infinite
            }

            .nprogress-custom-parent {
                overflow: hidden;
                position: relative
            }

            .nprogress-custom-parent #nprogress .spinner,
            .nprogress-custom-parent #nprogress .bar {
                position: absolute
            }

            @keyframes nprogress-spinner {
                0% {
                    -webkit-transform: rotate(0deg)
                }

                100% {
                    -webkit-transform: rotate(360deg)
                }
            }

            @keyframes nprogress-spinner {
                0% {
                    transform: rotate(0deg)
                }

                100% {
                    transform: rotate(360deg)
                }
            }
        </style>
        <style data-href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:ital,wght@0,300;0,400;0,700;1,400&display=swap">
            @font-face {
                font-family: 'Playfair Display';
                font-style: normal;
                font-weight: 700;
                font-display: swap;
                src: url(fonts/nuFvD-vYSZviVYUb_rj3ij__anPXJzDwcbmjWBN2PKeiukDT.woff) format('woff')
            }

            @font-face {
                font-family: 'Poppins';
                font-style: italic;
                font-weight: 400;
                font-display: swap;
                src: url(fonts/pxiGyp8kv8JHgFVrJJLedA.woff) format('woff')
            }

            @font-face {
                font-family: 'Poppins';
                font-style: normal;
                font-weight: 300;
                font-display: swap;
                src: url(fonts/pxiByp8kv8JHgFVrLDz8V1g.woff) format('woff')
            }

            @font-face {
                font-family: 'Poppins';
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: url(fonts/pxiEyp8kv8JHgFVrFJM.woff) format('woff')
            }

            @font-face {
                font-family: 'Poppins';
                font-style: normal;
                font-weight: 700;
                font-display: swap;
                src: url(fonts/pxiByp8kv8JHgFVrLCz7V1g.woff) format('woff')
            }

            @font-face {
                font-family: 'Playfair Display';
                font-style: normal;
                font-weight: 700;
                font-display: swap;
                src: url(fonts/nuFvD-vYSZviVYUb_rj3ij__anPXJzDwcbmjWBN2PKeiunDTbtXK-F2qC0usEw.woff) format('woff');
                unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116
            }

            @font-face {
                font-family: 'Playfair Display';
                font-style: normal;
                font-weight: 700;
                font-display: swap;
                src: url(fonts/nuFvD-vYSZviVYUb_rj3ij__anPXJzDwcbmjWBN2PKeiunDYbtXK-F2qC0usEw.woff) format('woff');
                unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB
            }

            @font-face {
                font-family: 'Playfair Display';
                font-style: normal;
                font-weight: 700;
                font-display: swap;
                src: url(fonts/nuFvD-vYSZviVYUb_rj3ij__anPXJzDwcbmjWBN2PKeiunDZbtXK-F2qC0usEw.woff) format('woff');
                unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF
            }

            @font-face {
                font-family: 'Playfair Display';
                font-style: normal;
                font-weight: 700;
                font-display: swap;
                src: url(fonts/nuFvD-vYSZviVYUb_rj3ij__anPXJzDwcbmjWBN2PKeiunDXbtXK-F2qC0s.woff) format('woff');
                unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD
            }

            @font-face {
                font-family: 'Poppins';
                font-style: italic;
                font-weight: 400;
                font-display: swap;
                src: url(fonts/pxiGyp8kv8JHgFVrJJLucXtAOvWDSHFF.woff2) format('woff2');
                unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB
            }

            @font-face {
                font-family: 'Poppins';
                font-style: italic;
                font-weight: 400;
                font-display: swap;
                src: url(fonts/pxiGyp8kv8JHgFVrJJLufntAOvWDSHFF.woff2) format('woff2');
                unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF
            }

            @font-face {
                font-family: 'Poppins';
                font-style: italic;
                font-weight: 400;
                font-display: swap;
                src: url(fonts/pxiGyp8kv8JHgFVrJJLucHtAOvWDSA.woff2) format('woff2');
                unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD
            }

            @font-face {
                font-family: 'Poppins';
                font-style: normal;
                font-weight: 300;
                font-display: swap;
                src: url(fonts/pxiByp8kv8JHgFVrLDz8Z11lFd2JQEl8qw.woff2) format('woff2');
                unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB
            }

            @font-face {
                font-family: 'Poppins';
                font-style: normal;
                font-weight: 300;
                font-display: swap;
                src: url(fonts/pxiByp8kv8JHgFVrLDz8Z1JlFd2JQEl8qw.woff2) format('woff2');
                unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF
            }

            @font-face {
                font-family: 'Poppins';
                font-style: normal;
                font-weight: 300;
                font-display: swap;
                src: url(fonts/pxiByp8kv8JHgFVrLDz8Z1xlFd2JQEk.woff2) format('woff2');
                unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD
            }

            @font-face {
                font-family: 'Poppins';
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: url(fonts/pxiEyp8kv8JHgFVrJJbecnFHGPezSQ.woff2) format('woff2');
                unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB
            }

            @font-face {
                font-family: 'Poppins';
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: url(fonts/pxiEyp8kv8JHgFVrJJnecnFHGPezSQ.woff2) format('woff2');
                unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF
            }

            @font-face {
                font-family: 'Poppins';
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: url(fonts/pxiEyp8kv8JHgFVrJJfecnFHGPc.woff2) format('woff2');
                unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD
            }

            @font-face {
                font-family: 'Poppins';
                font-style: normal;
                font-weight: 700;
                font-display: swap;
                src: url(fonts/pxiByp8kv8JHgFVrLCz7Z11lFd2JQEl8qw.woff2) format('woff2');
                unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB
            }

            @font-face {
                font-family: 'Poppins';
                font-style: normal;
                font-weight: 700;
                font-display: swap;
                src: url(fonts/pxiByp8kv8JHgFVrLCz7Z1JlFd2JQEl8qw.woff2) format('woff2');
                unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF
            }

            @font-face {
                font-family: 'Poppins';
                font-style: normal;
                font-weight: 700;
                font-display: swap;
                src: url(fonts/pxiByp8kv8JHgFVrLCz7Z1xlFd2JQEk.woff2) format('woff2');
                unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD
            }
            .nav-link{
                color: #ffffff !important;
            }

            #MobilMenusu{


            }
            
/* Masaüstü ve diğer büyük ekranlar için konteyneri gizle */
#adsense-container {
    display: none; /* Varsayılan olarak gizle */
}

/* Mobil cihazlar için reklamı göster */
@media (max-width: 768px) { /* 768px ve altı ekran boyutları genellikle mobil cihazlar için kullanılır */
    #adsense-container {
        display: block; /* Mobil cihazlarda reklamı göster */
        width: 100%; /* Konteyner genişliği ekran genişliğine uyum sağlar */
        text-align: center; /* Reklamı merkeze alır */
        margin: 20px 0; /* Üst ve alttan boşluk ekler */
    }
}
}
}

/* İkinci reklam konteyneri tüm cihazlarda görünür */
#adsense-container-general {
    display: block; /* Tüm cihazlarda göster */
    width: 100%; /* Konteyner genişliği ekran genişliğine uyum sağlar */
    text-align: center; /* Reklamı merkeze alır */
    margin: 20px 0; /* Üst ve alttan boşluk ekler */
    /* İkinci konteyner için ekstra stil ayarları yapılabilir */
}
            
            @media(max-width: 992px) {

                #MobilMenusu{

                    position: absolute;
                    right: 0;
                    left: 0;
                    float: left;
                    z-index: 999;
                    background: #4664f4;
                    width: 100%;
                    padding-left: 25px;
                    margin-top: 40px;

                }

            }

        </style>
		<?=$GenelAyarlar['AnalyticsKodu']?>
    </head>
<?=$Kodlar?>
    <body>
        <div>
            <div>
                <header class="header">
                    <nav class="shadow navbar navbar-expand-lg navbar-light bg-white" style="background: #4e66f8 !important;">
                        <div class="container-fluid">
                            <div class="d-flex align-items-center" style="display: none !important;">
                                <a href="./" class="py-1 navbar-brand">
                                    <img src="<?=$GenelAyarlar['SiteLogo']?>" width="138" height="31" alt="Directory logo">
                                </a>
                            </div>
                            <button aria-controls="navbar-main-menu" type="button" aria-label="Toggle navigation" class="navbar-toggler collapsed">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" class="svg-inline--fa fa-bars fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" />
                                </svg>
                            </button>
                            <div class="container">

                                <div class="navbar-collapse collapse" id="navbar-main-menu">
                                    
<div style="float: left; color: #ffffff; font-size: 22px; font-weight: bold; cursor: pointer;" onclick="window.location.href='https://locationoverworld.com/';" id="Logosu">WLM</div>
                                    
                                    <div class="ms-auto align-items-lg-center navbar-nav " id="MobilMenusu" style="position: absolute; right: 0;">
                                        <div class="nav-item">
                                            <a href="./" class="nav-link">Home</a>
                                        </div>
                                        <div class="nav-item">
                                            <a href="./us/" class="nav-link">United States</a>
                                        </div>
                                        <div class="nav-item">
                                            <a href="./uk/" class="nav-link">United Kingdom</a>
                                        </div>
                                        <div class="nav-item">
                                            <a href="./de/" class="nav-link">Germany</a>
                                        </div>
                                        <div class="nav-item">
                                            <a href="https://locationoverworld.com/page-4" class="nav-link">Contact Us</a>
                                        </div>
                                        <div class="nav-item">
                                            <a href="./privacy-policy" class="nav-link">Privacy Policy</a>
                                        </div>
                                        <div class="nav-item">
                                            <a href="./terms-of-use" class="nav-link">Terms of Use</a>
                                        </div>
                                    </div>
                                </div>
                                

                            </div>
                            
                        </div>
                        
                    </nav>
                </header>

                <?php
                    
                    if(ReklamKontrol($EngellenecekSiteler)){

                        ?>

                            <div id="adsense-container">

								<?php

            if(ReklamKontrol($EngellenecekSiteler)){

                ?>
REKLAM

                <?php

   }
?>
								
								
                            </div>

                        <?php

                    }

                ?>
                <main>
                    <?php

                        $BugunAcikKalmaZamani = '';
                        $AcikKalmaZamanlari = $RestoranBilgisi['RestoranAcikKalmaZamanlari'];
                        if (!empty($AcikKalmaZamanlari)) {
                            
                            $AcikKalmaZamanlari = json_decode($AcikKalmaZamanlari, true);

                            if (isset($AcikKalmaZamanlari[date('l')])) {

                                if ($AcikKalmaZamanlari[date('l')] != 'Closed') {
        

                                    $Zamanlar = explode('–', $AcikKalmaZamanlari[date('l')]);
                                    $Zaman1 = isset($Zamanlar[0])?$Zamanlar[0]:false;
                                    $Zaman2 = isset($Zamanlar[1])?$Zamanlar[1]:false;

                                    if ($Zaman1 && $Zaman2) {

                                        //list($Zaman1, $Zaman2) = explode('–', $Zamanlar);

                                        $Zaman1 = strtotime(trim($Zaman1));
                                        $Zaman2 = strtotime(trim($Zaman2));

                                        $BugunAcikKalmaZamani = date('h:i A', $Zaman1).' - '.date('h:i A', $Zaman2);

                                    }else{

                                        $BugunAcikKalmaZamani = '-';

                                    }

                                }else{

                                    $BugunAcikKalmaZamani = $AcikKalmaZamanlari[date('l')];

                                }

                            }


                        }

                        $RestoranResimBilgisi = 'images/image_5.jpg';
                        if (!empty($RestoranBilgisi['RestoranResim'])) {

                            $RestoranResimBilgisi = parse_url($RestoranBilgisi['RestoranResim']);
                            $RestoranResimBilgisi = isset($RestoranResimBilgisi['scheme'])?$RestoranBilgisi['RestoranResim']:'https://'.$RestoranBilgisi['RestoranResim'];
                            
                        }

                    ?>
                    <section class="pt-7 pb-5 d-flex align-items-end dark-overlay">

                        <span style="box-sizing:border-box;display:block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:absolute;top:0;left:0;bottom:0;right:0">
                            <img alt="Hero image" sizes="100vw" src="<?=$RestoranResimBilgisi?>" decoding="async" data-nimg="fill" class="bg-image" style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%">
                        </span>

                        <div class="overlay-content container">
                            <div class="d-flex justify-content-between align-items-start flex-column flex-lg-row align-items-lg-end">

                                <div class="text-white mb-4 mb-lg-0">
                                    <h1 class="text-shadow verified"><?=$RestoranBilgisi['RestoranMekanAdi']?></h1>
                                        <div class="col-mb-4" style="float: left; margin-right: 15px;">
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" class="svg-inline--fa fa-map-marker-alt fa-w-12 me-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                <path fill="currentColor" d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z" />
                                            </svg><?=$RestoranBilgisi['RestoranTelefonu']?>
                                        </div>
                                        <div class="col-mb-4" style="float: left;">
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" class="svg-inline--fa fa-map-marker-alt fa-w-12 me-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                <path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z" />
                                            </svg><?=$RestoranBilgisi['RestoranAdresi']?>
                                        </div>
                                        <div style="clear: both;"></div>
                                        <div class="col-mb-4" style="float: left; margin-right: 15px; margin-top: 10px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="18" viewBox="0 0 172 172" style=" fill:#undefined;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                    <path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.49552,0 -71.66667,32.17115 -71.66667,71.66667c0,39.49552 32.17115,71.66667 71.66667,71.66667c39.49552,0 71.66667,-32.17115 71.66667,-71.66667c0,-39.49552 -32.17115,-71.66667 -71.66667,-71.66667zM86,28.66667c31.74921,0 57.33333,25.58412 57.33333,57.33333c0,31.74921 -25.58412,57.33333 -57.33333,57.33333c-31.74921,0 -57.33333,-25.58412 -57.33333,-57.33333c0,-31.74921 25.58412,-57.33333 57.33333,-57.33333zM78.83333,43v45.96744l30.76628,30.76628l10.13411,-10.13411l-26.56706,-26.56706v-40.03256z"></path></g>
                                                </g>
                                            </svg>
                                            Open <strong>Today</strong>: <?=$BugunAcikKalmaZamani?>
                                        </div>

                                </div>

                            </div>
                        </div>
                        
                    </section>

                    <section class="py-6">

                        <div class="container">

                            <div class="row">

                                <div class="col-lg-8">
                                    <?=ReklamKontrol($EngellenecekSiteler, $Reklamlar['Reklam1'])?>
                                    <div class="text-block">

                                        <div style="clear: both;"></div>

                                        
                                        <h2 class="mb-3"><?=$RestoranBilgisi['RestoranMekanAdi']?> Info</h2>

                                        <ul class="list-unstyled mb-4">
                                            <li class="mb-2">
                                                <a class="text-gray-500 text-sm text-decoration-none">
                                                    <svg style="color: #4e66f8;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone" class="svg-inline--fa fa-phone fa-w-16 me-3" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z" />
                                                    </svg>
                                                    <span class="text-muted"><?=$RestoranBilgisi['RestoranAdresi']?></span>
                                                </a>
                                            </li>
                                            <li class="mb-2">
                                                <a class="text-gray-500 text-sm text-decoration-none" href="tel:<?=$RestoranBilgisi['RestoranTelefonu']?>">
                                                    <svg style="color: #4e66f8;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone" class="svg-inline--fa fa-phone fa-w-16 me-3" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path fill="currentColor" d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z" />
                                                    </svg>
                                                    <span class="text-muted"><?=$RestoranBilgisi['RestoranTelefonu']?></span>
                                                </a>
                                            </li>
                                            <li class="mb-2">
                                                <a class="text-gray-500 text-sm text-decoration-none" href="mail:info@example.com">
                                                    <svg style="color: #4e66f8;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" class="svg-inline--fa fa-envelope fa-w-16 me-3" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z" />
                                                    </svg>
                                                    <span class="text-muted">info@example.com</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <?=ReklamKontrol($EngellenecekSiteler, $Reklamlar['Reklam3'])?>

                                      <div class="text-block">
                                        <h2 class="mb-4">Amenities</h2>
                                        <?php
                                            $RestoranOzellikleri = $RestoranBilgisi['RestoranOzellikleri'];
                                            if (!empty($RestoranOzellikleri)) {
                                                
                                                $RestoranOzellikleri = json_decode($RestoranOzellikleri, true);
                                                
                                                foreach ($RestoranOzellikleri as $OzellikBaslik => $Ozellikler) {
                                                    
                                                    ?>

                                                    <h6 class="mb-4" style="margin-bottom: 0.5rem !important; margin-left: 5px;"><?=$OzellikBaslik?></h6>
                                                    <ul class="amenities-list list-inline">

                                                        <?php

                                                            foreach ($Ozellikler as $OzellikAdi => $Ozellik) {
                                                                
                                                                if (!$Ozellik) {
                                                                    continue;
                                                                }

                                                                ?>

                                                                    <li class="list-inline-item mb-3">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="icon-circle bg-secondary me-2">
                                                                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" class="svg-inline--fa fa-check fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                                    <path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z" />
                                                                                </svg>
                                                                            </div>
                                                                            <span><?=$OzellikAdi?></span>
                                                                        </div>
                                                                    </li>


                                                                <?php
                                                                
                                                            }

                                                        ?>

                                                    </ul>

                                                    <?php

                                                }

                                            }
                                        ?>

                                    </div>

                                        <?php

                                            $YorumSayisi = $GenelAyarlar['YorumSayisi'];
                                            if ($YorumSayisi) {

                                                ?>
                                                    <div class="text-block">
                                                        <h2 class="mb-4">Best <?=$GenelAyarlar['YorumBasligi']?> Reviews</h2>
                                                        <?php

                                                            $YorumArkaplanRenkleri = array('#ffe5e5','#e5f3ff','#e5ffed','#fffce5','#e5fffd','#ebe5ff', '#ffedfa', '#d9edff');
                                                            $RestoranID = $RestoranBilgisi['RestoranID'];
                                                            $Yorumlar = VerileriVer('yorumlar', false, "YorumlarRestoranID='$RestoranID'", $YorumSayisi);
                                                            foreach ($Yorumlar as $Key => $YorumBilgisi) {

                                                                if (empty($YorumBilgisi['YorumlarYorum'])) {

                                                                    continue;

                                                                }   

                                                                if ($Key == 1) {
                                                                    
                                                                    echo !empty($Reklamlar['Reklam6'])?ReklamKontrol($EngellenecekSiteler, $Reklamlar['Reklam6']):'';

                                                                }

                                                                if ($Key == 3) {
                                                                    
                                                                    echo !empty($Reklamlar['Reklam7'])?ReklamKontrol($EngellenecekSiteler, $Reklamlar['Reklam7']):'';

                                                                }

                                                                if ($Key == 8) {
                                                                    
                                                                    echo !empty($Reklamlar['Reklam8'])?ReklamKontrol($EngellenecekSiteler, $Reklamlar['Reklam8']):'';

                                                                }

                                                                $Yorumu = nl2br($YorumBilgisi['YorumlarYorum']);
                                                                ?>

                                                                    <div class="border-0 shadow mb-4 card">
                                                                        <div class="card-body" style="<?=isset($YorumArkaplanRenkleri[$Key])?'background: '.$YorumArkaplanRenkleri[$Key]:''?>">
                                                                            <div class="text-muted">

                                                                                <?php

                                                                                    echo str_replace(array("<br/>", "<br>", "<br />"), '</div><div class="text-muted" style="margin-bottom: 32px">', $Yorumu);

                                                                                ?>

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                <?php

                                                            }

                                                        ?>

                                                    </div>

                                                <?php

                                            }

                                        ?>

                                                                                <div class="text-block">
                                            <h2 class="mb-4">Quick Facts About <?=$RestoranBilgisi['RestoranMekanAdi']?></h2>
                                            <?php

                                                $Makale = $RestoranBilgisi['RestoranChatGptYorum'];
                                                $MakaleParcala = explode("\n\n", $Makale);
                                                //$MakaleParcala = explode("\r\n", $Makale);

                                                $Makaleler = array_map('trim', $MakaleParcala);
                                                $Makaleler = array_filter($Makaleler);
                                                //$Makaleler = array_values($Makaleler);

                                                $Reklam9 = !empty($Reklamlar['Reklam9'])?ReklamKontrol($EngellenecekSiteler, $Reklamlar['Reklam9']):'';
                                                $Reklam10 = !empty($Reklamlar['Reklam10'])?ReklamKontrol($EngellenecekSiteler, $Reklamlar['Reklam10']):'';
                                                $Reklam11 = !empty($Reklamlar['Reklam11'])?ReklamKontrol($EngellenecekSiteler, $Reklamlar['Reklam11']):'';
                                                $Reklam12 = !empty($Reklamlar['Reklam12'])?ReklamKontrol($EngellenecekSiteler, $Reklamlar['Reklam12']):'';

                                                array_splice($Makaleler, 1, 0, $Reklam9);
                                                array_splice($Makaleler, 4, 0, $Reklam10);
                                                array_splice($Makaleler, 7, 0, $Reklam11);


                                                $Makale = '<div class="text-muted">'.implode('</div><div class="text-muted" style="margin-bottom: 25px;">', $Makaleler).'</div><br /><br />';
                                                echo str_replace('<div class="text-muted" style="margin-bottom: 25px;"></div>', '', $Makale);
                                                echo $Reklam12;

                                            ?>

                                        </div>

                                    <div style="clear: both;"></div>

                                        <style type="text/css">
                                            
                                            .Galeri {
                                                text-align: center;
                                                display: flex;
                                                flex-direction: column;
                                                align-items: center;
                                                margin-top: 50px;
                                            }

                                            .Galeri img {
                                                max-width: 100%;
                                                height: auto;
                                            }

                                            .GaleriKucukResimler {
                                                margin-top: 20px;
                                            }

                                            .GaleriKucukResimler img {
                                                width: 50px;
                                                height: 50px;
                                                margin: 5px;
                                                cursor: pointer;
                                                border-radius: 3px;
                                            }

                                            .GaleriKucukResimler img:hover {

                                            }
 
                                        </style>
                                        <?php

                                            $Resimler = VerileriVer('resimler', false, "ResimRestoranID='$RestoranID'");
                                            if (!empty($Resimler)) {

                                                ?>

                                                    <section class="py-5">
                                                        <h2>Place Pictures</h2>

                                                        <div class="container">

                                                            <div class="row justify-content-md-center">

                                                                <div class="col-lg-8">

                                                                    <div class="Galeri">
                                                                        <img src="https://lh5.googleusercontent.com/p/<?=$Resimler[0]['ResimGoogleResimID']?>" alt="Resim" id="GaleriUsttekiResim" style="height: 550px;">

                                                                        <div class="GaleriKucukResimler">

                                                                            <?php

                                                                                foreach ($Resimler as $Key => $Resim) {

                                                                                    ?>

                                                                                        <img src="https://lh5.googleusercontent.com/p/<?=$Resim['ResimGoogleResimID']?>" alt="Küçük Resim 1" onclick="goster('https://lh5.googleusercontent.com/p/<?=$Resim['ResimGoogleResimID']?>')">

                                                                                    <?php

                                                                                }

                                                                            ?>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </section>

                                                <?php
                                            }

                                        ?>
                                        <script type="text/javascript">

                                            function goster(resimAdi) {
                                                var GaleriUsttekiResim = document.getElementById('GaleriUsttekiResim');
                                                GaleriUsttekiResim.src = resimAdi;
                                            }

                                        </script>
                                    <?=!empty($Reklamlar['Reklam2'])?ReklamKontrol($EngellenecekSiteler, $Reklamlar['Reklam2']):''?>

                                    <?=!empty($Reklamlar['Reklam4'])?ReklamKontrol($EngellenecekSiteler, $Reklamlar['Reklam4']):''?>

                                </div>

                                <div class="col-lg-4">

                                    <div class="ps-xl-4">

                                        <?php

                                            if(ReklamKontrol($EngellenecekSiteler)){

                                                ?>

                                                    <div id="adsense-container-general">

                                                    </div>

                                                <?php

                                            }

                                        ?>

                                        <div class="border-0 shadow mb-5 card">
                                            <div class="bg-gray-100 py-4 border-0 card-header">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div>
                                                        <p class="subtitle text-sm text-primary">Today</p>
                                                        <h3 class="mb-0">Opening Hours </h3>
                                                    </div>
                                                    <svg class="svg-icon svg-icon-light w-3rem h-3rem ms-3 text-muted">
                                                        <use href="#wall-clock-1" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <table class="text-sm mb-0 table">
                                                    <tbody>
                                                <?php
                                                    if (!empty($AcikKalmaZamanlari)) {
                                                        
                                                        foreach ($AcikKalmaZamanlari as $Gun => $Zamanlar) {

                                                            if ($Zamanlar != 'Closed') {
                                                                
                                                                $Zamanlar = explode('–', $Zamanlar);
                                                                $Zaman1 = isset($Zamanlar[0])?$Zamanlar[0]:false;
                                                                $Zaman2 = isset($Zamanlar[1])?$Zamanlar[1]:false;

                                                                if ($Zaman1 && $Zaman2) {

                                                                    //list($Zaman1, $Zaman2) = explode('–', $Zamanlar);

                                                                    $Zaman1 = strtotime(trim($Zaman1));
                                                                    $Zaman2 = strtotime(trim($Zaman2));

                                                                    $Zaman = date('h:i A', $Zaman1).' - '.date('h:i A', $Zaman2);

                                                                }else{

                                                                    $Zaman = 'Not Found';

                                                                }
	
																$Zaman = end($Zamanlar);
                                                            }else{

                                                                $Zaman = $Zamanlar;

                                                            }

                                                            ?>

                                                            <tr>
                                                                <th class="ps-0"><?=$Gun?></th>
                                                                <td class="pe-0 text-end"><?=$Zaman?></td>
                                                            </tr>

                                                            <?php

                                                        }

                                                    }
                                                ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                        <?php

                                            $RestoranResimBilgisi = 'images/image_5.jpg';
                                            if (!empty($RestoranBilgisi['RestoranResim'])) {

                                                $RestoranResimBilgisi = parse_url($RestoranBilgisi['RestoranResim']);
                                                $RestoranResimBilgisi = isset($RestoranResimBilgisi['scheme'])?$RestoranBilgisi['RestoranResim']:'https://'.$RestoranBilgisi['RestoranResim'];
                                                
                                            }

                                        ?>
                                        <div class="border-0 shadow mb-5 card">
                                            <div class="card-body" style="text-align: center;">
                                                <img src="<?=$RestoranResimBilgisi?>" class="img-fluid img-gallery">
                                            </div>
                                        </div>

                                        <?=ReklamKontrol($EngellenecekSiteler, $Reklamlar['Reklam5'])?>
                                        
                                        <div class="border-0 shadow mb-5 card">
                                            <div class="bg-gray-100 py-4 border-0 card-header">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div>
                                                        <p class="subtitle text-sm text-primary">How to go there</p>
                                                        <h3 class="mb-0">Location</h3>
                                                    </div>
                                                    <svg class="svg-icon svg-icon-light w-3rem h-3rem ms-3 text-muted">
                                                        <use href="#fountain-pen-1" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <iframe width="300" height="170" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?=$RestoranBilgisi['RestoranLokasyonLatitude']?>,<?=$RestoranBilgisi['RestoranLokasyonLongitude']?>&z=14&amp;output=embed" style="width: 100%;"></iframe>
                                            </div>
                                        </div>

                                        <div class="border-0 shadow mb-5 card">
                                            <div class="bg-gray-100 py-4 border-0 card-header">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div>
                                                        <p class="subtitle text-sm text-primary">Places</p>
                                                        <h3 class="mb-0">Other Places</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">

                                                <?php

                                                    $UlkeID = $RestoranBilgisi['RestoranUlkeID'];
                                                    $Restoranlar = VerileriVerIndex('restoranlar', false, "RestoranUlkeID='$UlkeID' AND RestoranDurum='1'", 15, "RAND()");
                                                    echo '<div class="row">';

                                                    $Say = 1;

                                                    $GenelSay = 1;
                                                    foreach ($Restoranlar as $Mekan) {
                                                        
                                                        if ($Say%2) {


                                                            echo '</div><div class="row">';


                                                        }

                                                        echo '<div class="six columns" style="margin-top:10px"><p><b>'.$Say.'. <a href="'.$GenelAyarlar['SiteURL'].'/'.$Mekan['RestoranSef'].'">'.$Mekan['RestoranMekanAdi'].'</a></b></p></div>';

                                                        $Say++;
                                                        $GenelSay++;

                                                    }

                                                    echo '</div>';

                                                ?>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>

                    </section>

                </main>
                <style type="text/css">
                    .FooterLinkler{
                        float: left; line-height: 16px; margin-top: 4px; width: 100%;
                    }

                    .FooterLinkler:last-child{
                        border: none !important;
                    }
                </style>

                <footer class="position-relative z-index-10 d-print-none">
                    <div class="py-4 fw-light bg-gray-800 text-gray-300">
                        <div class="container">
                            <div class="align-items-center row">
                                <div class="text-center text-md-start">
                                    <p class="text-sm mb-md-0">© <?=date('Y')?>, Your company. All rights reserved.</p>
                                    <a href="<?=$GenelAyarlar['SiteURL']?>" style="color: #ffffff; font-size: .875rem!important;">Home</a> | 
                                    <a href="<?=$GenelAyarlar['SiteURL']?>/us/" style="color: #ffffff; font-size: .875rem!important;">United States</a> | 
                                    <a href="<?=$GenelAyarlar['SiteURL']?>/uk/" style="color: #ffffff; font-size: .875rem!important;">United Kingdom</a> | 
                                    <a href="<?=$GenelAyarlar['SiteURL']?>/de/" style="color: #ffffff; font-size: .875rem!important;">Germany</a> | 
                                    <a href="https://locationoverworld.com/page-4" style="color: #ffffff; font-size: .875rem!important;">Contact Us</a> | 
                                    <a href="<?=$GenelAyarlar['SiteURL']?>/privacy-policy" style="color: #ffffff; font-size: .875rem!important;">Privacy&nbsp;Policy</a> | 
                                    <a href="<?=$GenelAyarlar['SiteURL']?>/terms-of-use" style="color: #ffffff; font-size: .875rem!important;">Terms of Use</a>
                                    
                                    <?php
                                        
                                        $Linkler = VerileriVer('footerlinkler', false, "FooterLinkDurum='1'");
                                        //$Linkler = array_chunk($Linkler, ceil((count($Linkler) / 2)));

                                        $TumLinkler = array();
                                        foreach ($Linkler as $LinkBilgisi) {

                                            $TumLinkler[$LinkBilgisi['FooterLinkGrup']][] = $LinkBilgisi;

                                        }

                                        foreach ($TumLinkler as $Key => $TumLink) {

                                            echo '<div style="float: left; width: 50%;">';
                                            echo '<div class="FooterLinkler" style="margin: 15px auto 5px auto;">'.$Key.'</div>';
                                            foreach ($TumLink as $Link) {

                                                ?>

                                                    <a href="<?=$Link['FooterLinkBaglanti']?>" class="FooterLinkler">
                                                        <?=$Link['FooterLinkBaslik']?>
                                                    </a>

                                                <?php

                                            }
                                            echo '</div>';

                                        }

                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.datanet.services/js/contextual_v2.js" defer></script>
        <script src="https://code.jquery.com/jquery-3.6.4.slim.js" integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            
            $( ".navbar-toggler" ).on( "click", function() {
              $( "#navbar-main-menu" ).toggle( "slow", function() {
                // Animation complete.
              });
            });

        </script>
    </body>
</html>