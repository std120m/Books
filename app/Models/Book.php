<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  use CrudTrait;

  protected $table = 'books';
  protected $primaryKey = 'id';

  protected $guarded = ['id'];
}
