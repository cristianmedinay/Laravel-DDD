<?php

namespace Domain\Blog\Actions;

use Domain\Blog\Models\Post;
use Domain\Blog\Resources\PostResource;
use Domain\Shared\Models\User;
//crea y actualiza 
final class UpsertPostAction
{
    public static function execute(User $user): PostResource
    {
        $post = Post::updateOrCreate(
            ['id' => request()->route('post')],
            [
                'user_id' => $user->id,
                'category_id' => request("category_id"),
                'title' => request("title"),
                'body' => request("body"),
             
            ],
        );

        //crea un post
        $post->tags()->sync(request("tags") ?? []);

        return new PostResource($post->load(['user', 'tags', 'category']));
    }
}
