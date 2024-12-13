<?php

require('../Baglan.php');
require('../Fonksiyonlar.php');

if(isset($_POST['MailAdresi']) && isset($_POST['Parola'])){
    
    if(GirisYap()){
        
        Git('./index.php');

    }else{
        
        $Hata = true;

    }
    
}

if(GirisKontrol(2) == 1)
    Git('./');


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Giriş Paneli</title>

        <!-- Bootstrap -->
        <link href="./vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="./vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="./vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- Animate.css -->
        <link href="./vendors/animate.css/animate.min.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="./build/css/custom.min.css" rel="stylesheet">
    </head>

    <body class="login">

        <div>

            <div class="login_wrapper">

                <div class="animate form login_form">
                    <section class="login_content" style="padding-top: 0px;">
                        <form action="" method="POST">
                            <h1>Giriş Formu</h1>

                            <?=isset($Hata)?'<span style="color: red;">Lütfen Bilgilerinizi Doğru Girin.</span><br /><br />':''?>

                            <div>
                                <input type="text" class="form-control" placeholder="Mail Adresi" name="MailAdresi" required="" />
                            </div>
                            <div>
                                <input type="password" class="form-control" placeholder="Parolanız" name="Parola" required="" />
                            </div>
                            <div>
                                <button class="btn btn-default submit form-control">Giriş Yap</button>
                            </div>
                        </form>

                        <div class="clearfix"></div>

                    </section>
                </div>

            </div>
        </div>
    </body>
</html>
