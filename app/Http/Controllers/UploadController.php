<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
    public function upload(){
        return view('upload');
    }

    public function proses_upload(Request $request){
        $this->validate($request, [
            'file' => 'required',
            'keterangan' => 'required',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');
        // nama file
        echo 'File Name: '.$file->getClientOriginalName().'<br>';
        // ekstensi file
        echo 'File Extension: '.$file->getClientOriginalExtension().'<br>';
        // real path
        echo 'File Real Path: '.$file->getRealPath().'<br>';
        // ukuran file
        echo 'File Size: '.$file->getSize().'<br>';
        // tipe mime
        echo 'File Mime Type: '.$file->getMimeType().'<br>';

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
        // upload file
        $file->move($tujuan_upload,$file->getClientOriginalName());
    }
    public function dropzone()
    {
    return view('dropzone');
    }

    public function dropzone_store(Request $request)
    {
        $image = $request->file('file');

        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('img/dropzone'), $imageName);

        return response()->json(['success' => $imageName]);
    }
    public function pdf_upload()
    {
        return view('pdf_upload');
    }

    public function pdf_store(Request $request)
    {
        if (!$request->hasFile('file')) {
            return response()->json(['error' => 'No file uploaded'], 400);
        }
    
        // Validasi format dan ukuran file
        $request->validate([
            'file' => 'required|mimes:pdf|max:40960', // Maks 40MB
        ]);
    
        // Simpan file
        $pdf = $request->file('file');
        $pdfName = 'pdf_' . time() . '.' . $pdf->getClientOriginalExtension();
        $pdf->move(public_path('pdf/dropzone'), $pdfName);
    
        return response()->json(['success' => $pdfName]);
        // if ($request->hasFile('file')) {
        //     $file = $request->file('file');
        //     $filename = time() . '_' . $file->getClientOriginalName();

        //     // Tentukan path penyimpanan
        //     $destinationPath = "pdf/dropzone";

        //     // Buat folder jika belum ada
        //     if (!File::exists($destinationPath)) {
        //         File::makeDirectory($destinationPath, 0777, true, true);
        //     }

        //     // Pindahkan file ke folder tujuan
        //     $file->move($destinationPath, $filename);

        //     return response()->json([
        //         'success' => 'File berhasil diunggah!',
        //         'file_name' => 'pdf/dropzone/' . $filename
        //     ]);
        // }

        // return response()->json(['error' => 'Tidak ada file yang diunggah!'], 400);
    }

}