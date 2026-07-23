<?php

namespace App\Http\Controllers\SchoolClassController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,string$id)
    {
        return "Menghapus data siswa dengan ID: {$id}";
    }
}
