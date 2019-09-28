@extends('layouts.app')

@section('title','My Basket')
@push('customStyles')
    {{--<link rel="stylesheet" href="{{asset('css/tours.css')}}">--}}
@endpush

@section('content')

    <div class="row mt-3">
        <div class="col mb-2">
            @if(session('success'))
                <div class="alert alert-success p-2 p-sm-1 my-0">
                    {{session('success')}}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger p-2 p-sm-1 my-0">
                    {{session('error')}}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger p-2 p-sm-1 my-0">
                    @foreach ($errors->all() as $error)
                        <div class="my-1">{{ $error }}</div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <div class="row mt-2 mb-4">
        <div class="col-lg-3">
            <div class="card h-100">
                <div class="card-header d-flex flex-column align-items-center justify-content-center h3">
                    <i class="fas fa-shopping-basket fa-5x d-flex flex-row"></i>
                    <span id="user-name" class="d-flex flex-row mt-2">My basket</span>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="row">
                <div class="col">
                    <div class="card mx-auto">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-3 m-0 p-0 pl-4 h3"><i class="far fa-list-alt mx-2"></i>Contents</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered small" id="dataUser" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Offer Name</th>
                                        <th>Value</th>
                                        <th>Places</th>
                                        <th>Cost</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr class="h6">
                                        <th></th>
                                        <th></th>
                                        <th class="text-right">{{$baskets->sum('quantity')}}</th>
                                        <th class="text-right">{{sprintf('%0.2f',$baskets->sum('value'))}}</th>
                                        <th></th>
                                    </tr>
                                    <tbody>
                                    @forelse($baskets as $basket)
                                        <tr>
                                            <td><a href="{{route('tours.show',$basket->offer_id)}}">{{$basket->offer->name}}</a></td>
                                            <td class="text-right">{{empty($basket->offer->sale) ? $basket->offer->price : $offer->offer->sale}}</td>
                                            <td class="text-right">{{$basket->quantity}}</td>
                                            <td class="text-right">{{sprintf('%0.2f',$basket->value)}}</td>
                                            <td class="text-center p-0 align-middle">
                                                <form action="{{route('basket.destroy', $basket->id)}}" id="deleteBasketItem" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                            <button type="submit" id="deleteButton" class="text-secondary btn btn-link" onclick="formSubmit()"><span class="fas fa-minus-square fa-2x m-0 p-0"></span></button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-secondary">Basket is empty</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col mt-4">
                    <div class="card h-100">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-3 m-0 p-0 pl-4 h3"><i class="far fa-credit-card mx-2"></i>Checkout</div>
                            </div>
                        </div>
                        <div class="card-body">
                            {{Form::open(['action'=> 'BasketsController@checkout','method' => 'POST'])}}
                            {{Form::token()}}
                            <div class="form-group row mx-1">
                                {{Form::label('firstNameBilling','First Name',['class'=>'col-sm-3 col-form-label'])}}
                                {{Form::text('firstNameBilling',$user->firstName,['class'=>'default-disabled form-control col-sm-7','maxlength' => 255, $baskets->isEmpty() ? 'readonly' : ''])}}
                            </div>
                            <div class="form-group row mx-1">
                                {{Form::label('lastNameBilling','Last Name',['class'=>'col-sm-3 col-form-label'])}}
                                {{Form::text('lastNameBilling',$user->lastName,['class'=>'default-disabled form-control col-sm-7','maxlength' => 255, $baskets->isEmpty() ? 'readonly' : ''])}}
                            </div>
                            <div class="form-group row mx-1">
                                {{Form::label('companyBilling','Company',['class'=>'col-sm-3 col-form-label'])}}
                                {{Form::text('companyBilling',$user->company,['class'=>'default-disabled form-control col-sm-7','maxlength' => 255, $baskets->isEmpty() ? 'readonly' : ''])}}
                            </div>
                            <div class="form-group row mx-1">
                                {{Form::label('nipnumBilling','NIP',['class'=>'col-sm-3 col-form-label'])}}
                                {{Form::text('nipnumBilling',$user->nipnum,['class'=>'default-disabled form-control col-sm-7','maxlength' => 255, $baskets->isEmpty() ? 'readonly' : ''])}}
                            </div>
                            <div class="form-group row mx-1">
                                {{Form::label('phoneBilling','Phone',['class'=>'col-sm-3 col-form-label'])}}
                                {{Form::text('phoneBilling',$user->phone,['class'=>'default-disabled form-control col-sm-7','maxlength' => 255, $baskets->isEmpty() ? 'readonly' : ''])}}
                            </div>
                            <div class="form-group row mx-1">
                                {{Form::label('addressBilling','Address',['class'=>'col-sm-3 col-form-label'])}}
                                {{Form::text('addressBilling',$user->address,['class'=>'default-disabled form-control col-sm-7','maxlength' => 255, $baskets->isEmpty() ? 'readonly' : ''])}}
                            </div>
                            <div class="form-group row mx-1">
                                {{Form::label('messageBilling','Message',['class'=>'col-sm-3 col-form-label'])}}
                                {{Form::textarea('messageBilling','',['class'=>'form-control col-sm-7','placeholder'=>'Your message', $baskets->isEmpty() ? 'readonly' : ''])}}
                            </div>
                            <div class="form-group row mx-1">
                                {{Form::checkbox('isDefaultBilling',null,false,['class'=>'form-control col-sm-1 offset-sm-3', 'id'=>'isDefaultBilling',$baskets->isEmpty() ? 'disabled' : ''])}}
                                {{Form::label('isDefaultBilling','Use default data from profile',['class'=>'col-sm-6 col-form-label'])}}
                            </div>
                            <div class="row mx-1 mt-4 p-0">
                                <div class="col-sm-7 offset-3 p-0">
                                    {{Form::submit('Submit',['class'=>'btn btn-success btn-block'])}}
                                </div>
                            </div>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>


        </div>

    </div>

    <script>
        $("#deleteButton").hover(function(){
            $(this).addClass("text-danger");
        }, function(){
            $(this).removeClass("text-danger");
        });

        $("#isDefaultBilling").change(function(){
            if($(this).is(":checked")) {
                $(".default-disabled").addClass("bg-light").prop('readonly',true);
            }else{
                $(".default-disabled").removeClass("bg-light").prop('readonly',false);
            }
        });


    </script>


@endsection
