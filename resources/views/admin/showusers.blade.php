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
            Users table
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered small" id="dataUser" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Orders</th>
                        <th>Options</th>
                        <th class="d-none">Address</th>
                        <th class="d-none">Phone</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Orders: {{$orders->count()}}</th>
                        <th>Options</th>
                        <th class="d-none">Address</th>
                        <th class="d-none">Phone</th>

                    </tr>
                    </tfoot>
                    <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->firstName.' '.$user->lastName}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->orders()->count()}}</td>
                        <td class="text-right">
                            <a href="{{route('user.show', $user->id)}}" class="btn btn-outline-dark my-0 py-0 px-1">EDIT</a>
                            <a href="{{route('user.show', $user->id)}}" class="btn btn-outline-dark my-0 py-0 px-1">ORDERS</a>
                        </td>
                        <td class="d-none">{{$user->address}}</td>
                        <td class="d-none">{{$user->phone}}</td>
                    </tr>
                    @empty
                        <p>Error loading fields!</p>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted "><span class="mr-2"> Updated: {{$users->sortByDesc('updated_at')->first()->updated_at->format('h:i:s d.m.Y')}}</span><span class="mr-2"> Newest User: {{$users->sortByDesc('created_at')->first()->name.' '.$users->sortByDesc('created_at')->first()->created_at->format('h:i:s d.m.Y')}}</span></div>
    </div>

    <div class="card  my-4">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Admins table
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered small" id="dataAdmin" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Options</th>
                        <th class="d-none">Address</th>
                        <th class="d-none">Phone</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Options</th>
                        <th class="d-none">Address</th>
                        <th class="d-none">Phone</th>

                    </tr>
                    </tfoot>
                    <tbody>
                    @forelse($admins as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->firstName.' '.$user->lastName}}</td>
                            <td>{{$user->email}}</td>
                            <td class="text-right">
                                <a href="{{route('user.show', $user->id)}}" class="btn btn-outline-dark m-0 py-0 px-1 btn-block">EDIT</a>
                            </td>
                            <td class="d-none">{{$user->address}}</td>
                            <td class="d-none">{{$user->phone}}</td>
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
@endsection