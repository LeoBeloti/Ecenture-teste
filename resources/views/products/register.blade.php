@extends('layouts.app')
<style>
  .formulario{}
</style>
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="">
      <div class="card">
        <div class="card-header">
          {{ __('Cadastro de Produtos') }}
        </div>
        <div class="card-body col-md-12">
            @if(Session::has('event'))
              <div class="alert alert-success" role="alert">
                <p>{{Session::get('event')}}</p>
              </div>
            @endif
            <form class="form" method="post" action="{{route('admin.store')}}">
              @csrf
              <div class="row align-center">
                {{-- Infos basicas do prod--}}
                <div class="form-group col-md-5 ">
                  <label for="name">Nome</label>
                  <input required type="text" name="name" class="form-control" id="name" placeholder="Nome do Produto">
                </div>
                <div class="form-group col-md-5 ">
                  <label for="sku">Código do Produto</label>
                  <input required type="text" name="sku" class="form-control" id="sku"  placeholder="Código do Produto">
                </div>
                <div class="form-group col-md-5 ">
                  <label for="child_sku">Código de Produtos da mesma linha</label>
                  <input type="text" name="child_sku" class="form-control" id="child_sku" placeholder="Código de Produtos da mesma linha">
                </div>
                <div class="form-group col-md-5 ">
                  <label for="product_URL">URL do Produto</label>
                  <input required type="text" name="product_URL" class="form-control" id="product_URL" placeholder="URL do Produto">
                </div>
                <div class="form-group col-md-5 ">
                  <label for="thumbnail_URL">URL da Thumbnail</label>
                  <input required type="text" name="thumbnail_URL" class="form-control" id="thumbnail_URL" placeholder="URL da Thumbnail">
                </div>
                <div class="form-group col-md-5 ">
                  <label for="inventory_count">Quantidade em estoque</label>
                  <input required type="number" name="inventory_count" class="form-control" id="inventory_count" placeholder="Quantidade em estoque">
                </div>
              </div>
                {{-- valores --}}
              <div class="row align-center  py-5">
                <div class="form-group col-md-5">
                  <label for="price">Preço do Produto</label>
                  <input required type="number" name="price" class="form-control" id="price" placeholder="Valor de Venda">
                </div>
                <div class="form-group col-md-5 ">
                  <label for="retail_price">Valor Sugerido</label>
                  <input required type="number" name="retail_price" class="form-control" id="retail_price" placeholder="Valor sugerido">
                </div>
                <div class="form-group col-md-5">
                  <label for="rating_avg">Avaliação do Produto</label>
                  <input required type="number" name="rating_avg" class="form-control" id="rating_avg" placeholder="Avaliação do Produto">
                </div>
                <div class="form-group col-md-5 ">
                  <label for="rating_count">Quantidade de Avaliações</label>
                  <input required type="number" name="rating_count" class="form-control" id="rating_count" placeholder="Quantidade de Avaliações">
                </div>
              </div>
                {{-- Infos extras --}}
              <div class="row align-center py-5">
                <div class="form-group col-md-5 ">
                  <label for="brand">Marca do Produto</label>
                  <input required type="text" name="brand" class="form-control" id="brand" placeholder="Marca do Produto">
                </div>
                <div class="form-group col-md-5">
                  <label for="size">Tamanho</label>
                  <input type="text" name="size" class="form-control" id="size" placeholder="Tamanho">
                </div>
                <div class="form-group col-md-5 ">
                  <label for="shoe_size">Numeros do Tenis</label>
                  <input type="text" name="shoe_size" class="form-control" id="shoe_size" placeholder="Numero do Tenis">
                </div>
                <div class="form-group col-md-5 ">
                  <label for="pants_size">Numeros da Roupa</label>
                  <input type="text" name="pants_size" class="form-control" id="pants_size" placeholder="Numeros da roupa">
                </div>
                <div class="form-group col-md-5 ">
                  <label for="search_keywords">Palavras chave</label>
                  <input type="text" name="search_keywords" class="form-control" id="search_keywords" placeholder="Palavras chave">
                </div>
                <div class="form-group col-md-10">
                  <label for="description">Descrição</label>
                  <input required type="text" name="description" class="form-control" id="description" placeholder="Descrição">
                </div>
                {{-- Cores/ + infos --}}
                <div class="row align-center py-5">
                  <div class="form-group col-md-5">
                    <label for="color">Cores</label>
                    <input required type="text" name="color" class="form-control" id="color" placeholder="Cores">
                  </div>
                  <div class="form-group col-md-5">
                    <label for="color_family">Paleta de Cores</label>
                    <input required type="text" name="color_family" class="form-control" id="color_family" placeholder="Paleta de Cores">
                  </div>
                  <div class="form-group col-md-5">
                    <label for="occassion">Ocasião</label>
                    <input type="text" name="occassion" class="form-control" id="occassion" placeholder="Paleta de Cores">
                  </div>
                  <div class="form-group col-md-5 ">
                    <label for="badges">Selos</label>
                    <input type="text" name="badges" class="form-control" id="badges" placeholder="Selos">
                  </div>
                  <div class="form-group col-md-5 ">
                    <label for="season">Estação</label>
                    <input type="text" name="season" class="form-control" id="season" placeholder="Estação">
                  </div>
                </div>
              </div>               
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>
        <div class="card-footer">
          <div class="d-flex">
              <a class="btn btn-info" href="{{route('admin.index')}}">Voltar</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection