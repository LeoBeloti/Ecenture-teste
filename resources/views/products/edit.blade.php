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
            <form class="form"method="post" action="{{route('admin.update', $products->id)}}">
                @method('PUT')
              @csrf
              <div class="row align-center">
                {{-- Infos basicas do prod--}}
                <div class="form-group col-md-5 ">
                  <label for="name">Nome</label>
                  <input type="text" value="{{$products->name?$products->name:''}}" name="name" class="form-control" id="name" placeholder="Nome do Produto">
                </div>
                <div class="form-group col-md-5 ">
                  <label for="sku">Código do Produto</label>
                  <input type="text" name="sku" value="{{$products->sku?$products->sku:''}}" class="form-control" id="sku"  placeholder="Código do Produto">
                </div>
                <div class="form-group col-md-5 ">
                  <label for="child_sku">Código de Produtos da mesma linha</label>
                  <input type="text" name="child_sku" value="{{$products->child_sku?$products->child_sku:''}}" class="form-control" id="child_sku" placeholder="Código de Produtos da mesma linha">
                </div>
                <div class="form-group col-md-5 ">
                  <label for="product_URL">URL do Produto</label>
                  <input type="text" name="product_URL" class="form-control" value="{{$products->product_URL?$products->product_URL:''}}" id="product_URL" placeholder="URL do Produto">
                </div>
                <div class="form-group col-md-5 ">
                  <label for="thumbnail_URL">URL da Thumbnail</label>
                  <input type="text" name="thumbnail_URL" class="form-control" value="{{$products->thumbnail_URL?$products->thumbnail_URL:''}}" id="thumbnail_URL" placeholder="URL da Thumbnail">
                </div>
                <div class="form-group col-md-5 ">
                  <label for="inventory_count">Quantidade em estoque</label>
                  <input type="number" name="inventory_count" class="form-control" value="{{$products->inventory_count?$products->inventory_count:''}}" id="inventory_count" placeholder="Quantidade em estoque">
                </div>
              </div>
                {{-- valores --}}
              <div class="row align-center  py-5">
                <div class="form-group col-md-5">
                  <label for="price">Preço do Produto</label>
                  <input type="number" name="price" class="form-control" value="{{$products->price?$products->price:''}}" id="price" placeholder="Valor de Venda">
                </div>
                <div class="form-group col-md-5 ">
                  <label for="retail_price">Valor Sugerido</label>
                  <input type="number" name="retail_price" class="form-control" value="{{$products->retail_price?$products->retail_price:''}}" id="retail_price" placeholder="Valor sugerido">
                </div>
                <div class="form-group col-md-5">
                  <label for="category">Categorias</label>
                  <input type="text" name="category" class="form-control" value="{{$products->category?$products->category:''}}" id="category" placeholder="Categorias">
                </div>
                <div class="form-group col-md-5">
                  <label for="rating_avg">Avaliação do Produto</label>
                  <input type="number" name="rating_avg" class="form-control" value="{{$products->rating_avg?$products->rating_avg:''}}" id="rating_avg" placeholder="Avaliação do Produto">
                </div>
                <div class="form-group col-md-5 ">
                  <label for="rating_count">Quantidade de Avaliações</label>
                  <input type="text" name="rating_count" class="form-control" value="{{$products->rating_count?$products->rating_count:''}}" id="rating_count" placeholder="Quantidade de Avaliações">
                </div>
              </div>
                {{-- Infos extras --}}
              <div class="row align-center py-5">
                <div class="form-group col-md-5 ">
                  <label for="brand">Marca do Produto</label>
                  <input type="text" name="brand" class="form-control" value="{{$products->brand?$products->brand:''}}" id="brand" placeholder="Marca do Produto">
                </div>
                <div class="form-group col-md-5">
                  <label for="size">Tamanho</label>
                  <input type="text" name="size" class="form-control" value="{{$products->size?$products->size:''}}" id="size" placeholder="Tamanho">
                </div>
                <div class="form-group col-md-5 ">
                  <label for="shoe_size">Numeros do Tenis</label>
                  <input type="text" name="shoe_size" class="form-control" value="{{$products->shoe_size?$products->shoe_size:''}}" id="shoe_size" placeholder="Numero do Tenis">
                </div>
                <div class="form-group col-md-5 ">
                  <label for="pants_size">Numeros da Roupa</label>
                  <input type="text" name="pants_size" class="form-control" value="{{$products->pants_size?$products->pants_size:''}}" id="pants_size" placeholder="Numeros da roupa">
                </div>
                <div class="form-group col-md-5 ">
                  <label for="search_keywords">Palavras chave</label>
                  <input type="text" name="search_keywords" class="form-control" value="{{$products->search_keywords?$products->search_keywords:''}}" id="search_keywords" placeholder="Palavras chave">
                </div>
                <div class="form-group col-md-10">
                  <label for="description">Descrição</label>
                  <input type="text" name="description" class="form-control" value="{{$products->description?$products->description:''}}" id="description" placeholder="Descrição">
                </div>
                {{-- Cores/ + infos --}}
                <div class="row align-center py-5">
                  <div class="form-group col-md-5">
                    <label for="color">Cores</label>
                    <input type="text" name="color" class="form-control" value="{{$products->color?$products->color:''}}" id="color" placeholder="Cores">
                  </div>
                  <div class="form-group col-md-5">
                    <label for="color_family">Paleta de Cores</label>
                    <input type="text" name="color_family" class="form-control" value="{{$products->color_family?$products->color_family:''}}" id="color_family" placeholder="Paleta de Cores">
                  </div>
                  <div class="form-group col-md-5">
                    <label for="occassion">Ocasião</label>
                    <input type="text" name="occassion" class="form-control" value="{{$products->occassion?$products->occassion:''}}" id="occassion" placeholder="Paleta de Cores">
                  </div>
                  <div class="form-group col-md-5 ">
                    <label for="badges">Selos</label>
                    <input type="text" name="badges" class="form-control" value="{{$products->badges?$products->badges:''}}" id="badges" placeholder="Selos">
                  </div>
                  <div class="form-group col-md-5 ">
                    <label for="season">Estação</label>
                    <input type="text" name="season" class="form-control" value="{{$products->season?$products->season:''}}" id="season" placeholder="Estação">
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