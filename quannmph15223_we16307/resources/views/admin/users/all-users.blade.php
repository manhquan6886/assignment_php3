@extends('main')
@section('title', 'Users')

@section('content')
      <!-- Button trigger modal -->
    <a class="btn btn-primary" href="{{route('admin.attribute.add-attribute')}}">Thêm mới</a>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Fullname</th>
        <th scope="col">Email</th>
        <th scope="col">Quyền</th>
        <th scope="col">Thao tác</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $item)
          
      
      <tr>
        <th scope="row">{{$item->id}}</th>
        <td> {{$item->fullname}}</td>
        <td> {{$item->email}}</td>
        <td>
            @if($item->role==1)
                Admin
            @else 
                Người dùng
            @endif
        </td>
        <td>
            @if(Auth::id() == $item->id)
            @else
            <form action="{{route('admin.users.update-role', $item->id)}}" method="POST">
                @csrf
               @method('PUT')
                <button class="btn btn-warning">Cấp quyền</button>
              </form>
            @endif
            
            
        </td>
      </tr>
      
      @endforeach
    </tbody>
  </table>

  

  
@endsection
