@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            h1{
    font-size:50px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    border-bottom:crimson solid;
    border-top:crimson solid;
    color:	#d2691e;
    padding:20px;
}
</style>
@section('content')

<center><h1>Products</h1></center>
 <center>   
<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-danger fw-bold fs-4 rounded-pill" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Add Products
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="insertData" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb2">
                <input type="text" placeholder="Enter Product Name" class="form-control" name="pname" id="">
            </div>
            <div class="mb2">
                <input type="text" placeholder="Enter Product price" class="form-control" name="pprice" id="">
            </div>
            <div class="mb2">
                <input type="file"  name="image" class="form-control" name="" id="">
            </div><br>
            <button type="submit" class="btn btn-outline-warning fw-bold fs-4 rounded-pill">Add Record</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div> 
</center>
<div class="container">
<table class="table mt-5">
    <thead class="bg-secondary text-white fw-bold">
        <th>Id</th> 
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Product Image</th>
        <th>Product Status</th>
</thead>
<tbody class="text-danger bg-light fs-4">
    @foreach($data as $item)
    <tr>
<form action="updatedelete" method="get">
<td class="pt-5"><input type="hidden" name="id" value="{{$item['Id']}}">{{$item['Id']}}</td>
<td class="pt-5"><input type="hidden" name="name"value="{{$item['Pname']}}">{{$item['Pname']}}</td>
<td class="pt-5"><input type="hidden" name="price"value="{{$item['PPrice']}}">{{$item['PPrice']}}</td>
<td><img src="images/{{$item['Pimage']}}"  width="100px" height="100px" alt=""></td>
<td class="pt-5">
    <input type="submit" class="btn btn-outline-success rounded-pill" name="update" value="Update">
    <input type="submit" class="btn btn-outline-danger rounded-pill" value="Delete">
</td>
</form>
</tr>
@endforeach
</tbody>
</table> 
</div>
 
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
@endsection
