<?php

namespace App\Http\Controllers;

use App\Models\TipoRequisito;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function show($id)
    {
        $requisito = TipoRequisito::find($id);

        if ($requisito && $requisito->plantilla_pdf) {
            $path = storage_path("app/public/pdfs/{$requisito->plantilla_pdf}");

            if (file_exists($path)) {
                return response()->file($path);
            }
        }

        return back()->with('error', 'El archivo PDF no se encontró.');
    }
}
