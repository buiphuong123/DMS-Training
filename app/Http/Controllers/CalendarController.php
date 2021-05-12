<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\TimeSheet;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if($user->hasAnyRoles(['admin'])){
            $sheets = TimeSheet::all();
            return view('calendar.index')->with('sheets', $sheets);
        }
        else if($user->hasAnyRoles(['user'])){
            $sheets = TimeSheet::where('user_id', $user->id)->get();
            return view('calendar.index')->with('sheets', $sheets);
        }
    }

}
