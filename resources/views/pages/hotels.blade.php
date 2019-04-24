@extends('layouts.app')

@section('title','Hotels')
@push('customStyles')
@endpush

@section('content')
        <div class="row">

            <div class="col-lg-3 mt-4">
                <div class="row">
                <div class="col-sm-12 h1 text-center">Our Hotels</div>
                </div>

                @can('create', App\Hotel::class)
                    <div class="row my-2">
                        <div class="col-sm-8 offset-2">
                            <a href="{{route('hotels.create')}}" class="btn btn-outline-dark btn-block align-content-center p-2"><i class="fas fa-plus-square fa-lg"></i> ADD HOTEL</a>
                        </div>
                    </div>
                @endcan
                <div class="row mt-3">
                <div class="list-group col-sm-12">
                @forelse($hotels as $hotel)
                        <a href="#hotel-card-{{$hotel->id}}" class="scroll-action list-group-item list-group-item-action py-1">{{$hotel->name}}</a>
                    @empty
                        <a href="/" class="btn btn-outline-dark">Home</a>
                    @endforelse
                </div>
                </div>
            </div>

            <div class="col-lg-9">
                @forelse($hotels as $hotel)
                    <div class="card mt-4" id="hotel-card-{{$hotel->id}}">
                        <img class="card-img-top img-fluid" src="{{$hotel->image}}" alt="">
                        <div class="card-body">
                            <h3 class="card-title">
                                <span id="hotel-name-{{$hotel->id}}">{{$hotel->name}}</span>
                                <span class="text-warning">
                                @for ($i = 0; $i < $hotel->stars; $i++)
                                        &#9733;
                                    @endfor
                            </span></h3>
                            <p class="card-text text-justify">{{$hotel->body}}</p>
                            <h4>Location: {{$hotel->city}}, {{$hotel->country}}</h4>
                        </div>
                        @can('create', App\Hotel::class)
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{route('hotels.edit', $hotel->id)}}" class="btn btn-outline-dark btn-block">EDIT</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="javascript:" data-toggle="modal" onclick="deleteData({{$hotel->id}})" data-target="#DeleteModal" class="btn btn-outline-danger btn-block">DELETE</a>
                                    </div>
                                </div>
                            </div>
                        @endcan
                    </div>
                @empty
                    <div class="card mt-4">
                        <div class="card-body">
                            <h3 class="card-title">No hotels to show...</h3>
                        </div>
                    </div>
            @endforelse

                <div class="card card-outline-secondary my-4">
                    <div class="card-header">
                        Product Reviews
                    </div>
                    <div class="card-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore,
                            similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat
                            laborum.
                            Sequi mollitia, necessitatibus quae sint natus.</p>
                        <small class="text-muted">Posted by Anonymous on {{$hotels[0]->created_at}}</small>
                        <hr>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore,
                            similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat
                            laborum.
                            Sequi mollitia, necessitatibus quae sint natus.</p>
                        <small class="text-muted">Posted by Anonymous on {{$hotels[0]->created_at}}</small>
                        <hr>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore,
                            similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat
                            laborum.
                            Sequi mollitia, necessitatibus quae sint natus.</p>
                        <small class="text-muted">Posted by Anonymous on {{$hotels[0]->created_at}}</small>
                        <hr>
                        <a href="#" class="btn btn-success">Leave a Review</a>
                    </div>
                </div>
            </div>
        </div>

    <div id="DeleteModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="{{route('hotels.destroy', $hotel->id)}}" id="deleteForm" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header align-content-center p-3">
                        <h5 class="modal-title">Confirm delete</h5>
                        <button type="button" class="btn close" data-dismiss="modal"><i class="far fa-window-close"></i></button>
                    </div>
                    <div class="modal-body">
                        Do you wish to delete <span id="hotel-delete-name"></span>?
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                            <button type="submit" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">DELETE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="scroll-up m-3">
        <a href="#app" id="btn-scroll-up" class="scroll-action btn btn-outline-dark m-5 d-none d-xl-block text-center p-3"><i class="fas fa-chevron-circle-up fa-3x"></i></a>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#btn-scroll-up').floatingActionButton();
        });

        function deleteData(id)
        {
            var id = id;
            var url = '{{ route("hotels.destroy", ":id") }}';
            url = url.replace(':id', id);
            var node = document.getElementById("hotel-name-"+id);
            document.getElementById("hotel-delete-name").innerHTML = node.textContent;
            $("#deleteForm").attr('action', url);
        }

        function formSubmit()
        {
            $("#deleteForm").submit();
        }

        $('a.scroll-action').on('click', function(event) {

            var target = $(this.getAttribute('href'));

            if( target.length ) {
                event.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top
                }, 1000);
            }

        });
    </script>
@endsection
