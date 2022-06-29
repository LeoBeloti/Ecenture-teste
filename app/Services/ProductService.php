<?php

namespace App\Services;

use App\Models\Products;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductService
{
  private $products;

  public function __construct(Products $products)
  {
    $this->products = $products;
  }

  public function dataImport($request)
  {
    if($request->isMethod("POST")){
      // dd($request->file('file'));
      // $xmlDataString = file_get_contents(public_path('sample-course.xml'));
      $file = $request->file('file');
      if($file->isValid()){
        $var = $file->store('pasta');
        $xmlDataString = file_get_contents(Storage::path($var));
        // dd($xmlDataString);
        $xmlObject = simplexml_load_string($xmlDataString);
        $json = json_encode($xmlObject);
        $phpDataArray = json_decode($json, true); 

        if(count($phpDataArray['Product']) > 0){

          $dataArray = array();
          
          foreach($phpDataArray['Product'] as $index => $data){

            $dataArrayCat[] = [
              "category_id" => $data["Category_ID"],
              "category" => $data["Category"]
            ];
            $salva =$this->products->create([
              "id" => $data['Product_ID'],
              "sku" => $data['SKU'],
              "name" => $data['Name'],
              "product_URL" => $data['Product_URL'],
              "price" => $data["Price"],
              "retail_price" => $data["Retail_Price"],
              "thumbnail_URL" => $data["Thumbnail_URL"],
              "search_Keywords" => $data["Search_Keywords"],
              "description" => $data["Description"],
              "category_id" => $data["Category_ID"],
              "brand" => $data["Brand"],
              "child_sku" =>json_encode($data["Child_SKU"]),
              "child_price" => json_encode($data["Child_Price"]),
              "color" => json_encode($data["Color"]),
              "color_family" =>json_encode( $data["Color_Family"]),
              "color_swatches" => json_encode($data["Color_Swatches"]),
              "size" => json_encode($data["Size"]),
              "shoe_size" =>json_encode($data["Shoe_Size"]),
              "pants_size" =>json_encode( $data["Pants_Size"]),
              "occassion" =>json_encode($data["Occassion"]),
              "season" =>json_encode( $data["Season"]),
              "badges" => json_encode($data["Badges"]),
              "rating_avg" => json_encode(doubleval($data["Rating_Avg"])),
              "rating_count" => json_encode(doubleval($data["Rating_Count"])),
              "inventory_count" => json_encode(doubleval($data["Inventory_Count"])),
              "created_at" => $data["Date_Created"]
            ]);

          }
          // dd($salva);
      }
     }
    }
  }

  public function index()
  {

    $products = Products::simplePaginate(10);
    return $products;
  }

  public function store($request)
  {
    $newProd = $this->products->create($request->all());

    if($newProd==true){
      Session::flash('event', 'Inserido com sucesso');
    } else {
      Session::flash('event', 'Falhou!');
    }
  }

  public function edit($id)
  {
    $event = Products::findOrFail($id);
    return $event;
  }

  public function update($request, $id)
 {
    $prod = Products::findOrFail($id)->update($request->all());
    if($prod == true)
    {
      Session::flash('event', 'Editado com sucesso');
    } else{
      Session::flash('event', 'Falha ao editar');
    }
 }

  public function destroy($id)
  {
    $event = Products::findOrFail($id)->delete();
    if($event==true){
      Session::flash('event', 'Apagado com sucesso');
    } else {
      Session::flash('event', 'Não apagou');
    }
    return $event;
  }
}