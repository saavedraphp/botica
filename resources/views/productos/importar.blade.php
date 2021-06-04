@extends('layouts.app')

@section('content')

<div class="container">
<h2>Importar Data de Excel 
  <a href="productos/create"> <button type="button" class="btn btn-success float-right">Adicionar</button></a>
  

</h2>
 


@if(Session::get('operacion')=='1')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

@if(Session::get('operacion')=='0')
  <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
  </div>

@endif
 




<form action="{{route('products.import.excel')}}" method="POST" 
id="frm_formulario" enctype="multipart/form-data" >

@csrf
 
  <div class="form-group">
        <label for="inputAddress">Imagen</label>
        <div class="input-group mb-3">

            <div class="input-group-prepend">
                <span class="input-group-text">Archivo</span>
            </div>

            <div class="custom-file">
                <input type="file" class="custom-file-input" id="img_cabecera"    ref="imagen" name="img">
                <label class="custom-file-label" for="inputGroupFile01">Seleccione Archivo</label>
            </div>
        
        </div>
  </div>

 

 

  <button type="submit" class="btn btn-primary">Cargar Datos</button>

 
</form> 
 
</div>
 @endsection
@section('scripts')

@endsection