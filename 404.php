<?php
ob_start();

require('Baglan.php');
require('Fonksiyonlar.php');

$GenelAyarlar = VerileriVer('genelayarlar');
$GenelAyarlar = end($GenelAyarlar);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" href="images/favicon.png">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <meta name="viewport" content="width=device-width">
        <meta charset="utf-8">
        <title>404</title>
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
        </style>
        <?=$GenelAyarlar['AnalyticsKodu']?>
        
    </head>
    <body>
        <div>
            <div style="padding-top:72px">
                <header class="header ">
                    <nav class="shadow navbar navbar-expand-lg navbar-light bg-white fixed-top">
                        <div class="container-fluid">
                            <div class="d-flex align-items-center">
                                <a href="./" class="py-1 navbar-brand">
                                    <img src="<?=$GenelAyarlar['SiteLogo']?>" width="138" height="31" alt="Directory logo">
                                </a>
                            </div>
                            <button aria-controls="navbar-main-menu" type="button" aria-label="Toggle navigation" class="navbar-toggler collapsed">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" class="svg-inline--fa fa-bars fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" />
                                </svg>
                            </button>
                            <div class="navbar-collapse collapse" id="navbar-main-menu">

                                <div class="ms-auto align-items-lg-center navbar-nav">
                                    <div class="nav-item">
                                        <a href="./" class="nav-link">Home</a>
                                    </div>
                                    <div class="nav-item">
                                        <a href="./contact-us" class="nav-link">Contact Us</a>
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
                    </nav>
                </header>
                <main>

                    <section class="pt-7 pb-5 d-flex align-items-end dark-overlay">

                        <span style="box-sizing:border-box;display:block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:absolute;top:0;left:0;bottom:0;right:0">
                            <img alt="Hero image" sizes="100vw" src="images/image_8.jpg" decoding="async" data-nimg="fill" class="bg-image" style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%">
                        </span>

                        <div class="overlay-content container">
                            <div class="d-flex justify-content-between align-items-start flex-column flex-lg-row align-items-lg-end">

                                <div class="text-white mb-4 mb-lg-0">
                                    <h1 class="text-shadow verified">404 Not Found</h1>
                                    <div style="clear: both;"></div>
                                </div>

                            </div>
                        </div>
                        
                    </section>

                    <section class="py-6">

                        <div class="container" style="min-height: 370px;">

                            <div class="row">

                                <div class="col-lg-12">

                                    <div class="text-block">
                                        <h3 class="mb-3">404</h3>
                                        <p class="text-muted">404 Not Found</p>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </section>

                </main>

                <footer class="position-relative z-index-10 d-print-none">
                    <div class="py-4 fw-light bg-gray-800 text-gray-300">
                        <div class="container">
                            <div class="align-items-center row">
                                <div class="text-center text-md-start col-md-6">
                                    <p class="text-sm mb-md-0">© <?=date('Y')?>, Your company. All rights reserved. <a href="./manage-list">Manage List</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

    </body>
</html>