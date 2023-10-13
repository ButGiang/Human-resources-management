<?php

namespace App\Helpers;
use App\Models\staffs;

class departmentHelper {
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

    public static function department_list($departments) {
        $html = '';
        foreach($departments as $department) {
            $html .= '
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $department->department_id .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $department->name .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $department->manager->first_name. ' '. $department->manager->last_name .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <a href="/department/updateStatus/'. $department->department_id .'"'
                            .self::active($department->active) .
                        '</a>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <a href="/department/edit/'. $department->department_id .'"
                        class="inline-flex items-center justify-center px-2 py-2 text-white bg-blue border border-transparent rounded-md">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/department/detail/'. $department->department_id .'"
                        class="inline-flex items-center justify-center px-2 py-2 text-white bg-deepblue border border-transparent rounded-md">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
            ';
        }
        return $html;
    }

    public static function staff_list($department) {
        $html = '';
        $staffs = staffs::where('department_id', $department->department_id)->get();

        foreach($staffs as $staff) {
            $html .= '
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $department->department_id .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $staff->first_name. ' '. $staff->last_name .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'
                        . $staff->position->name.
                    '</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'
                        . $staff->degree->name.
                    '</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <a onclick="RemoveRow('. $staff->id .', \'/department/detail/'. $department->department_id. '/staffList/remove/\')"
                        class="inline-flex items-center justify-center px-2 py-2 text-white bg-red border border-transparent rounded-md">
                            <i class="fas fa-user-slash"></i>
                        </a>
                    </td>
                </tr>
            ';
        }
        return $html;
    }
}