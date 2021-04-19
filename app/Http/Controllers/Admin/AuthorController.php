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
        [
          'name' => 'name',
          'label' => 'Имя'
        ],
        [
          'name' => 'books',
          'label' => 'Книги',
          'options' => (function ($query){
            $text = "";
            $isFirst = true;
            $books = $query->get();
            foreach ($books as $book) {
              if($isFirst){
                $text .= $book->name;
                $isFirst = false;
              }
              else{
                $text .= ", ".$book->name;
              }
            }
            return $text;
          })
        ]
      ]);

      $this->crud->addFields([
        [
          'name' => 'name',
          'label' => 'Имя',
          'type' => 'text',
          'attributes' =>[
            'required' => 'required',
            'placeholder' => 'Имя'
          ]
        ],
        [
          'name' => 'books',
          'label' => 'Книги',
          'type' => 'select2_multiple',
          'entity' => 'books',
          'pivot' => 'true',
          'attribute' => 'name',
          'model' => 'App\Models\Book',
          'options' => (function ($query){
            return $query->orderBy('name', 'asc')->get();
          })
        ]
      ]);
  }
}
