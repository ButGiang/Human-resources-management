<?php

namespace App\Http\Services;

use App\Models\achievement;
use App\Models\staffs;
use App\Helpers\messagesHelper;

class achievementService {
    public function getAchievementList() {
        return achievement::orderBy('achievement_id ', 'asc')->paginate(10);
    }

    public function create($request, $fileName) {
        try {
            achievement::create([
                'name' => $request->input('name'),
                'date' => $request->input('date'),
                'describe' => $request->input('describe'),
                'image' => $fileName,
                'reward' => $request->input('reward'),
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

    public function update($request, $achievement) {
        try{
            $achievement->name = $request->input('name');
            $achievement->describe = $request->input('describe');
            $achievement->date = $request->input('date');
            $achievement->image = $request->input('image');
            $achievement->reward = $request->input('reward');
            $achievement->save();

            $request->session()->flash('success', messagesHelper::$EDIT_SUCCESS);
        }
        catch(\exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request) {
        $achievement = achievement::where('achievement_id', (int) $request->input('id'))->first();
        if($achievement) {
            $achievement->delete();
            return true;
        }
        return false;
    }

    public function search($request) {
        $name = $request->search;
        $staff_id = staffs::select('id')->where('first_name', 'like', '%'. $name. '%')->orWhere('last_name', 'like', '%'. $name. '%')->pluck('id');

        if($staff_id) {
            return achievement::whereIn('id', $staff_id)->get();
        }
        else {
            return achievement::where('achievement_id', -1)->get();
        }
    }
}