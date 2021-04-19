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
          'label' => 'Имя'
        ],
        [
          'name' => 'price',
          'label' => 'Стоимость'
        ],
        [
          'name' => 'authors',
          'label' => 'Авторы',
          'options' => (function ($query){
            $text = "";
            $isFirst = true;
            $authors = $query->get();
            foreach ($authors as $author) {
              if($isFirst){
                $text .= $author->name;
                $isFirst = false;
              }
              else{
                $text .= ", ".$author->name;
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
            'placeholder' => 'Введите имя'
          ]
        ],
        [
          'name' => 'price',
          'label' => 'Стоимость',
          'type' => 'text',
          'attributes' =>[
            'required' => 'required',
            'placeholder' => 'Введите стоимость'
          ]
        ],
        [
          'name' => 'authors',
          'label' => 'Авторы',
          'type' => 'select2_multiple',
          'entity' => 'authors',
          'pivot' => 'true',
          'attribute' => 'name',
          'model' => 'App\Models\Author',
          'options' => (function ($query){
            return $query->orderBy('name', 'asc')->get();
          })
        ]
      ]);
  }
}
