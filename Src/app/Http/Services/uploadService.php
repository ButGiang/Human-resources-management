<?php

namespace App\Http\Services;

class UploadService {
    public function upload($request) {
        if($request->hasFile('avatar')) {
            try {   
                $name =  $request->file('avatar')->getClientOriginalName();
                $link = 'pics/' .date('Y/m/d');
                $request->file('avatar')->storeAs(
                    'public/'.$link, $name
                );

                return 'storage/'. $link. '/'. $name;
            }
            catch(\exception $e) {
                return false;
            }
        }
    }
}