<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Http\Request;

class BookController extends CrudController
{
  use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

  public function setup()
  {
      $this->crud->setModel('App\Models\Book');
      $this->crud->setRoute(config('backpack.base.route_prefix').'/books');
      $this->crud->setEntityNameStrings('книгу', 'книги');

      $this->crud->setColumns([
        [
          'name' => 'name',
          'lable' => 'Имя'
        ],
        [
          'name' => 'price',
          'lable' => 'Стоимость'
        ]
      ]);

      $this->crud->addFields([
        [
          'name' => 'name',
          'lable' => 'Имя',
          'type' => 'text',
          'attributes' =>[
            'required' => 'required',
            'placeholder' => 'Введите имя'
          ]
        ],
        [
          'name' => 'price',
          'lable' => 'Стоимость',
          'type' => 'text',
          'attributes' =>[
            'required' => 'required',
            'placeholder' => 'Введите стоимость'
          ]
        ]
      ]);
  }
}
