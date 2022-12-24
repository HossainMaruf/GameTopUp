<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    use HasFactory;

   /**
    * Make a relationship with User class
    */
   public function user() {
    return $this->belongsTo(User::class);
   }


   /**
    * Load all the replies with specific parent_id
    */
   public function replies() {
        return $this->belongsTo(Comment::class)->whereNotNull('parent_id');
   }
}

