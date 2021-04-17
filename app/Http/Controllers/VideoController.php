<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class VideoController extends Controller
{
    public function save(Request $request) {
        // $file = $request->file('file');
        // $getExtension = $file->getClientOriginalName();
        // $getExtension = explode('.', $getExtension);
        // $getExtension = $getExtension[count($getExtension) - 1];
        // $filename = Carbon::now()->timestamp . '_' . uniqid() . '.' . $getExtension;
        // $file->storeAs('public/videos', $filename);

        // $path = '/storage/videos/' . $filename;

        ini_set('upload_max_filesize', '100M');
        try {
            
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $path = storage_path().'/app/public/videos';
            
            return $file->move($path, $filename);
            
        } catch (\Exception $e) {
            return ['error', $e->getMessage()];
        }
    }
}