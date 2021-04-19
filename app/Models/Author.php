<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use CrudTrait;

    protected $table = 'authors';
    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public function books()
    {
        return $this->belongsToMany('App\Models\Book');
    }
}
