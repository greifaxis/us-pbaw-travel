@extends('layouts.app')

@section('title','Show Users')
@push('customStyles')
    <link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css')}}">
@endpush
@section('content')
    <div class="card  my-4">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Inbox
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered small" id="dataMessages" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Title</th>
                        <th>Message</th>
                        <th>Options</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Title</th>
                        <th>Message</th>
                        <th>Options</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @forelse($messages as $message)
                        <tr>
                            <td>{{$message->id}}</td>
                            <td>{{$message->email}}</td>
                            <td>{{$message->phone}}</td>
                            <td>{{$message->title}}</td>
                            <td class="cell-truncate">{{$message->body}}</td>
                            <td class="text-center">
                                <a href="{{route('contact.show', $message->id)}}" class="btn btn-outline-dark my-0 py-0 px-1">SHOW</a>
                            </td>
                        </tr>
                    @empty
                        <p>Error loading fields!</p>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted "></div>
    </div>

    <!-- Page level plugin JavaScript-->
    <script src="{{url('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Demo scripts for this page-->
    <script src="{{asset('js/datatables-demo.js')}}"></script>
    <script>

    </script>
@endsection