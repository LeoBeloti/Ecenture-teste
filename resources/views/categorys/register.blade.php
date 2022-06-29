@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">{{ __('Cadastrar Categoria') }}</div>
              <div class="card-body">
                @if(Session::has('event'))
                  <div class="alert alert-success" role="alert">
                    {{Session::get('event')}}
                  </div>
                @endif
                <form method="post"
                    @if(!isset($categorys))
                      action="{{route('admin.category.store')}}">
                      {{-- {{dd('oi sem cat')}} --}}
                    @elseif(isset($categorys))
                      action="{{route('admin.category.update', $categorys->id)}}">
                      {{-- {{dd('oi com cat')}} --}}
                      @method('PUT')
                    @endif
                  @csrf
                  <div class="form-group">
                    <label for="category">Nome da Categoria</label>
                    <input required type="text" value="{{isset($categorys->name) ? $categorys->name : ""}}" class="form-control" id="category" aria-describedby="text" name="name" placeholder="Nome da categoria">
                    <small id="categoryHelper" class="form-text text-muted">Após cadastrar uma categoria você poderá atribui-la a um produto!</small>
                  </div>
                  <button type="submit" class="btn btn-success">Salvar</button>
                </form>
              </div>
              <div class="card-footer">
                <div class="d-flex">
                    <a class="btn btn-info" href="{{route('admin.category.index')}}">Voltar</a>
                </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection