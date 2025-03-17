<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController1 extends Controller
{
    // Menampilkan form upload
    public function pdf_upload1() {
        return view('pdf_upload1');
    }

    // Menangani proses upload
    public function pdf_store1(Request $request) {
        $file = $request->file('file');

        // Buat nama file unik dengan timestamp
        $pdfName = 'pdf_' . time() . '.' . $file->getClientOriginalExtension();

        // Pindahkan file ke folder penyimpanan di 'public/uploads/pdf'
        $file->move(public_path('uploads/pdf/'), $pdfName);

        // Kembalikan response sebagai JSON
        return response()->json(['success' => $pdfName]);
    }
}
