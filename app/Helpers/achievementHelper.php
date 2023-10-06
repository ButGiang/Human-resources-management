<?php

namespace App\Helpers;

class achievementHelper {
    public static function achievement_list($achievements) {
        $html = '';
        foreach($achievements as $achievement) {
            $html .= '
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $achievement->id .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $achievement->staff->first_name. ' '. $achievement->staff->last_name .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $achievement->name .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $achievement->reward .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <a href="/achievement/edit/'. $achievement->id .'"
                        class="inline-flex items-center justify-center px-2 py-2 text-white bg-indigo-600 border border-transparent rounded-md">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
            ';
        }
        return $html;
    }
}