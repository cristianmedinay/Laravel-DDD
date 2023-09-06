<?php

namespace Domain\Blog\Models;

use Database\Factories\PostFactory;
use Domain\Shared\Models\Scopes\UserScope;
use Domain\Shared\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model {
    use HasFactory;
    protected $fillable=[
        'user_id',
        "category_id",
        "title",
        "body",
    ];
    

    //global que propaga a todos los modelos
    protected static function booted(){
        static::addGlobalScope(UserScope::class);
    }

    protected static function newFactory()
    {
        return app(PostFactory::class);
    }


    //BELONG ES LA REALCION
    public function posts(): BelongsTo {
    //return $this->belongsToMany(Post::class,'post_tag','tag_id','post_id');
    return $this->belongsTo(User::class);
    }
    public function category(): BelongsTo {
    return $this->belongsTo(Category::class);
    }
    public function tags(): BelongsToMany {
    return $this->belongsToMany(Tag::class);
    }


}