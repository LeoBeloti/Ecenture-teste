<?php

namespace App\Services;

use App\Models\Categorys;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Session;

class CategoryService
{
  private $categorys;

  public function __construct(Categorys $categorys)
  {
    $this->categorys = $categorys;
  }

  public function index()
  {

    $categorys = Categorys::simplePaginate(10);
    // dd($categorys);
    return $categorys;
  }
  public function getcategorys()
  {
    $categorys = Categorys::orderBy('created_at')->get();
    // dd($categorys);
    return $categorys;
  }

  public function store($request)
  {
    $newCat = $this->categorys->create($request->all());
    // dd($newCat);

    if($newCat==true){
      Session::flash('event', 'Inserido com sucesso');
    } else {
      Session::flash('event', 'Falhou!');
    }
  }

  public function edit($id)
  {
    $event = Categorys::findOrFail($id);
    return $event;
  }

  public function update($request, $id)
 {
    // dd($request);
    $categorys = Categorys::findOrFail($id)->update($request->all());
    if($categorys == true)
    {
      Session::flash('event', 'Editado com sucesso');
      return $id;
    } else{
      Session::flash('event', 'Falha ao editar');
    }
 }

  public function destroy($id)
  {
    $event = Categorys::findOrFail($id)->delete();
    if($event==true){
      Session::flash('event', 'Apagado com sucesso');
    } else {
      Session::flash('event', 'Não apagou');
    }
  }
}