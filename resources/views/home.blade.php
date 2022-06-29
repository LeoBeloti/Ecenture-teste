@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                        <a href="{{route('admin.register')}}" class="">Criar Produtos</a> - 
                        <a href="{{route('admin.index')}}">Listar Produtos</a><br>
                    </div>
                    <div>
                        <a href="{{route('admin.category.create')}}">Cadastrar Categoria</a> - 
                        <a href="{{route('admin.category.index')}}">Listar Categorias</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
