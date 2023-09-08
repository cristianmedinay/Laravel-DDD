<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Domain\Blog\Actions\ExportPostToExcelAction;
use Domain\Blog\Actions\UpsertPostAction;
use Domain\Blog\FormRequests\PostRequest;
use Domain\Blog\Models\Post;
use Domain\Blog\ViewModels\GetPostViewModel;
use Domain\Blog\ViewModels\UpsertPostViewModel;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;


class PostController extends Controller
{
    //
    
    public function index(): Response
    {
      /*   dd((new GetPostViewModel())->toArray()); */
        return inertia('Blog/Posts/Index', [
            "model" => new GetPostViewModel(),
        ]);
    }

    public function create(): Response {
        return inertia('Blog/Posts/Form', [
            "model" => new UpsertPostViewModel
        ]);
    }

    public function store(PostRequest $request): RedirectResponse {
        UpsertPostAction::execute($request->user());
        return redirect()->route('posts.index');
    }

    public function edit(Post $post): Response {
        return inertia('Blog/Posts/Form', [
            "title" => __("Editar post"),
            "actionText" => __("Actualizar"),
            "model" => new UpsertPostViewModel($post),
        ]);
    }

    public function update(PostRequest $request): RedirectResponse {
        UpsertPostAction::execute($request->user());
        return redirect()->route('posts.index');
    }

    public function exportToExcel(): BinaryFileResponse
    {
        return ExportPostToExcelAction::execute((new GetPostViewModel())->posts(false));
    }




}
