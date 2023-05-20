<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Praktek CodeIgniter 4</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="<?= BASEURLKU ?>writable/assets/img/icon.ico" type="image/x-icon" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css.map"> -->
    <script src="<?= BASEURLKU ?>writable/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": [
                    "Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands", "simple-line-icons"
                ],
                urls: ['<?= BASEURLKU ?>writable/assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <style>
        .page-not-found .wrapper.not-found {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: #ffffff;
            background: rgba(0, 0, 0, 0.61);
        }

        .page-not-found .wrapper.not-found h1 {
            font-size: 100px;
            letter-spacing: .15em;
            font-weight: 600;
            animation-delay: .5s;
        }

        .page-not-found .wrapper.not-found .decs {
            font-size: 27px;
            text-align: center;
            line-height: 50px;
            animation-delay: 1.5s;
            letter-spacing: 2px;
        }

        .page-not-found .wrapper .not-found .decs span {
            font-weight: 600;
            font-size: 30px;
        }

        .page-not-found .wrapper .not-found .btn-back-home {
            border-radius: 50px;
            padding: 13px 25px;
            animation-delay: 2.5s;
        }
    </style>
    <link rel="stylesheet" href="<?= BASEURLKU ?>writable/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASEURLKU ?>writable/assets/css/atlantis.min.css">
</head>

<body class="page-not-found">
    <div class="wrapper not-found">
        <h1 class="animated-fadeIn">404</h1>
        <div class="desc animated fadeIn"><span>Wah!</span><br>Halaman Tidak Di Temukan!</div>
        <a href="<?= BASEURLKU ?>" class="btn btn-primary btn-back-home mt-4 animated fadeInUp mr-2">
            <span class="btn-label mr-2"><i class="flaticon-home"></i></span> Kembali Ke Beranda
        </a>
    </div>

    <script src="<?= BASEURLKU ?>writable/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="<?= BASEURLKU ?>writable/assets/js/core/popper.min.js"></script>
    <script src="<?= BASEURLKU ?>writable/assets/js/core/bootstrap.min.js"></script>
    <script src="<?= BASEURLKU ?>writable/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
</body>

</html>