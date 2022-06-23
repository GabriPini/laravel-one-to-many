<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
/* use App\Models\Category; */
class Post extends Model
{
    //
    protected $fillable = ['title','content','slug','cover_image','category_id'];

    public static function generateSlug($title)
    {
        # code...
        return Str::slug($title, '-');
    }


    /**
     * Get the category that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}

