<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sertifikat</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        @page { size: A4 landscape; margin: 0; }

        body {
            width: 297mm;
            height: 210mm;
            overflow: hidden;
            font-family: Georgia, serif;
            background: #fdf6f0;
        }

        .certificate {
            width: 297mm;
            height: 210mm;
            position: relative;
            background: #fdf6f0;
            overflow: hidden;
        }

        /* Borders */
        .outer-border {
            position: absolute;
            top: 6mm; left: 6mm; right: 6mm; bottom: 6mm;
            border: 1px solid #c9a84c;
        }
        .inner-border {
            position: absolute;
            top: 8mm; left: 8mm; right: 8mm; bottom: 8mm;
            border: 2px solid #8B6914;
        }

        /* Corners */
        .corner { position: absolute; width: 45px; height: 45px; }
        .corner-tl { top: 10mm; left: 10mm; border-top: 3px solid #8B6914; border-left: 3px solid #8B6914; }
        .corner-tr { top: 10mm; right: 10mm; border-top: 3px solid #8B6914; border-right: 3px solid #8B6914; }
        .corner-bl { bottom: 10mm; left: 10mm; border-bottom: 3px solid #8B6914; border-left: 3px solid #8B6914; }
        .corner-br { bottom: 10mm; right: 10mm; border-bottom: 3px solid #8B6914; border-right: 3px solid #8B6914; }

        /* Gold seal - top right */
        .gold-seal {
            position: absolute;
            top: 12mm; right: 16mm;
            width: 22mm; height: 22mm;
            border-radius: 50%;
            background: #c9a84c;
            border: 2px solid #8B6914;
            text-align: center;
            font-size: 6pt;
            font-weight: bold;
            color: white;
            line-height: 1.3;
            padding-top: 6mm;
        }

        /* Content - full width table layout */
        .content {
            position: absolute;
            top: 12mm; left: 18mm; right: 18mm; bottom: 10mm;
            text-align: center;
        }

        .logo-text {
            font-size: 7.5pt;
            color: #5a3e1b;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 2mm;
        }

        .divider {
            text-align: center;
            color: #c9a84c;
            font-size: 10pt;
            margin: 1.5mm 0;
        }
        .divider-inner {
            display: inline-block;
            width: 60px;
            height: 1px;
            background: #c9a84c;
            vertical-align: middle;
            margin: 0 4px;
        }

        .cert-title {
            font-size: 32pt;
            font-weight: bold;
            color: #5a3e1b;
            letter-spacing: 10px;
            text-transform: uppercase;
            line-height: 1;
            margin-bottom: 1mm;
        }

        .cert-subtitle {
            font-size: 7.5pt;
            color: #8B6914;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 1.5mm;
        }

        .cert-number {
            font-size: 7.5pt;
            color: #888;
            margin-bottom: 2mm;
        }

        .presented-to {
            font-size: 9pt;
            color: #666;
            font-style: italic;
            margin-bottom: 1mm;
        }

        .recipient-name {
            font-size: 24pt;
            font-weight: bold;
            color: #2c1a0e;
            letter-spacing: 2px;
            margin-bottom: 1.5mm;
            line-height: 1.1;
        }

        .role-label {
            font-size: 7.5pt;
            color: #8B6914;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 1mm;
        }

        .role-value {
            font-size: 14pt;
            font-weight: bold;
            color: #7a2d00;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 2mm;
        }

        .description {
            font-size: 7.5pt;
            color: #555;
            line-height: 1.5;
            margin: 0 auto 3mm;
        }

        /* Signatures - table based, NOT flex */
        .sig-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 2mm;
        }

        .sig-table td {
            width: 33.33%;
            text-align: center;
            vertical-align: bottom;
            padding: 0 4mm;
        }

        .sig-label {
            font-size: 7pt;
            color: #555;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            line-height: 1.4;
            margin-bottom: 10mm;
            display: block;
        }

        .sig-line {
            width: 45mm;
            height: 1px;
            background: #8B6914;
            margin: 0 auto 1.5mm;
        }

        .sig-name {
            font-size: 7.5pt;
            color: #2c1a0e;
            font-weight: bold;
        }

        .sig-nip {
            font-size: 6.5pt;
            color: #888;
            margin-top: 0.5mm;
        }
    </style>
</head>
<body>
<div class="certificate">
    <div class="outer-border"></div>
    <div class="inner-border"></div>
    <div class="corner corner-tl"></div>
    <div class="corner corner-tr"></div>
    <div class="corner corner-bl"></div>
    <div class="corner corner-br"></div>

    <div class="gold-seal">FIKKIA<br>UNAIR</div>

    <div class="content">

        <div class="logo-text">
            Program Studi Kesehatan Masyarakat &bull; FIKKIA &bull; Universitas Airlangga
        </div>

        <div class="divider">
            <span class="divider-inner"></span> ✦ <span class="divider-inner"></span>
        </div>

        <div class="cert-title">Sertifikat</div>
        <div class="cert-subtitle">Certificate of Participation</div>
        <div class="cert-number">No. 3353/B/UN3.1.11.1.3/PP.01.02/2025</div>

        <p class="presented-to">Diberikan kepada :</p>

        <div class="recipient-name">{{ $nama }}</div>

        <div class="divider">
            <span class="divider-inner"></span> ✦ <span class="divider-inner"></span>
        </div>

        <p class="role-label">Atas Partisipasinya Sebagai :</p>
        <div class="role-value">{{ $jabatan }}</div>

        <p class="description">
            Dalam acara: Seminar Nasional dengan tema
            <strong>"Membalik Tren Global : Menjawab Epidemi Penyakit Tidak Menular
            Melalui Revolusi Gaya Hidup dan Kekuatan Kesehatan Masyarakat"</strong>
            yang diselenggarakan oleh Program Studi Kesehatan Masyarakat FIKKIA
            Universitas Airlangga pada Sabtu, 18 Oktober 2025.
        </p>

        <!-- Signatures: pakai TABLE bukan flex -->
        <table class="sig-table">
            <tr>
                <td>
                    <span class="sig-label">Dekan<br>FIKKIA UNAIR</span>
                    <div class="sig-line"></div>
                    <div class="sig-name">{{ $dekan }}</div>
                    <div class="sig-nip">NIP. {{ $nip_dekan }}</div>
                </td>
                <td>
                    <span class="sig-label">Koordinator Program Studi<br>Kesehatan Masyarakat FIKKIA UNAIR</span>
                    <div class="sig-line"></div>
                    <div class="sig-name">{{ $koordinator }}</div>
                    <div class="sig-nip">NIP. {{ $nip_koordinator }}</div>
                </td>
                <td>
                    <span class="sig-label">Ketua<br>Pelaksana</span>
                    <div class="sig-line"></div>
                    <div class="sig-name">{{ $ketua_pelaksana }}</div>
                    <div class="sig-nip">NIM. {{ $nim_ketua }}</div>
                </td>
            </tr>
        </table>

    </div>
</div>
</body>
</html>