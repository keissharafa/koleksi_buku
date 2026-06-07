<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Barcode Toko</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }

        .box {
            border: 1px solid #333;
            padding: 20px;
        }

        .nama {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .barcode {
            margin: 15px 0;
        }

        .kode {
            font-size: 14px;
            letter-spacing: 2px;
            font-weight: bold;
        }

        .alamat {
            font-size: 11px;
            margin-top: 10px;
        }
    </style>
</head>

<body>

<div class="box">
    <div class="nama">
        {{ $toko->nama_toko }}
    </div>

    <div class="barcode">
        <img src="data:image/png;base64,{{ $barcodeImage }}" width="230">
    </div>

    <div class="kode">
        {{ $toko->barcode }}
    </div>

    <div class="alamat">
        Lat: {{ $toko->latitude }} <br>
        Lng: {{ $toko->longitude }} <br>
        Accuracy: {{ $toko->accuracy }} m
    </div>
</div>

</body>
</html>