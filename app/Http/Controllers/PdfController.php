<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    // Sertifikat - Landscape
public function sertifikat()
{
    $data = [
        'nama'            => 'Kayesha Naura',
        'jabatan'         => 'Wakil Ketua Pelaksana',
        'dekan'           => 'Prof. Dr. Joni Wahyuhadi, dr., Sp.BS(K)',
        'nip_dekan'       => '196507241999031001',
        'koordinator'     => 'Dr. Ririh Yudhastuti, Ir., M.Sc.',
        'nip_koordinator' => '196512131991032001',
        'ketua_pelaksana' => 'Muhammad Arifin',
        'nim_ketua'       => '101811133001',
    ];

    $pdf = Pdf::loadView('pdf.sertifikat', $data)
              ->setPaper('A4', 'landscape');

    return $pdf->stream('sertifikat.pdf');
}

    // Pengumuman - Portrait
public function pengumuman()
{
    $data = [
        'kota'             => 'Surabaya',
        'tanggal_surat'    => '13 Januari 2026',
        'nomor_surat'      => '556/B/DST/UN3.FV/TU.01.00/2026',
        'lampiran'         => 'Satu Lembar',
        'perihal'          => 'Undangan',
        'penerima'         => [
            'Para Wakil Dekan',
            'Para Ketua Departemen',
            'Para Sekretaris Departemen',
            'Para Koordinator Program Studi',
            'Kepala Bagian Tata Usaha',
            'Para Kepala Subbagian',
            'Seluruh Dosen',
            'Seluruh Tenaga Kependidikan',
        ],
        'hari_tanggal_acara' => 'Selasa, 20 Januari 2026',
        'waktu'              => '10.00 – 13.00 WIB',
        'tempat'             => 'Aula Gedung A Lt.3 Fakultas Vokasi Universitas Airlangga',
        'agenda'             => 'Silaturahmi Awal Tahun Keluarga Besar Fakultas Vokasi',
        'nama_dekan'         => 'Prof. Dian Yulie Reindrawati, S.Sos., M.M., Ph.D',
        'gelar_dekan'        => '',
        'nip_dekan'          => '197607071999032001',
    ];

    $pdf = Pdf::loadView('pdf.pengumuman', $data)
              ->setPaper('A4', 'portrait');

    return $pdf->stream('pengumuman.pdf');
}
}