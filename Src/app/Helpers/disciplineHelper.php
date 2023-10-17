<?php

namespace App\Helpers;

class disciplineHelper {
    public static function discipline_list($disciplines) {
        $html = '';
        foreach($disciplines as $discipline) {
            $html .= '
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $discipline->discipline_id .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $discipline->staff->first_name. ' '. $discipline->staff->last_name .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $discipline->name .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">'. $discipline->punish .'</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <a href="/discipline/edit/'. $discipline->discipline_id .'"
                        class="inline-flex items-center justify-center px-2 py-2 text-white bg-blue border border-transparent rounded-md">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a onclick="RemoveRow('. $discipline->discipline_id .', \'/discipline/delete\')"
                        class="inline-flex items-center justify-center px-2 py-2 text-white bg-red border border-transparent rounded-md cursor-pointer">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            ';
        }
        return $html;
    }
}