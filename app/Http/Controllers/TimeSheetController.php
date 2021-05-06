<?php

namespace App\Http\Controllers;
use App\Models\TimeSheet;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateSheetRequest;

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
        if($user->hasRole('admin')){
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
        $sheet = new timesheet();
        $sheet->name = $request->name;
        $sheet->hard = $request->hard;
        $sheet->plan = $request->plan;
        $sheet->date_create = $request->date_create;
        $sheet->user_id = auth()->user()->id;
        $sheet->save();
        $request->session()->flash('successTS','create TimeSheet success');
        return redirect('/sheet');
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
    public function edit($id)
    {
        $sheets = TimeSheet::find($id);
            return view('sheet.edit')->with('sheets', $sheets);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'hard'  => 'required',
            'plan' => 'required',
            'date_create'   => 'required|date_format:Y-m-d',
        ]);
        $sheet = TimeSheet::find($id);
        $sheet->name = $request['name'];
        $sheet->hard = $request['hard'];
        $sheet->plan = $request['plan'];
        $sheet->date_create = $request['date_create'];
        $sheet->save();
        $request->session()->flash('successTS','update TimeSheet success');
        return redirect('/sheet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * */
    public function destroy($id, Request $request)
    {
        $sheet = TimeSheet::find($id);
        $sheet->delete();
        $request->session()->flash('success','delete TimeSheet success');
        return redirect()->route('sheet.index');
    }
    
}