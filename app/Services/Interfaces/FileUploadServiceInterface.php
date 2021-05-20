<?php

namespace App\Services\Interfaces;

use App\Models\User;
use Illuminate\Http\Request;

interface FileUploadServiceInterface
{
    public function uploadFile(Request $request);
}

