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
use App\Services\Interfaces\TimeSheetServiceInterface;

class TimeSheetController extends Controller
{
    protected $TimeSheetService;
                                    
    public function __construct(TimeSheetServiceInterface $TimeSheetService)
    {
        $this->TimeSheetService = $TimeSheetService;
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
       $sheets = $this->TimeSheetService->getList($request->except('_token'));
       $request->flashExcept('_token');
       return view('sheet.index', compact('sheets'));
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
        if ($this->TimeSheetService->createTimeSheet($request->except('_token'))) {
            $request->session()->flash('successTS','create TimeSheet success');
        }
        else {
            $request->session()->flash('error','create TimeSheet error');
        }
        return redirect()->route('sheet.index');
        
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
        return view('sheet.edit', ['sheets' => $sheet]);
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
        if ($this->TimeSheetService->updateTimeSheet($sheet, $request->except('_token'))) {
            $request->session()->flash('successTS','update TimeSheet success');
        }
        else {
            $request->session()->flash('error','update TimeSheet not success');
        }
        
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
        if ($this->TimeSheetService->deleteTimeSheet($sheet, $request)) {
            $request->session()->flash('success','delete TimeSheet success');
        }
        else {
            $request->session()->flash('error','Cannot delete TimeSheet');
        }
        return redirect()->route('sheet.index');
    }

    public function export()
    {
        return Excel::download(new TimeSheetExport, 'TSExport.xlsx');
    }
 
}


