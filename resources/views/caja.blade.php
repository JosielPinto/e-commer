@extends('layouts.app')

@section('content')

    <div class="container" style="margin-top: 80px">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Volver a Carrito</a></li>
                <li class="breadcrumb-item active" aria-current="page">Verificar</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-lg-12">

                <div class="row">
                    <div class="col-lg-7">
                        <h4>Su Factura</h4>
                    </div>
                </div>

            

                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <br>
                            <h4> Productos Agregados:</h4>
                            <br>
                            <div class="form-row align-items-center">
                            
                            @foreach(\Cart::getContent() as $item)
                                <div class="col-lg-3">
                                    <p>Nombre: {{$item->name}} <br> 
                                    Descripción: {{$item->attributes->slug}} <br> 
                                    Precio: {{$item->price}} <br> 
                                    Cantidad: {{$item->quantity}}</p>
                                </div>
                            @endforeach
                            
                            
                         </div> 
                         <br>
                            <h5><FONT COLOR="black">Su monto total a Cancelar es:</FONT> <FONT COLOR="red">${{ \Cart::getTotal() }}</FONT> </h5>
                        </div> 


                    </div>

                    <a href="/cart" class="btn btn-dark">Volver a Carrito</a>
                    <a class="btn btn-success" href="{{ route('mensaje') }}">Pagar Compra!</a>
                    
                </div>
            </div>
        </div>
    </div>
@endsection