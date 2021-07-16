<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\Interfaces\FileUploadServiceInterface;

class FileUploadController extends Controller
{
    protected $fileUploadService;

    /**
     * FilesController constructor.
     *
     * @param FileServiceInterface $fileService
     */
    public function __construct(FileUploadServiceInterface $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    public function upload(Request $request)
    {
        return $this->fileUploadService->upload('file', $request);
    }
}
