@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">{{ __('Listagem') }}</div>
              <div class="card-body">
                  @if(Session::has('event'))
                    <div class="alert alert-success" role="alert">
                      <p>{{Session::get('event')}}</p>
                    </div>
                  @endif
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Data de criação</th>
                        <th scope="col">Ação</th>
                      </tr>
                    </thead>
                    <tbody>
                      {{-- {{dd($products)}} --}}
                    @if($categorys)
                      @foreach($categorys as $cat)
                          <tr>
                            <td scope="row">{{$cat->id}}</td>
                            <td>{{$cat->name}}</td>
                            <td>{{$cat->created_at}}</td>
                            <td>
                              <form method="post" action="{{route('admin.category.destroy', $cat->id)}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Excluir</button>
                              </form>
                            </td>
                            <td>
                              <form method="get" action="{{route('admin.category.edit', $cat->id)}}">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-primary" type="submit">editar</button>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                      @endif
                    </table>
                  </div>
                  {{$categorys->links()}}
          </div>
          <div class="card-footer">
            <div class="d-flex">
                <a style="margin: 5px" class="btn btn-info" href="{{route('admin.home')}}">Voltar</a>
                <a style="margin: 5px" class="btn btn-success" href="{{route('admin.category.create')}}">Nova Categoria</a>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection