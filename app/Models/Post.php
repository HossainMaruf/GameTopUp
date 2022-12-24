<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'file', 'user_id'];
    public $timestamps = true;


    /**
     * Relation with User Table
     * @return [type] [description]
     */
    public function user() {
        return $this->belongsTo(User::class);
    }




    /**
     * Relation with Comments Table
     */

    public function comments() {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}
