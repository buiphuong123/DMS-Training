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
        $query = Timesheet::query();

        if ($user->hasAnyRoles(['manager'])) {
            $query->whereHas('user', function($query) {
                $query->where('permission_id', \Auth::user()->permission_id);
            });
        }
        elseif ($user->hasAnyRoles(['user'])) {
            $query->where('user_id', $user->id);
        }

        $sheets = $query->get();
        
        return view('calendar.index', compact('sheets'));
    }

}
