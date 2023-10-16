<?php

namespace App\Http\Services;

use App\Models\discipline;
use App\Models\staffs;
use App\Helpers\messagesHelper;

class disciplineService {
    public function getdisciplineList() {
        return discipline::orderBy('discipline_id ', 'asc')->paginate(10);
    }

    public function create($request) {
        try {
            discipline::create([
                'name' => $request->input('name'),
                'date' => $request->input('date'),
                'describe' => $request->input('describe'),
                'image' => $request->input('image'),
                'punish' => $request->input('punish'),
                'date' => $request->input('date'),
                'id' => $request->input('staff')
            ]);
            $request->session()->flash('success', messagesHelper::$CREATE_SUCCESS);
        }
        catch(\exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return false;
        }
        return true;
    }

    public function update($request, $discipline) {
        try{
            $discipline->name = $request->input('name');
            $discipline->describe = $request->input('describe');
            $discipline->date = $request->input('date');
            $discipline->image = $request->input('image');
            $discipline->punish = $request->input('punish');
            $discipline->save();

            $request->session()->flash('success', messagesHelper::$EDIT_SUCCESS);
        }
        catch(\exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request) {
        $discipline = discipline::where('discipline_id', (int) $request->input('id'))->first();
        if($discipline) {
            $discipline->delete();
            return true;
        }
        return false;
    }

    public function search($request) {
        $name = $request->search;
        $staff_id = staffs::select('id')->where('first_name', 'like', '%'. $name. '%')->orWhere('last_name', 'like', '%'. $name. '%')->pluck('id');

        if($staff_id) {
            return discipline::whereIn('id', $staff_id)->get();
        }
        else {
            return discipline::where('discipline_id', -1)->get();
        }
    }
}