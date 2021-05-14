<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    //
 

    protected $guarded = [];

  
    use HasSlug;

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function user(){
        return $this->belongsTo(User::class);
    }

    // public function setPostImageAttribute($value){
    //     $this->attributes['post_image'] = asset($value);
    // }

    //somethings wrong with this
    public function getPostImageAttribute($value) {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
        return asset('storage/' . $value);
    }

    // public function whereIsActive(){

    // }
    
    //post ang class nga una nako na butang
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
