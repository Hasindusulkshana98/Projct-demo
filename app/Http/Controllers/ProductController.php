<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
class ProductController extends Controller
{
    function insert(Request $req){
      $name=  $req->get('pname');
      $price=  $req->get('pprice');
      $pimage=  $req->file('image')->getClientOriginalName();
      //move uploaded file
      $req->image->move(public_path('images'),$pimage);

      $prod = new product();
      $prod ->PName =$name;
      $prod ->PPrice =$price;
      $prod ->Pimage =$pimage;
      $prod ->save();
      return redirect('home');
    }
    
    function readdata(){
        $pdata = product::all();
        return view('home',['data'=>$pdata]);
    }
    function updateordelete(Request $req){
        $id = $req->get('id');
        $name = $req->get('name');
        $price = $req->get('price');
        if($req->get('update') == 'Update'){
            return view('updateview',['pid'=>$id, 'pname'=>$name, 'pprice'=>$price]);
        }
        else{
           $prod = product::find($id);
           $prod->delete();
        }
        return redirect('home');
    }
    function update(Request $req){
        $ID = $req->get('id');
        $Name = $req->get('name');
        $Price = $req->get('price');
        $prod = product::find($ID);
        $prod->Pname =$Name;
        $prod->PPrice =$Price;
        $prod->save();
        return redirect('home');
    }
}
 