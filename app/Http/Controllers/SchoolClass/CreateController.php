<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $title = "Sistem Sekolah - Tambah Kelas";

        $majors = [
            [
                'id' => 1,
                'code' => 'AKL',
                'name' => 'Akuntansi dan Keuangan Lembaga',
                'description' => 'Program keahlian yang membekali murid dengan kompetensi pencatatan dan pelaporan keuangan.',
            ],
            [
                'id' => 2,
                'code' => 'TKJ',
                'name' => 'Teknik Komputer dan Jaringan',
                'description' => 'Program keahlian yang membekali murid dengan kompetensi instalasi, konfigurasi, dan pemeliharaan jaringan komputer.',
            ],
            [
                'id' => 3,
                'code' => 'BD',
                'name' => 'Bisnis Digital',
                'description' => 'Program keahlian yang membekali murid dengan kompetensi pemasaran dan pengelolaan bisnis berbasis digital.',
            ],
        ];

        $teachers = [
        [   'id' => 1,
            'nip' => '198501012024',
            'name' => 'Budi Santoso',
            'gender' => 'Laki-Laki',
            'subject' => 'Akuntansi Dasar',
            'phone' => '081234560001',
            'status' => 'Aktif',
        ],
        [
            'id' => 2,
            'nip' => '198703152024',
            'name' => 'Siti Aminah',
            'gender' => 'Perempuan',
            'subject' => 'Jaringan Komputer',
            'phone' => '081234560002',
            'status' => 'Aktif',
        ]
        ];
        return view('classes.create', [
            'title' => $title,
            'majors' => $majors,
            'teachers' => $teachers,
        ]);
    }
}
