<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TimeSheet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{

    public function index(Request $request)
    {
        $month = $request->get('date_create', Carbon::now()->format('Y-m'));
        $months = Carbon::parse($month)->month;
        $year = Carbon::parse($month)->year;
        $today = Carbon::now()->format('Y-m-d');
        $user = Auth::user();
        if ($user->hasAnyRoles(['manager', 'admin'])) {
            if ($user->hasAnyRoles(['manager'])) {
                $users = User::where('permission_id', $user->permission_id)->get();
            }
            else {
                $users = User::all();
            }
            foreach($users as $user){
                $count_timesheet[$user->id] = $user->timesheet()->whereMonth('created_at', $months)->whereYear('created_at', '=', $year)->where('user_id', $user->id)->get();
                $count_timesheet_late[$user->id] = $user->timesheet()->whereMonth('created_at', $months)->whereYear('created_at', '=', $year)->whereRaw("HOUR(`created_at`) >= 8")->where('user_id', $user->id)->get();
            }
            return view('report.index', compact('users', 'count_timesheet', 'count_timesheet_late', 'month'));
        }
        else {
            $count_timesheet = $user->timesheet()->whereMonth('created_at', $months)->whereYear('created_at', '=', $year)->where('user_id', $user->id)->get();
            $count_timesheet_late = $user->timesheet()->whereMonth('created_at', $months)->whereYear('created_at', '=', $year)->whereRaw("HOUR(`created_at`) >= 8")->where('user_id', $user->id)->get();
            return view('report.index', compact('user', 'count_timesheet', 'count_timesheet_late', 'month'));
        }
        
       
    }

}





