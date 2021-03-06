<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat Waqaf - {{ $data->nama }}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <style>

        * {
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
        }

        body {
            padding: 0;
            margin: 0;
        }

        .main-wrapper {
            background-image: url( {{ asset('img/sertifikat/frame.png')  }} );
            background-repeat: no-repeat;
            background-size: 100% 100%;
            height: 100%;
            width: 100%;
            padding-bottom: 30px;
        }

        .header-image {
            padding: 30px 100px 0px 100px;
        }

        .header-image .left {
            float: left;
        }

        .header-image .right {
            float: right;
        }

        .text-big {
            font-size: 25px;
        }

        .text-danger    {
            color: black;
        }

        p {
            margin: 7px;
        }

        .header-image div img {
            display: inline-block;
            vertical-align: middle;
        }

        .clearfix {
            clear: both;
        }
    </style>
</head>
<body>
    <div class="main-wrapper">

        <!-- Header Image -->
        <div class="header-image">
            
            <div class="left">
                <img src="{{ asset('img/sertifikat/logo_waqaf_salman.png')  }}" width="200" alt="">
            </div>

            <div class="right">                
                <img  src="{{ asset('img/sertifikat/logo_bwi.png')  }}" width="105" style="margin-left:-15px; "  alt="Logo BWI">
                
                <img src="{{ asset('img/sertifikat/logo_waqif.png')  }}" width="85" height="85"  alt="Logo Waqif">
            </div>
        </div>

        <div class="clearfix"></div>
        
        <div class="content-body" style="text-align:center; padding: 0px 30px;">
            <p>Bismillahirrahmanirrahim</p>
            <p>Kamu sekali-kali tidak sampai kepada kebajikan (yang sempurna), sebelum kamu menafkahkan sebagian harta yang kamu cintai. Dan apa saja yang kamu nafkahkan, maka sesungguhnya Allah mengetahuinya. (Q.S. Ali -Imran 3:92).</p>
            <p class="text-big" style="font-size: 17px !important; font-weight: bold;">
                Sertifikat 
                                    Wakaf                            </p>
            <p class="text-danger" style="font-weight: bold;">{{ $data->no_sertifikat }}</p>
            <p>Diberikan Kepada:</p>
            <p class="text-danger text-big" style="font-size: 18px; font-weight: bold;"> {{ $data->nama }}</p>
                        <p>Yang telah memberikan <span class="text-danger">{{ $data->tipe_donasi }}</span> untuk program:</p>
            <p><span class="text-danger "><b>{{ $data->program_donasi }}</b></span></p>
            <p>Sebesar :</p>
            <p class="text-danger text-big" style="font-size: 20px; font-weight: bold;">Rp. {{ number_format($data->nominal, 0, ',',',') }},-</p>
            <p>
                Semoga Allah senantiasa memberimu pahala pada harta yang telah engkau berikan dan semoga Allah memberikanmu
                berkah pada apa saja yang tinggal padamu, serta dijadikannya kesucian bagi engkau.
            </p>
            <p>
                Bandung, <span class="text-danger">{{ $data->tanggal_indo }}</span>
            </p>
            <p>
                <img src="{{ asset('img/sertifikat/ttd.png')  }}" width="240" alt="">
            </p>

            <p>
                Ir . Hari Utomo
            </p>
            <p>
                Direktur Wakaf Salman
            </p>
        </div>
    </div>
</body>
</html>
