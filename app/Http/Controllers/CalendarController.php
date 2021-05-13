<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\TimeSheet;
use App\Models\User;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if($user->hasAnyRoles(['admin'])){
            $sheets = TimeSheet::all();
        }
        else if($user->hasAnyRoles(['manager'])){
            $users = User::where('permission_id', $user->permission_id)->get()->pluck('id');
            $timesheets = Timesheet::with('User:id');
            $sheets = $timesheets->whereIn('user_id', $users)->get();
        }
        else{
            $sheets = TimeSheet::where('user_id', $user->id)->get();
        }
        return view('calendar.index')->with('sheets', $sheets);
    }

}
