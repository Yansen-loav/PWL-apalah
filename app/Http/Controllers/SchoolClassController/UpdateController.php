<?php

namespace App\Http\Controllers\SchoolClassController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string$id)
    {
        return "Melakukan perubahan data siswa dengan ID: {$id}";
    }
}
