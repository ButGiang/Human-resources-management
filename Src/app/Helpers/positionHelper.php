<?php

namespace App\Helpers;
use App\Models\staffs;

class positionHelper {
    public static function active($active) {
        if($active==0) {
            return 'class="bg-red-500 font-bold py-2 px-3 rounded-lg">
                    <span class="text-white">Inactive</span>';
        }
        else {
            return 'class="bg-green-500 font-bold py-2 px-3 rounded-lg">
                    <span class="text-white">Active</span>';
        }
    }

    public static function position_list($positions) {
        $html = '';
        foreach($positions as $position) {
            $const = staffs::where('position_id', $position->position_id)->count();
            $html .= '
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $position->position_id .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $position->name .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $const .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <a href="/department/detail/'. $position->department->department_id. '/position/updateStatus/'. $position->position_id .'"'
                            .self::active($position->active) .
                        '</a>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <a href="/department/detail/'. $position->department->department_id. '/position/edit/'. $position->position_id .'"
                        class="inline-flex items-center justify-center px-2 py-2 text-white bg-blue border border-transparent rounded-md">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/department/detail/'. $position->department->department_id. '/position/"
                        class="inline-flex items-center justify-center px-2 py-2 text-white bg-deepblue border border-transparent rounded-md">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
            ';
        }
        return $html;
    }

    public static function staff_list($position) {
        $html = '';
        $staffs = staffs::where('position_id', $position->position_id)->get();
        $const = 1;

        foreach($staffs as $staff) {
            $html .= '
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $const .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $staff->first_name. ' '. $staff->last_name .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'
                        . $staff->position->name.
                    '</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'
                        . $staff->degree->name.
                    '</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <a href="/position/detail/'. $position->position_id. '/staffs/remove/'. $staff->id.'"
                        class="inline-flex items-center justify-center px-2 py-2 text-white bg-red border border-transparent rounded-md cursor-pointer">
                            <i class="fas fa-user-slash"></i>
                        </a>
                    </td>
                </tr>
            ';
            $const++;
        }
        return $html;
    }
}