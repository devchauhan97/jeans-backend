<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //protected $fillable = ['title', 'sort_description', 'image', 'status' ];
    protected $primaryKey = 'blogs_id';
    protected $guarded = [];
}
