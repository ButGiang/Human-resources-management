<?php

namespace App\Helpers;

class insuranceHelper {
    public static function notHaveInsurance_list($staffs) {
        $count = 1;
        $html = '';
        foreach($staffs as $staff) {
            $html .= '
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $count .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $staff->id .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $staff->first_name. ' '. $staff->last_name .'</td>
                </tr>
            ';
            $count++;
        }
        return $html;
    }

    public static function insurance_list($insurances) {
        $count = 1;
        $html = '';
        foreach($insurances as $insurance) {
            $html .= '
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $count .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $insurance->staff->first_name. ' '. $insurance->staff->last_name .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $insurance->insurance_id .'</td>

                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <a href="/insurance/edit/'. $insurance->id .'"
                        class="inline-flex items-center justify-center px-2 py-2 text-white bg-indigo-600 border border-transparent rounded-md">
                            <i class="fas fa-user-edit"></i>
                        </a>

                        <a onclick="RemoveRow('. $insurance->insurance_id .', \'/insurance/delete\')"
                        class="inline-flex items-center justify-center px-2 py-2 text-white bg-red border border-transparent rounded-md cursor-pointer">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            ';
            $count++;
        }
        return $html;
    }
}