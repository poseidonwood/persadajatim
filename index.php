<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Persada Jatim Donatur ">
    <meta name="author" content="Febri Kukuh">
    <meta name="keywords" content="Persada Jatim Donatur ">

    <!-- Title Page-->
    <title>Form Donasi</title>
    <link rel="shortcut icon" href="https://www.persadajatimindonesia.or.id/images/header_short-favicon.ico?crc=225637751" />
    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">FORM DONASI </h2>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="name">Metode Test</div>
                        <div class="value">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="metode_option" id="metode_option" onchange="metode_option()">
                                        <option disabled="disabled" selected="selected">Default Action Link Notif WA</option>
                                        <option value="WA">Notif Wa</option>
                                        <option value="ipaymu">Ipaymu</option>
                                        <option disabled="disabled" value="midtrans">Midtrans</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <center>
                        <img src="https://www.persadajatimindonesia.or.id/images/kisspng-letterkenny-basmala-islam-allah-alhamdulillah-images-clipart-best-free-bismillah-5ab1559920b2997351700515215712251339.png?crc=307641717" alt="bismilah">
                    </center>
                    <br>
                    <h2 style="color: #555;font-weight: 700;font-size:15px;">Yang mengisi formulir dibawah ini kami : </h2>
                    <br>

                    <form method="POST" id="myform" action="proses/">
                        <div class="form-row">
                            <div class="name">Nama</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="input-group-desc">
                                        <input class="input--style-5" type="text" name="nama" autofocus required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">WA / Nomor Telpon</div>
                            <div class="value">
                                <div class="row row-refine">
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" value="62" name="area_code" disabled>
                                            <label class="label--desc">Area Code</label>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="phone" required>
                                            <label class="label--desc">Phone Number</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Alamat</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-5" name="alamat" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row p-t-20">
                            <label class="label label--block">Menyatakan bersedia berdonasi di PERSADA JATIM INDONESIA :</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Rp. 20.000
                                    <input type="radio" onclick="check1()" id="exist1" name="exist" value="20000">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container m-r-55">Rp. 50.000
                                    <input type="radio" onclick="check2()" id="exist2" name="exist" value="50000">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container m-r-55">Rp. 100.000
                                    <input type="radio" onclick="check3()" id="exist3" name="exist" value="100000">
                                    <span class="checkmark"></span>
                                </label><br>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Jumlah lain :</div>
                            <div class="value">
                                <div class="input-group">
                                    <input type="number" name="exist" class="input--style-5" id="jumlah_lain" onkeyup="validasi()" placeholder="Masukkan nominal : (Rp. ) ">
                                </div>
                            </div>
                            <input type="hidden" id="exist_text" name="exist_text">

                        </div>
                        <div>
                            <button class="btn btn--radius-2 btn--blue" type="submit">Donasi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('exist1').checked = "";
        document.getElementById('exist2').checked = "";
        document.getElementById('exist3').checked = "";

        function check1() {
            document.getElementById('exist2').checked = false;
            document.getElementById('exist3').checked = false;
            document.getElementById('exist_text').value = 20000;

        }

        function check2() {
            document.getElementById('exist1').checked = false;
            document.getElementById('exist3').checked = false;
            document.getElementById('exist_text').value = 50000;

        }

        function check3() {
            document.getElementById('exist1').checked = false;
            document.getElementById('exist2').checked = false;
            document.getElementById('exist_text').value = 100000;

        }

        function validasi() {
            var x = document.getElementById('jumlah_lain').value;
            if (isNaN(parseInt(x))) {
                window.alert('Harus Angka');
                document.getElementById('jumlah_lain').value = "";
            }
            document.getElementById('exist1').checked = false;
            document.getElementById('exist2').checked = false;
            document.getElementById('exist3').checked = false;
            document.getElementById('exist_text').value = x;
        }

        function metode_option() {
            var a = document.getElementById('metode_option').value;
            var b = document.getElementById("myform").action;

            if (a == "ipaymu") {
                var c = document.getElementById("myform").action = "proses/payment.php";
                window.alert("Action di ganti ke : " + c);
            }
        }
    </script>
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>
<!-- end document-->