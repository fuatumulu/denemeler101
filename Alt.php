                    <style type="text/css">
                        .ql-align-center{
                            text-align: center;
                        }
                    </style>

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    <?=date('d.m.Y H:i')?> Bootstrap Admin
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <!-- Bootstrap -->
    <script src="./vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="./vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="./vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="./vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="./vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="./vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="./vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="./vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="./vendors/Flot/jquery.flot.js"></script>
    <script src="./vendors/Flot/jquery.flot.pie.js"></script>
    <script src="./vendors/Flot/jquery.flot.time.js"></script>
    <script src="./vendors/Flot/jquery.flot.stack.js"></script>
    <script src="./vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="./vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="./vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="./vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="./vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="./vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="./vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="./vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="./vendors/moment/min/moment.min.js"></script>
    <script src="./vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script src="./vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="./vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="./vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="./vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="./vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="./vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="./vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="./vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="./vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="./vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="./vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="./vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="./vendors/jszip/dist/jszip.min.js"></script>
    <script src="./vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="./vendors/pdfmake/build/vfs_fonts.js"></script>


    <script src="./vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->



    <!-- Custom Theme Scripts -->
    <script src="./build/js/custom.min.js"></script>

    <script type="text/javascript">

        function UlkeFiyatlari(Servis, ServisAdi){

            $('#NumaraAlModal').show();
            $('#NumaraAlModalSmsBekleniyor2').hide();

            $('#NumaraAlModalBaslik').text(ServisAdi + " Mobil Onay");
            $('#NumaraAlBilgilendirme').css('margin-top', 'auto').html("");
            $.get("Ajax.php?Neresi=NumaraAlUlkeFiyatlari&Servis=" + Servis, function(Sonuc){

                $('#NumaraAlModalFiyatBilgisi').html(Sonuc);
                $('#SeciliServisAdi').val(ServisAdi);

            });

        }

        function SmsleriGoster(IDBilgisi){

            var GelenSms = $('#GelenSms-' + IDBilgisi).html();
            
            if (GelenSms == "") {

                $('.GelenSmsBilgisi').html("Bu numaraya hiç mesaj gelmemiş!");

            }else{

                $('.GelenSmsBilgisi').html("").html(GelenSms);

            }

        }

        function ZamanSay(Tarih = "Jan 5, 2022 15:37:25", IDBilgisi){

            var countDownDate = new Date(Tarih).getTime();

            var x = setInterval(function() {

                var now = new Date().getTime();
                var distance = countDownDate - now;

                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById(IDBilgisi).innerHTML = days + "g. " + hours + "sa. " + minutes + "dk. " + seconds + "s.";

                if (distance < 0) {

                    clearInterval(x);
                    document.getElementById(IDBilgisi).innerHTML = "00 g. 00 sa. 00 dk. 00 s.";

                }

            }, 1000);


        }

        $( document ).ready(function() {

            <?php

                if (isset($ToplamGelir)) {

                    ?>

                        $('#datatable-responsive_info').append(' Toplam Gelir: <?=$ToplamGelir?> ₺');

                    <?php

                }

            ?>


            $("tr[data-bitistarihi]").each(function() {
                
                var TarihBilgisi = $(this).data('bitistarihi');
                var IDBilgisi = $(this).data('id');

                ZamanSay(TarihBilgisi, "ZamanBilgisi-"+IDBilgisi);

            });
        });



        function NumaraAlStokBilgisiVer(){

            var StokSayisi = $('#UlkeNumaraFiyatlari').children('option:selected').data('stok');

            $('#NumaraAlStokBilgisi').val(StokSayisi);
            $('#SeciliUlkeAdi').val($('#UlkeNumaraFiyatlari').children('option:selected').data('ulke'));
            
            $('#StokBilgilendirmesi').hide();

        }

        function DuyuruOkundu(Duyuru, IDBilgisi, Header){

            $.get("Ajax.php?Neresi=DuyuruOkundu&Duyuru=" + Duyuru, function(Sonuc){

                if (Sonuc == 1) {

                    var DuyuruSayisi = $('#DuyuruSayisi').text();
                    
                    $('#DuyuruSayisi').text( (DuyuruSayisi - 1) );
                    $('#' + IDBilgisi).hide();
                    
                }

            });

        }


        $("#KiralamaSuresi").bind('keyup mouseup', function () {
            
            NumaraKiralamaListeleme();

        });


        function NumaraKiralamaListeleme(){

            $.post("Ajax.php?Neresi=NumaraKiralamaListeleme", $("#NumaraKiralamaListeleme").serialize(), function(Sonuc){

                $('#NumaraKiralamaListele').html(Sonuc);

            });

            return false;

        }

        function NumaraKirala(Servis, ServisAdi){

            $('#myModalLabel').text(ServisAdi + " Numarası");
            $('#SeciliServis').val(Servis);

        }

        function NumaraSatinAlKiralikUyari(SeciliServis, ServisAdi, Fiyat){

            var SeciliUlke = $('#SeciliUlke').find(":selected").text();
            var KiralamaSuresi = $('#KiralamaSuresi').val();
            var SaatGun = $('select[name=Zaman] option').filter(':selected').val();

            var KiralamaZamanBilgisi = "";

            if (SaatGun == 168) {

                // Hafta
                KiralamaZamanBilgisi = KiralamaSuresi + " Hafta";

            }else if (SaatGun == 24) {

                // Gün
                KiralamaZamanBilgisi = KiralamaSuresi + " Gün";

            }else {

                // Saat
                KiralamaZamanBilgisi = KiralamaSuresi + " Saat";


            }

            $('#KiralikNumaraUlke').text(SeciliUlke);
            $('#KiralikNumaraServis').text(ServisAdi);
            $('#KiralikNumaraZaman').text(KiralamaZamanBilgisi);
            $('#KiralikNumaraUcret').text(Fiyat);

            $('#SeciliServis').val(SeciliServis);
            $('#NumaraKiralamaBilgilendirmesi').show();
            $('#NumaraKiralamaBilgilendirmesi2').hide();

        }

        function KiralikNumaraSatinAl(){

            var Zaman = $('#KiralamaSuresi').val();
            var SaatGun = $('#SaatGun').val();
            var SeciliUlke = $('#SeciliUlke').val();
            var SeciliServis = $('#SeciliServis').val();

            var Baglanti = "Ajax.php?Neresi=NumaraSatinAl&Zaman=" + Zaman + "&SaatGun=" + SaatGun + "&SeciliUlke=" + SeciliUlke + "&SeciliServis=" + SeciliServis;

            $.get(Baglanti, function(Sonuc){

                $('#NumaraKiralamaBilgilendirmesi').hide();
                $('#NumaraKiralamaBilgilendirmesi2').html(Sonuc).show();

            });

        }

        function NumaraSatinAl(Nedir){

            if (Nedir == 1) {

                var Zaman = $('#KiralamaSuresi').val();
                var SaatGun = $('#SaatGun').val();
                var SeciliUlke = $('#SeciliUlke').val();
                var SeciliServis = $('#SeciliServis').val();

                var Baglanti = "Ajax.php?Neresi=NumaraSatinAl&Zaman=" + Zaman + "&SaatGun=" + SaatGun + "&SeciliUlke=" + SeciliUlke + "&SeciliServis=" + SeciliServis;

            }else{

                var UlkeNumaraFiyatlari = $('#UlkeNumaraFiyatlari').val();
                var Baglanti = "Ajax.php?Neresi=NumaraSatinAl&ServisFiyat=" + UlkeNumaraFiyatlari;

            }

            $.get(Baglanti, function(Sonuc){

                if (Sonuc == 'BASARILI') {

                    window.location.href = 'index.php?Sayfa=Numaralar&Durum=0';

                }else{

                    $('#NumaraAlBilgilendirme').css('margin-top', '25px').html(Sonuc);

                }

            });

        }

        function startTimer(duration, display) {

            var timer = duration, minutes, seconds;
            setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);
            
        }

        function NumaraSatinAl2(){

            var StokBilgisi = $('#NumaraAlStokBilgisi').val();

            if (StokBilgisi < 1) {

                $('#StokBilgilendirmesi').show();

            }else{

                $('#StokBilgilendirmesi').hide();

                var UlkeNumaraFiyatlari = $('#UlkeNumaraFiyatlari').val();

                var SeciliUlkeAdi = encodeURI($('#SeciliUlkeAdi').val());
                var SeciliServisAdi = encodeURI($('#SeciliServisAdi').val());

                $('#NumaraAlModalFiyatBilgisi').html("Numara alınıyor. Lütfen Bekleyin...");


                var Baglanti = "Ajax.php?Neresi=NumaraSatinAl2&ServisFiyat=" + UlkeNumaraFiyatlari + "&SeciliUlkeAdi=" + SeciliUlkeAdi + "&SeciliServisAdi=" + SeciliServisAdi;

                $.get(Baglanti, function(Sonuc){

                    $('#NumaraAlModal').hide();
                    $('#NumaraAlModalSmsBekleniyor2').show();

                    $('#NumaraAlModalSmsBekleniyor').html(Sonuc);

                });

            }

        }

        function SmsKontrol(){

            $('.SmsBekleniyor').each(function(){

                var IDBilgisi = $(this).attr('id');
                $.get("Ajax.php?Neresi=SmsKontrol&IDBilgisi=" + IDBilgisi, function(Sonuc){

                    if (Sonuc != 0) {
                        
                        $('#' + IDBilgisi + " .GelenSmsler").html(Sonuc);

                    }else{



                    }

                });

            });

        }

        setInterval(SmsKontrol, 3000);

        <?php

            if ($Sayfa == 'Numaralar') {

                ?>

                    $('#AranacakNumara').on('input', function() {

                        var searchTerm = $.trim(this.value);
                        $("tr[data-numaralar]").each(function() {

                            if (searchTerm.length < 1) {

                                $(this).show();

                            } else {

                                $(this).toggle($(this).filter('[data-numaralar*="' + searchTerm + '"]').length > 0);

                            }

                        });

                    })

                <?php

            }

        ?>

        $('#AranacakServisBilgisi2').on('input', function() {

            var searchTerm = $.trim(this.value).toLowerCase();;
            $("div[data-servisler]").each(function() {

                if (searchTerm.length < 1) {

                    $(this).show();

                } else {

                    $(this).toggle($(this).filter('[data-servisler*="' + searchTerm + '"]').length > 0);

                }

            });

        });

        $('#AranacakServisBilgisi').on('input', function() {

            var searchTerm = $.trim(this.value);
            $("tr[data-servisler]").each(function() {

                if (searchTerm.length < 1) {

                    $(this).show();

                } else {

                    $(this).toggle($(this).filter('[data-servisler*="' + searchTerm + '"]').length > 0);

                }

            });

        });

    </script>


</body>
</html>
<?php ob_end_flush();?>