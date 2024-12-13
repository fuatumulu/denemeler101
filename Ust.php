<!doctype html>
<html lang=en>
    <head>
		<?=$GenelAyarlar['AnalyticsKodu']?>
        <meta charset=utf-8>
        <title><?=$GenelBaslik?></title>
        <meta name=theme-color content="#1653bb">
        <meta name=viewport content="width=device-width,initial-scale=1">
        <link rel=canonical href=<?=$GenelAyarlar['SiteURL']?>>
        <link rel=stylesheet href="https://fonts.googleapis.com/css?family=Raleway:400,300,600">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.0/css/line.css">
        <link rel="stylesheet" href="<?=$GenelAyarlar['SiteURL']?>/css/main.css">
        <style>
            .container {
                position: relative;
                width: 100%;
                max-width: 1e3px;
                margin: 0 auto;
                padding: 0 10px;
                box-sizing: border-box
            }

            .column,
            .columns {
                width: 100%;
                float: left;
                box-sizing: border-box
            }

            @media(min-width:400px) {
                .container {
                    width: 95%;
                    padding: 0
                }
            }

            @media(min-width:550px) {
                .container {
                    width: 90%
                }

                .column,
                .columns {
                    /*margin-left: 4%*/
                }

                .column:first-child,
                .columns:first-child {
                    margin-left: 0
                }

                .four.columns {
                    width: 30.6666666667%
                }

                .six.columns {
                    width: 48%
                }

                .twelve.columns {
                    width: 100%;
                    margin-left: 0
                }
            }

            html {
                font-size: 62.5%;
                -ms-text-size-adjust: 100%;
                -webkit-text-size-adjust: 100%
            }

            body {
                font-size: 1.5em;
                line-height: 1.6;
                font-weight: 400;
                font-family: raleway, helveticaneue, helvetica neue, Helvetica, Arial, sans-serif;
                color: #222;
                margin: 0
            }

            h1,
            h2,
            h3,
            h4 {
                margin-top: 0;
                margin-bottom: 0;
                font-weight: 300
            }

            h1 {
                font-size: 3rem;
                line-height: 1.3;
                letter-spacing: -.1rem
            }

            h2 {
                font-size: 2.4rem;
                line-height: 1.35;
                letter-spacing: -.08rem
            }

            h3 {
                font-size: 1.8rem;
                line-height: 1.5;
                letter-spacing: -.05rem
            }

            h4 {
                font-size: 3rem;
                line-height: 1.3;
                letter-spacing: -.1rem
            }

            .vmtitle {
                font-size: 2.4rem;
                line-height: 1.35;
                letter-spacing: -.08rem;
                margin-top: 0;
                margin-bottom: 0
            }

            @media(min-width:550px) {
                h1 {
                    font-size: 3.6rem
                }

                h2 {
                    font-size: 3rem
                }

                h3 {
                    font-size: 2.4rem
                }

                h4 {
                    font-size: 1.5rem
                }

                .vmtitle {
                    font-size: 3rem
                }
            }

            p {
                margin-top: 0
            }

            a {
                color: #1653bb
            }

            a:hover {
                color: #095872
            }

            .button {
                display: inline-block;
                height: 38px;
                padding: 0 30px;
                color: #555;
                text-align: center;
                font-size: 11px;
                font-weight: 600;
                line-height: 38px;
                letter-spacing: .1rem;
                text-transform: uppercase;
                text-decoration: none;
                white-space: nowrap;
                background-color: initial;
                border-radius: 4px;
                border: 1px solid #bbb;
                cursor: pointer;
                box-sizing: border-box
            }

            .button:hover {
                color: #333;
                border-color: #888;
                outline: 0
            }

            button,
            .button {
                margin-bottom: 1rem
            }

            select {
                margin-bottom: 1.5rem
            }

            pre,
            blockquote,
            dl,
            figure,
            table,
            p,
            ul,
            ol,
            form {
                margin-bottom: 2.5rem
            }

            .u-full-width {
                width: 100%;
                box-sizing: border-box
            }

            .u-max-full-width {
                max-width: 100%;
                box-sizing: border-box
            }

            .u-pull-right {
                float: right
            }

            .u-pull-left {
                float: left
            }

            hr {
                margin-top: 3rem;
                margin-bottom: 3.5rem;
                border-width: 0;
                border-top: 1px solid #e1e1e1
            }

            .container:after,
            .row:after,
            .u-cf {
                content: "";
                display: table;
                clear: both
            }

            .center {
                display: block;
                margin-left: auto;
                margin-right: auto
            }

            @keyframes ezIn {
                from {
                    opacity: 0
                }
            }


            body {

                height: auto
            }

        </style>
    </head>
    <body cz-shortcut-listen="true">
        <div class="container">