<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class VideoController extends Controller
{
    public function save(Request $request) {
        try 
        {
            $file = $request->file('file');
            $getExtension = $file->getClientOriginalName();
            $getExtension = explode('.', $getExtension);
            $getExtension = $getExtension[count($getExtension) - 1];
            $filename = Carbon::now()->timestamp . '_' . uniqid() . '.' . $getExtension;
            $path = storage_path().'/app/public/videos';
            $file->move($path, $filename);
            return "/storage/videos/" . $filename;
            
        } catch (\Exception $e) {
            Log::error($e);
            return ['error', $e->getMessage()];
        }
    }
}