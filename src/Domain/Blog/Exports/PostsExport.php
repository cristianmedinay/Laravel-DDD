<?php

namespace Domain\Blog\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Maatwebsite\Excel\Concerns\FromView;

class PostsExport implements FromView
{
    public function __construct(public readonly ResourceCollection $posts){}

    public function view(): View
    {
        return view("blog.posts.export", [
            "posts" => $this->posts,
        ]);
    }
}
