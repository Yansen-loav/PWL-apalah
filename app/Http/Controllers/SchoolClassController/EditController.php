<?php

namespace App\Http\Controllers\SchoolClassController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,string$id)
    {
        return "Menampilkan halaman edit siswa dengan ID: {$id}";
    }
}
