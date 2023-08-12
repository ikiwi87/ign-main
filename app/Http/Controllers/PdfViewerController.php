<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FileUpload;

class PdfViewerController extends Controller
{
    public function index($id)
    {
        $pdf = FileUpload::find($id);

        if ($pdf == null || $pdf->file_type != 'pdf') {
            abort(404);
        }

        $path = storage_path('app/' . $pdf->path);

        return response()->file($path);
    }
}
