<?php

namespace Domain\Blog\Actions;

use Domain\Blog\Exports\PostsExport;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportPostToExcelAction
{
    public static function execute(ResourceCollection $posts): BinaryFileResponse
    {
        $export = new PostsExport($posts);
        return Excel::download($export, 'posts.xlsx');
    }
}
