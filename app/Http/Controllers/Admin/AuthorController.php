<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Http\Request;

class AuthorController extends CrudController
{
  use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

  public function setup()
  {
      $this->crud->setModel('App\Models\Author');
      $this->crud->setRoute(config('backpack.base.route_prefix').'/authors');
      $this->crud->setEntityNameStrings('автора', 'авторы');

      $this->crud->setColumns([
        'name' => 'name',
        'lable' => 'Имя'
      ]);

      $this->crud->addFields([
        [
          'name' => 'name',
          'lable' => 'Имя',
          'type' => 'text',
          'attributes' =>[
            'required' => 'required',
            'placeholder' => 'Имя'
          ]
        ]
      ]);
  }
}
