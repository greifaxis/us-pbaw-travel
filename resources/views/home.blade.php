@extends('layouts.app')

@section('title','Home')
@push('customStyles')
    <link rel="stylesheet" href="{{asset('css/tours.css')}}">
    <link rel="stylesheet" href="{{asset('css/pageimage.css')}}">
@endpush

@section('content')

        <div id="carouselExampleIndicators" class="carousel slide my-5" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner rounded" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item active " style="background-image: url('https://i.imgur.com/vg3dHSe.png')">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-4">First Slide</h2>
                        <p class="lead">This is a description for the first slide.</p>
                    </div>
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
{{--                <div class="carousel-item" style="background-image: url('https://source.unsplash.com/bF2vsubyHcQ/1920x1080')">--}}
                <div class="carousel-item" style="background-image: url('https://i.kym-cdn.com/photos/images/newsfeed/001/023/762/343.jpg')">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-4">Second Slide</h2>
                        <p class="lead">This is a description for the second slide.</p>
                    </div>
                </div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
{{--                <div class="carousel-item" style="background-image: url('https://source.unsplash.com/szFUQoyvrxM/1920x1080')">--}}
                <div class="carousel-item" style="background-image: url('https://ichef.bbci.co.uk/news/660/cpsprodpb/16620/production/_91408619_55df76d5-2245-41c1-8031-07a4da3f313f.jpg')">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-4">Third Slide</h2>
                        <p class="lead">This is a description for the third slide.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    <div class="row align-items-center my-5">
        <div class="col-lg-7">
            <img class="img-fluid rounded mb-4 mb-lg-0" src="https://i.imgur.com/6afSPcc.png" alt="Globe">
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-5">
            <h1 class="font-weight-light">US Travel</h1>
            <p>“The gladdest moment in human life is a departure into unknown lands.” – Sir Richard Burton</p>
            <a class="btn btn-primary" href="http://us-pbaw-travel.test/tours">Zarezerwuj teraz!</a>
        </div>
        <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->


    <div class="row align-items-center my-5">

        <!-- /.col-lg-8 -->
        <div class="col-lg-5">
            <h1 class="font-weight-light">US Travel</h1>
            <p>“The gladdest moment in human life is a departure into unknown lands.” – Sir Richard Burton</p>
            <a class="btn btn-primary" href="http://us-pbaw-travel.test/tours">Zarezerwuj teraz!</a>
        </div>
        <!-- /.col-md-4 -->
        <div class="col-lg-7">
            <img class="img-fluid rounded mb-4 mb-lg-0" src="https://i.imgur.com/6afSPcc.png" alt="Globe">
        </div>
    </div>
    <!-- /.row -->


        <!-- Content Row -->
        <div class="row">
            <div class="col-md-4 mb-5">
                <div class="card h-20">
                    <div class="col-lg-12">
                        <img class="img-fluid rounded mb-auto mb-lg-auto mt-3" src="https://i.imgur.com/9Ojkwfo.png" alt="Woman">
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">Spontaneous trip with friends</h2>
                        <p class="card-text mb-auto">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex
                            numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
                    </div>
                    <div class="card-footer">
                        <a href="http://us-pbaw-travel.test/tours" class="btn btn-primary btn-sm">More Info</a>
                    </div>
                </div>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4 mb-5">
                <div class="card h-20">
                    <div class="col-lg-12">
                        <img class="img-fluid rounded mb-auto mb-lg-auto mt-3" src="https://i.imgur.com/aQuyGyS.png" alt="Thai">
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">Heart of urban jungle</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod tenetur ex
                            natus at dolorem enim! Nesciunt pariatur voluptatem sunt quam eaque, vel, non in id dolore
                            </p>
                    </div>
                    <div class="card-footer">
                        <a href="http://us-pbaw-travel.test/hotels" class="btn btn-primary btn-sm">More Info</a>
                    </div>
                </div>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4 mb-5">
                <div class="card h-20">
                    <div class="col-lg-12">
                        <img class="img-fluid rounded mb-auto mb-lg-auto mt-3" src="https://i.imgur.com/vg3dHSe.png" alt="Woman">
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">Chech out your orders</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex
                            numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
                    </div>
                    <div class="card-footer">
                        <a href="http://us-pbaw-travel.test/login" class="btn btn-primary btn-sm">More Info</a>
                    </div>
                </div>
            </div>
            <!-- /.col-md-4 -->

        </div>
        <!-- /.row -->
    <!-- /.container -->
@endsection
