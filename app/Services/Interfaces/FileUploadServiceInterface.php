<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Request;

interface FileUploadServiceInterface
{
    public function uploadFile(string $inputName, Request $request);
}

