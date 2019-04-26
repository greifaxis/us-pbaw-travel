@extends('layouts.app')

@section('title','My Profile')
@push('customStyles')
    {{--<link rel="stylesheet" href="{{asset('css/tours.css')}}">--}}
@endpush

@section('content')

    <div class="row m-4">
        <div class="col-lg-3">
            <div class="card h-100">
                <div class="card-header d-flex flex-column align-items-center justify-content-center h3">
                    <i class="fas fa-user-astronaut fa-5x d-flex flex-row"></i>
                    <span id="user-name" class="d-flex flex-row mt-2">{{$user->firstName.' '.$user->lastName}}</span>
                </div>
                <div class="card-body d-flex flex-column">

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
                @if($errors->any())
                    <div class="alert alert-danger p-2 p-sm-1 my-0">
                        @foreach ($errors->all() as $error)
                                <div class="my-1">{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                </div>
                {{--TODO DELETE PROFILE WITH JQUERY--}}
                @if($isOwner)
                <div class="card-footer">
                    <a href="javascript:" data-toggle="modal" onclick="deleteData({{Auth::id()}})" data-target="#DeleteModal" class="btn btn-danger btn-block"><i class="fas fa-skull mr-1"></i>DELETE MYSELF</a>
                </div>
                @endif
            </div>
        </div>

        <div class="col-lg-9">
            <div class="row">
                <div class="col">
                    <div class="card mx-auto">
                        <div class="card-header h3">Edit profile</div>
                        <div class="card-body">
                            {{Form::model($roles, ['action'=> ['UsersController@update',$user->id]])}}
                            @method('PATCH')
                            @csrf
                            <div class="form-group row mx-1">
                                {{Form::label('email','Email',['class'=>'col-sm-3 col-form-label'])}}
                                {{Form::text('email',$user->email,['class'=>'form-control col-sm-9','maxlength' => 255])}}
                            </div>
                            <div class="form-group row mx-1">
                                {{Form::label('firstName','First Name',['class'=>'col-sm-3 col-form-label'])}}
                                {{Form::text('firstName',$user->firstName,['class'=>'form-control col-sm-9','maxlength' => 255])}}
                            </div>
                            <div class="form-group row mx-1">
                                {{Form::label('lastName','Last Name',['class'=>'col-sm-3 col-form-label'])}}
                                {{Form::text('lastName',$user->lastName,['class'=>'form-control col-sm-9','maxlength' => 255])}}
                            </div>
                            <div class="form-group row mx-1">
                                {{Form::label('phone','Phone',['class'=>'col-sm-3 col-form-label'])}}
                                {{Form::text('phone',$user->phone,['class'=>'form-control col-sm-9','maxlength' => 255])}}
                            </div>
                            <div class="form-group row mx-1">
                                {{Form::label('address','Address',['class'=>'col-sm-3 col-form-label'])}}
                                {{Form::text('address',$user->address,['class'=>'form-control col-sm-9','maxlength' => 255])}}
                            </div>
                            <div class="form-group row mx-1">
                                {{Form::label('company','Company',['class'=>'col-sm-3 col-form-label'])}}
                                {{Form::text('company',$user->company,['class'=>'form-control col-sm-9','maxlength' => 255])}}
                            </div>
                            <div class="form-group row mx-1">
                                {{Form::label('nipnum','NIP',['class'=>'col-sm-3 col-form-label'])}}
                                {{Form::text('nipnum',$user->nipnum,['class'=>'form-control col-sm-9','maxlength' => 255])}}
                            </div>
                            <div class="form-group row mx-1">
                            @if (Auth::user()->role()->value('role')=='admin')
                                {{Form::label('role','Role',['class'=>'col-sm-3 col-form-label'])}}
                                {{Form::select("role",$roles, $user->role()->value('role'),["class" => "form-control col-sm-9"])}}
                            @endif
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col">
                                    {{Form::submit('SUBMIT',['class'=>'btn btn-outline-success btn-block'])}}
                                    {{Form::close()}}</div>
                                @if($isOwner)
                                <div class="col">
                                    <a href="{{route('password.edit', Auth::id())}}" class="btn btn-outline-danger btn-block">CHANGE PASSWORD</a>
                                </div>
                                @elseif(Auth::user()->role()->value('role')=='admin')
                                    <div class="col">
                                        <a href="{{route('user.index')}}" class="btn btn-outline-danger btn-block">BACK TO USERS</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="DeleteModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="{{route('user.destroy', Auth::id())}}" id="deleteForm" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header align-content-center p-3">
                        <h5 class="modal-title">Yacant bee srs!</h5>
                        <button type="button" class="btn close" data-dismiss="modal"><i class="far fa-window-close"></i></button>
                    </div>
                    <div class="modal-body">
                        Do you wish to delete YOURSELF?!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                        <button type="submit" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">DELETE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        function deleteData(id)
        {
            var id = id;
            var url = '{{ route("user.destroy", ":id") }}';
            url = url.replace(':id', id);
            var node = document.getElementById("user-name");
            document.getElementById("hotel-delete-name").innerHTML = node.textContent;
            $("#deleteForm").attr('action', url);
        }

        function formSubmit()
        {
            $("#deleteForm").submit();
        }
    </script>
@endsection
