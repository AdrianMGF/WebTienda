<style>
  .zoom-on-hover {
    transition: transform 0.2s;
  }

  .zoom-on-hover:hover {
    transform: scale(1.1);
  }
</style>

@extends('templates.master')

<!-- SECTION: Main menu -->

<!-- LAYOUT: CENTER -->
@section('content-center')

<div class="container-fluid">
  <div class="row">
    <div class="p-3 mb-2 text-dark" style="background-color:#b4debe;">
      <h2>Ofertas del día</h2>
    </div>

    <!-- BLOCK: CENTER -->
    <div class="col-sm-8">
      @foreach($aProduct_offering as $Product_offered)
      <div class="card zoom-on-hover" style="width: 18rem; margin-top:2rem; margin-right:2rem; margin-left:2rem; margin-bottom:2rem;">
        <a href="product/{{$Product_offered->id}}" class="card-link">
          <img class="card-img-top" src="{{$Product_offered->imgUrl}}" alt="Card image cap">
        </a>
        <div class="card-body">
          <h5 class="card-title">{{ $Product_offered->name }}</h5>
          <p class="card-text">{{ $Product_offered->description }}</p>
          <p class="card-text">Precio:<s>{{$Product_offered->price}}</s> -><span class="text-danger font-weight-bold"><strong>{{ number_format($Product_offered->price * ((100 - $Product_offered->discountPercent) / 100), 2) }}</strong>€</span></p>
        </div>
      </div>
      @endforeach
    </div>

    <!-- BLOCK: RIGHT -->
    <div class="col-sm-4 sidenav p-0"> <!-- col-sm-4 para la barra lateral derecha -->
      <!-- SECTION: Cards -->
      <div class="card card-body bg-light" style="margin-bottom:15px;">
        <h5 class="card-title">Lo más vendido</h5>
        <!-- Elementos de la card -->
        <ol class="">
          <li>
            <a href="">
              <img src="../public/img/tablet2.jpg" class="img-thumbnail" alt="Responsive image">
            </a>
          </li>
          <li>
            <a href="">
              <img src="../public/img/tablet3.webp" class="img-thumbnail" alt="Responsive image">
            </a>
          </li>
          <li>
            <a href="">
              <img src="../public/img/tablet4.jpeg" class "img-thumbnail" alt="Responsive image">
            </a>
          </li>
          <li>
            <a href="">
              <img src="../public/img/tablet5.jpg" class="img-thumbnail" alt="Responsive image">
            </a>
          </li>
          <li>
            <a href="">
              <img src="../public/img/tablet5.jpg" class="img-thumbnail" alt="Responsive image">
            </a>
          </li>
          <li>
            <a href="">
              <img src="../public/img/tablet5.jpg" class="img-thumbnail" alt="Responsive image">
            </a>
          </li>
          <li>
            <a href="">
              <img src="../public/img/tablet5.jpg" class="img-thumbnail" alt="Responsive image">
            </a>
          </li>
        </ol>
        <a href="#" class="btn btn-primary" style="margin-top:5px;">Ver más</a>
      </div>
    </div>
  </div>

  <div class="container-Product_Offering" style="background-color:silver">
    <div class="container-fluid">
        <div class="row">
            <div class="p-3 mb-2 text-dark" style="background-color:#b4debe;">
                <h2>Nuestros productos</h2>
            </div>

            <div class="col-sm-12">
                <div class="row">
                    @foreach($aProduct_new as $Product)
                    <div class="col-md-4 mb-4">
                        <div class="card zoom-on-hover" style="margin-bottom:2rem;">
                            <a href="product/{{$Product->id}}" class="card-link">
                                <img class="card-img-top" src="{{$Product->imgUrl}}" alt="Card image cap">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $Product->name }}</h5>
                                <p class="card-text">{{ $Product->description }}</p>
                                <p class="card-text">Precio: <strong>{{$Product->price}} </strong>€</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


  @endsection