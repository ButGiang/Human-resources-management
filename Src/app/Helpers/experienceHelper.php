<?php

namespace App\Helpers;

class experienceHelper {
    public static function type($type) {
        if($type == 1) {
            return 'Bằng cấp';
        } 
        else if($type == 2){
            return 'chứng chỉ';
        }
    }

    public static function experience_list($experiences) {
        $html = '';
        foreach($experiences as $experience) {
            $html .= '
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $experience->experience_id .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. self::type($experience->type) .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $experience->name.'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $experience->date .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <a href="/staff/experience/'. $experience->id .'/edit"
                        class="inline-flex items-center justify-center px-2 py-2 text-white bg-indigo-600 border border-transparent rounded-md">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/staff/experience/'. $experience->id .'/delete"
                        class="inline-flex items-center justify-center px-2 py-2 text-white bg-blue-500 border border-transparent rounded-md">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            ';
        }
        return $html;
    }


}