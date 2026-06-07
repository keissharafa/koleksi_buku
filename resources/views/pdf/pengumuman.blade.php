<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Undangan</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        @page { size: A4 portrait; margin: 0; }

        body {
            width: 210mm;
            height: 297mm;
            overflow: hidden;
            font-family: 'Times New Roman', Times, serif;
            font-size: 11pt;
            color: #000;
            background: #fff;
        }

        .page {
            width: 210mm;
            height: 297mm;
            overflow: hidden;
        }

        /* ===== KOP SURAT ===== */
        .letterhead {
            padding: 5mm 15mm 4mm 15mm;
            border-bottom: 3px double #000;
        }

        /* Pakai TABLE bukan flex untuk kop */
        .kop-table {
            width: 100%;
            border-collapse: collapse;
        }

        .kop-table td { vertical-align: middle; }

        .kop-logo {
            width: 20mm;
            text-align: center;
        }

        .logo-circle {
            width: 18mm;
            height: 18mm;
            border-radius: 50%;
            border: 2px solid #1a3a6b;
            text-align: center;
            font-size: 7pt;
            font-weight: bold;
            color: #1a3a6b;
            line-height: 18mm;
        }

        .kop-text { text-align: center; }

        .univ-name {
            font-size: 14pt;
            font-weight: bold;
            letter-spacing: 1px;
            line-height: 1.2;
        }

        .faculty-name {
            font-size: 12pt;
            font-weight: bold;
            line-height: 1.3;
        }

        .address {
            font-size: 7.5pt;
            line-height: 1.5;
            margin-top: 1mm;
        }

        /* ===== BODY ===== */
        .letter-body {
            padding: 5mm 20mm 5mm 20mm;
        }

        /* Meta table */
        .meta-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 4mm;
        }

        .meta-table td {
            font-size: 11pt;
            padding: 0.3mm 0;
            vertical-align: top;
        }

        .meta-label { width: 24mm; }
        .meta-colon { width: 4mm; text-align: center; }
        .meta-date  { text-align: right; }

        /* Recipient */
        .recipient { margin-bottom: 4mm; }
        .recipient p { font-size: 11pt; line-height: 1.5; }
        .recipient ol {
            margin-left: 8mm;
            font-size: 11pt;
            line-height: 1.6;
        }

        /* Body text */
        .body-text {
            font-size: 11pt;
            line-height: 1.7;
            text-align: justify;
            margin-bottom: 3mm;
        }

        /* Event table */
        .event-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 4mm;
        }

        .event-table td {
            font-size: 11pt;
            padding: 0.3mm 0;
            vertical-align: top;
        }

        .event-label { width: 28mm; }
        .event-colon { width: 4mm; text-align: center; }

        /* Closing */
        .closing {
            font-size: 11pt;
            line-height: 1.7;
            text-align: justify;
            margin-bottom: 5mm;
        }

        /* Signature - pakai TABLE bukan flex */
        .sig-table {
            width: 100%;
            border-collapse: collapse;
        }

        .sig-table td {
            vertical-align: top;
        }

        .sig-right {
            width: 65mm;
            text-align: center;
        }

        .sig-title {
            font-size: 11pt;
            margin-bottom: 3mm;
        }

        /* Stempel lingkaran - pakai border di inline block */
        .sig-stamp-wrap {
            text-align: center;
            margin-bottom: 2mm;
        }

        .sig-stamp {
            display: inline-block;
            width: 28mm;
            height: 28mm;
            border-radius: 50%;
            border: 2px solid #1a3a6b;
            font-size: 6.5pt;
            font-weight: bold;
            color: #1a3a6b;
            text-align: center;
            line-height: 1.3;
            padding-top: 7mm;
        }

        .sig-name {
            font-size: 11pt;
            font-weight: bold;
            text-decoration: underline;
            margin-top: 1mm;
        }

        .sig-nip {
            font-size: 10.5pt;
        }
    </style>
</head>
<body>
<div class="page">

    <!-- KOP SURAT -->
    <div class="letterhead">
        <table class="kop-table">
            <tr>
                <td class="kop-logo">
                    <div class="logo-circle">UNAIR</div>
                </td>
                <td class="kop-text">
                    <div class="univ-name">UNIVERSITAS AIRLANGGA</div>
                    <div class="faculty-name">FAKULTAS VOKASI</div>
                    <div class="address">
                        Kampus B Jl. Dharmawangsa Dalam Surabaya 60286 Telp. (031) 5033869 Fax (031) 5053156<br>
                        Laman : https://vokasi.unair.ac.id, e-mail : info@vokasi.unair.ac.id
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- BODY -->
    <div class="letter-body">

        <!-- Nomor, Lampiran, Perihal, Tanggal -->
        <table class="meta-table">
            <tr>
                <td colspan="2"></td>
                <td class="meta-date">{{ $kota }}, {{ $tanggal_surat }}</td>
            </tr>
            <tr>
                <td class="meta-label">Nomor</td>
                <td class="meta-colon">:</td>
                <td>{{ $nomor_surat }}</td>
            </tr>
            <tr>
                <td class="meta-label">Lampiran</td>
                <td class="meta-colon">:</td>
                <td>{{ $lampiran }}</td>
            </tr>
            <tr>
                <td class="meta-label">Perihal</td>
                <td class="meta-colon">:</td>
                <td><strong>{{ $perihal }}</strong></td>
            </tr>
        </table>

        <!-- Kepada Yth -->
        <div class="recipient">
            <p>Yth.</p>
            <ol>
                @foreach($penerima as $p)
                    <li>{{ $p }}</li>
                @endforeach
            </ol>
            <p>Fakultas Vokasi Universitas Airlangga</p>
        </div>

        <!-- Isi surat -->
        <p class="body-text">
            Dalam rangka mempererat tali silaturahmi serta mengawali kegiatan tahun 2026, Fakultas Vokasi
            Universitas Airlangga akan menyelenggarakan Silaturahmi Awal Tahun Keluarga Besar Fakultas Vokasi.
            Sehubungan dengan hal tersebut, kami mengundang Bapak/Ibu untuk hadir pada kegiatan yang akan
            dilaksanakan pada:
        </p>

        <!-- Detail acara -->
        <table class="event-table">
            <tr>
                <td class="event-label">Hari, Tanggal</td>
                <td class="event-colon">:</td>
                <td>{{ $hari_tanggal_acara }}</td>
            </tr>
            <tr>
                <td class="event-label">Waktu</td>
                <td class="event-colon">:</td>
                <td>{{ $waktu }}</td>
            </tr>
            <tr>
                <td class="event-label">Tempat</td>
                <td class="event-colon">:</td>
                <td>{{ $tempat }}</td>
            </tr>
            <tr>
                <td class="event-label">Agenda</td>
                <td class="event-colon">:</td>
                <td>{{ $agenda }}</td>
            </tr>
        </table>

        <!-- Penutup -->
        <p class="closing">
            Demikian undangan ini kami sampaikan. Atas perhatian dan kehadiran Bapak/Ibu, kami ucapkan
            terima kasih.
        </p>

        <!-- Tanda tangan - TABLE bukan flex -->
        <table class="sig-table">
            <tr>
                <td></td>
                <td class="sig-right">
                    <div class="sig-title">Dekan,</div>
                    <div class="sig-stamp-wrap">
                        <div class="sig-stamp">UNIVERSITAS<br>AIRLANGGA<br>Dekan</div>
                    </div>
                    <div class="sig-name">{{ $nama_dekan }}</div>
                    <div class="sig-nip">NIP {{ $nip_dekan }}</div>
                </td>
            </tr>
        </table>

    </div>
</div>
</body>
</html>