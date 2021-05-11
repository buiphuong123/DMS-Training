<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TimeSheet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class ReportController extends Controller
{

    public function index(Request $request)
    {
        $currentMonth = Carbon::now()->format('Y-m');
        if ($request->date_month == null) {
            $month = $currentMonth;
        } else {
            $month = $request->date_month;
        }
        $user = Auth::user();
        $explode = explode('-', $month);
        $number = cal_days_in_month(CAL_GREGORIAN, $explode[1], $explode[0]);
        $count_timesheet = TimeSheet::whereMonth('date_create', $explode[1])->whereYear('date_create', '=', $explode[0])->where('user_id', $user->id)->get();
        return view('report.index', compact('user', 'count_timesheet', 'month', 'number'));
    }

}