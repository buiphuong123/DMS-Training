<?php

namespace App\Services\Production;

use Carbon\Carbon;
use App\Services\Interfaces\TimeSheetServiceInterface;
use App\Http\Requests\TimeSheet\CreateSheetRequest;
use App\Http\Requests\TimeSheet\UpdateSheetRequest;
use App\Models\TimeSheet;
use App\Models\User;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TimeSheetService extends BaseService implements TimeSheetServiceInterface
{
    public function getList(array $data = []) {
        $query = TimeSheet::query();
        $user = Auth::user();
        
        if ($user->hasAnyRoles(['manager'])) {
            $query->whereHas('user', function($query) {
                $query->where('permission_id', Auth::user()->permission_id);
            });
        }
        else if ($user->hasAnyRoles(['user'])) {
            $query->where('user_id', $user->id);
        }
        return $query->get();
    }

    public function createTimeSheet(array $data) {
        
        $sheet = Auth::user()->timesheet()->create([
            'name' => \Arr::get($data, 'name'),
            'hard' => \Arr::get($data, 'hard'),
            'plan' => \Arr::get($data, 'plan'),
            'date_create' => \Arr::get($data, 'date_create'),
        ]);  

        return $sheet;   
    }
    
    public function updateTimeSheet(TimeSheet $sheet, array $data) {
        return $sheet->update([
            'name' => \Arr::get($data, 'name'),
            'hard' => \Arr::get($data, 'hard'),
            'plan' => \Arr::get($data, 'plan'),
            'date_create' => \Arr::get($data, 'date_create'),
        ]);
    }

    public function deleteTimeSheet(TimeSheet $sheet, Request $request) {
        $sheet->task()->delete();
        $sheet->delete();
        return $sheet;
    }
    
}





