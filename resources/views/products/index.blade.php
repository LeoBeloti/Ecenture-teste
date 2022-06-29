@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12">
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
                    @if($products)
                      @foreach($products as $p)
                          <tr>
                            <td scope="row">{{$p->id}}</td>
                            <td>{{$p->name}}</td>
                            <td>{{$p->created_at}}</td>
                            <td>
                              <form method="post" action="{{route('admin.destroy', $p->id)}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Excluir</button>
                              </form>
                            </td>
                            <td>
                              <form method="get" action="{{route('admin.edit', $p->id)}}">
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
                  {{$products->links()}}
              </div>
              <div class="card-footer">
                <div class="d-flex">
                    <a style="margin: 5px" class="btn btn-info" href="{{route('admin.home')}}">Voltar</a>
                    <a style="margin: 5px" class="btn btn-success" href="{{route('admin.register')}}">Novo Produto</a>
                </div>
              </div>
      </div>
  </div>
</div>
@endsection