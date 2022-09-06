@extends('main')
@section('title', 'Category')

@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Phone</th>
        <th scope="col">Address</th>
        <th scope="col">Money</th>
        <th scope="col">Status</th>
        <th scope="col">Thao tác</th>
      </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
      <tr>
        <th scope="row">1</th>
        <td>{{$order->fullname}}</td>
        <td>{{$order->phone}}</td>
        <td>{{$order->ship_address}}</td>
        <td>{{$order->total_money}}</td>
        <td>
          <form action="{{route('admin.order.fix-order-status', $order->id)}}" method="POST">
            @csrf
            @method('PUT')
            <select style="width: 160px;" class="form-select" aria-label="Default select example" name="fix_order_sts" id="">
              @foreach ($order_status as $item)
                  <option  
                  @if($order->order_status_id == $item->id)
                      selected
                  @endif
                  value="{{$item->id}}">{{$item->status_name}}</option>
              @endforeach
              
            </select>
            
            <button type="submit" class="btn btn-info">cập nhật</button>
            
          </form>
          
        </td>
        <td>

            <a href="{{route('admin.order.order-detail', $order->id)}}" class="btn btn-warning">Xem chi tiết</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  
@endsection
