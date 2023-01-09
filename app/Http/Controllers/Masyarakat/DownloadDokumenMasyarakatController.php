<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DownloadDokumenMasyarakatController extends Controller
{
    public function permohonan()
    {
        $filePath = public_path("permohonan.pdf");
        $headers = ['Content-Type: application/pdf'];
        $fileName = time().' - Permohonan.pdf';

        return response()->download($filePath, $fileName, $headers);
    }
}
