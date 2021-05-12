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
        $today = Carbon::now()->format('Y-m-d');
        $user = Auth::user();
        $months = Carbon::parse($month)->month;
        $year = Carbon::parse($month)->year;
        $month1 = Carbon::parse($today)->month;
        if ($months == $month1)
        {
            $number = $months;
        }
        else
        {  
            $number = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        }
        if($user->hasAnyRoles(['admin', ',manager'])){
            $users = User::all();
            $ts_count = [];
            foreach($users as $user){
                $count_timesheet[$user->id] = $user->timesheet()->whereMonth('date_create', $months)->whereYear('date_create', '=', $year)->where('user_id', $user->id)->get();
            }
            return view('report.index', compact('users', 'count_timesheet', 'month', 'number'));
        }
        else{
            $count_timesheet = $user->timesheet()->whereMonth('date_create', $months)->whereYear('date_create', '=', $year)->where('user_id', $user->id)->get();
            return view('report.index', compact('user', 'count_timesheet', 'month', 'number'));
        }
        
    }

}





