<?php

namespace App\Helpers;

class staffHelper {
    public static function active($active) {
        if($active==0) {
            return 'class="bg-white-600 hover:bg-gray-400 font-bold py-2 px-3 border border-black-50 rounded-md">
                    <span class="text-red">Inactive</span>';
        }
        else {
            return 'class="bg-white-600 hover:bg-gray-400 font-bold py-2 px-3 border border-black-50 rounded-md">
                    <span class="text-green">Active</span>';
        }
    }

    public static function gender($gender) {
        if ($gender == 1) {
            return '<div class="square bg-blue text-white text-xl py-2 px-3 rounded-md flex justify-center items-center">
                        <i class="fas fa-mars"></i>
                    </div>';
        } 
        else {
            return '<div class="square bg-pink text-white text-xl py-2 px-3 rounded-md flex justify-center items-center">
                        <i class="fas fa-venus"></i>
                    </div>';
        }
    }

    public static function staff_list($staffs) {
        $html = '';
        foreach($staffs as $staff) {
            $html .= '
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $staff->id .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"> 
                        <img src='. $staff->avatar .'alt="avatar" class="h-full w-full rounded-full">
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $staff->first_name. ' '. $staff->last_name .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. self::gender($staff->gender) .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $staff->department->name.'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $staff->position->name .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $staff->degree->name .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <a href="/staff/updateStatus/'. $staff->id .'"'
                            .self::active($staff->active) .
                        '</a>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <a href="/staff/edit/'. $staff->id .'"
                        class="inline-flex items-center justify-center px-2 py-2 text-white bg-indigo-600 border border-transparent rounded-md">
                            <i class="fas fa-user-edit"></i>
                        </a>
                        <a href="/staff/experience/'. $staff->id .'"
                        class="inline-flex items-center justify-center px-2 py-2 text-white bg-blue-500 border border-transparent rounded-md">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
            ';
        }
        return $html;
    }


}