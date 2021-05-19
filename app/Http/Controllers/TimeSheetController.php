<?php

namespace App\Http\Controllers;
use App\Models\TimeSheet;
use Illuminate\Http\Request;
use App\Models\User;
use App\Exports\TimeSheetExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\Http\Requests\TimeSheet\CreateSheetRequest;
use App\Http\Requests\TimeSheet\UpdateSheetRequest;

class TimeSheetController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $user = Auth::user();
        $query = TimeSheet::query();

        if ($user->hasAnyRoles(['admin'])) {
            $sheets = $query->get();
            return view('sheet.index', compact('sheets'));
        }
        else if ($user->hasAnyRoles(['manager'])) {
            $query->whereHas('user', function($query) {
            $query->where('permission_id', Auth::user()->permission_id);
        });
            $sheets = $query->get();

            return view('sheet.manager', compact('sheets'));
        }
        else {
            $query->where('user_id', $user->id);
            $sheets = $query->get();

            return view('sheet.index', compact('sheets'));
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sheet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSheetRequest $request)
    {
        $user = Auth::user();
        $today = Carbon::now()->format('Y-m-d');
        $dateinput = $request->input('date_create');
        $countDay = Timesheet::where('user_id', $user->id)->whereDate('date_create', $dateinput)->get();
        if ($countDay->count() >= 1) {
            $request->session()->flash('error','timesheet was created in date ');
            return redirect()->route('sheet.index');
        }
        else {
            Auth::user()->timesheet()->create([
                'name' => $request->input('name'),
                'hard' => $request->input('hard'),
                'plan' => $request->input('plan'),
                'date_create' => $dateinput,
            ]);
            $request->session()->flash('successTS','create TimeSheet success');
            return redirect()->route('sheet.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TimeSheet $sheet)
    {
        return view('sheet.show', compact('sheet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeSheet $sheet)
    {
        return view('sheet.edit', compact('sheets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSheetRequest $request, TimeSheet $sheet)
    {
        $sheet->update([
            'name' => $request->name,
            'hard' => $request->hard,
            'plan' => $request->plan,
            'date_create' => $request->date_create,
        ]);
        $request->session()->flash('successTS','update TimeSheet success');
        return redirect()->route('sheet.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * */
    public function destroy(TimeSheet $sheet, Request $request)
    {
        $sheet->delete();
        $request->session()->flash('success','delete TimeSheet success');
        return redirect()->route('sheet.index');
    }

    public function export()
    {
        return Excel::download(new TimeSheetExport, 'TSExport.xlsx');
    }
 
}


