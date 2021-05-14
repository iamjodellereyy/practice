<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $guarded = [];
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
    
    //post ang class nga una nako na butang
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
