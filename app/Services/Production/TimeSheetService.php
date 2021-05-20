<?php

namespace App\Services\Production;

use App\Services\Interfaces\TimeSheetServiceInterface;
use App\Http\Requests\TimeSheet\CreateSheetRequest;
use App\Http\Requests\TimeSheet\UpdateSheetRequest;
use App\Models\TimeSheet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TimeSheetService extends BaseService implements TimeSheetServiceInterface
{
    public function createTimeSheet(CreateSheetRequest $request) {
        $sheet = Auth::user()->timesheet()->create([
            'name' => $request->input('name'),
            'hard' => $request->input('hard'),
            'plan' => $request->input('plan'),
            'date_create' => $request->input('date_create'),
        ]);  
        return $sheet;   
    }
    
    public function updateTimeSheet(UpdateSheetRequest $request, TimeSheet $sheet) {
        $timesheet = $sheet->update([
            'name' => $request->name,
            'hard' => $request->hard,
            'plan' => $request->plan,
            'date_create' => $request->date_create,
        ]);
        return $timesheet;
    }

    public function deleteTimeSheet(TimeSheet $sheet, Request $request) {
        $sheet->task()->delete();
        $sheet->delete();
        return $sheet;
    }
    
}





