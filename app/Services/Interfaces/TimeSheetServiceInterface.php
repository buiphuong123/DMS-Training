<?php

namespace App\Services\Interfaces;

use App\Models\TimeSheet;
use App\Http\Requests\TimeSheet\CreateSheetRequest;
use App\Http\Requests\TimeSheet\UpdateSheetRequest;
use Illuminate\Http\Request;

interface TimeSheetServiceInterface
{
    public function createTimeSheet(CreateSheetRequest $request);
    public function updateTimeSheet(UpdateSheetRequest $request, TimeSheet $sheet);
    public function deleteTimeSheet(TimeSheet $sheet, Request $request);

}

