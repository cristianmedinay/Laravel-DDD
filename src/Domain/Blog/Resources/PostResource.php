<?php 

/*Eloquent api Resource*/
namespace Domain\Blog\Resources;
use Domain\Blog\Models\Post;
use Domain\Shared\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;


/**
* @mixin Post
*/

class PostResource extends JsonResource{

    //RETORNAMOS AL USUARIO UN JSON ARRAY
    //DATOS PARA RETORNAR
    public function toArray($request):array
    {
        return[
            'id'=>$this->id,
            'title'=>$this->title,
            'body'=>$this->body,
            'user'=>new UserResource($this->whenLoaded("user")),
            'category'=>new CategoryResource ($this->whenLoaded("category")),
            'tags'=> TagResource::collection($this->whenLoaded("tags")),
            'created_at'=>$this->created_at->isoFormat("LL"),
            
        ];     
    }


}