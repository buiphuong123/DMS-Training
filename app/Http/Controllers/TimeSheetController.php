<?php

namespace App\Http\Controllers;
use App\Models\TimeSheet;
use Illuminate\Http\Request;
use App\Models\User;
use App\Exports\TimeSheetExport;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateSheetRequest;
use Maatwebsite\Excel\Facades\Excel;

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
        $sheets = TimeSheet::orderBy('created_at','desc')->paginate(10);
        $user = Auth::user();
        if($user->hasAnyRoles(['admin'])){
            $sheets = TimeSheet::paginate(10);
        }
        else{
            $sheets = TimeSheet::where('user_id', $user->id)->paginate(10);
        }
        return view('sheet.index')->with('sheets', $sheets);
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
        Auth::user()->timesheet()->create([
            'name' => $request->input('name'),
            'hard' => $request->input('hard'),
            'plan' => $request->input('plan'),
            'date_create' => $request->input('date_create'),
        ]);
        $request->session()->flash('successTS','create TimeSheet success');
        return redirect()->route('sheet.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeSheet $sheet)
    {
            return view('sheet.edit')->with('sheets', $sheet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimeSheet $sheet)
    {
        $this->validate($request, [
            'name' => 'required',
            'hard'  => 'required',
            'plan' => 'required',
            'date_create'   => 'required|date_format:Y-m-d',
        ]);
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


