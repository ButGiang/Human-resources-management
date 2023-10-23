<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\uploadService;

class uploadController extends Controller
{
    protected $upload;

    public function __construct(uploadService $upload) {
        $this->upload = $upload;
    }

    public function upload(Request $request) {
        $url = $this->upload->upload($request);
        if($url !== false) {
            return response()->json([
                'error' => false,
                'url' => $url
            ]);
        }
        return response()->json(['error' => true]);
    }
}