<?php

namespace App\Helpers;

class salaryHelper {
    public static function salarySchedule($salarySchedules) {
        $count = 1;
        $html = '';
        foreach($salarySchedules as $salarySchedule) {
            $html .= '
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $count .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $salarySchedule->position->name .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $salarySchedule->money .'</td>
                    
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <a href="/salary/schedule/edit/'. $salarySchedule->salarySchedule_id .'"
                        class="inline-flex items-center justify-center px-2 py-2 text-white bg-indigo-600 border border-transparent rounded-md">
                            <i class="fas fa-edit"></i>
                        </a>

                        <a onclick="RemoveRow('. $salarySchedule->salarySchedule_id .', \'/salary/schedule/delete\')"
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

    public static function salary_list($salarys) {
        $html = '';
        foreach($salarys as $salary) {
            $html .= '
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $salary->id .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $salary->staff->first_name. ' '. $salary->staff->last_name .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $salary->money .'</td>
                </tr>
            ';
        }
        return $html;
    }
}