<?php

namespace Domain\Blog\Models;

use Database\Factories\TagFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model {
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
        'name',
    ];
    protected static function newFactory()
    {
        return app(TagFactory::class);
    }
    //una categoria puede tener muchos posts
    public function posts(): BelongsToMany {
    return $this->belongsToMany(Post::class,'post_tag','tag_id','post_id');
    //return $this->belongsToMany(Post::class);
    }
}