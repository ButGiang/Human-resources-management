<?php

namespace App\Exports;

use App\Models\staffs;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    public function collection()
    {
        return staffs::all();
    }
}
