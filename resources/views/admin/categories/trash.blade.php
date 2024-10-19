@extends('admin.layout.master')
@section('title')
    Thùng giác
@endsection
@section('content')
@if (session()->has('success') && session()->get('success'))
<div class="alert alert-success">
    Thao tác thành công
</div>
@endif
@if (session()->has('success') && !session()->get('success'))
<div class="alert alert-success">
    {{session()->get('error')}}
</div>
@endif
<table class="table table-striped table-bordered mt-2">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($trashs as $trash)
      {{-- @dd($post->tag->toArray()); --}}
      <tr>
        <th scope="row">{{$trash->id}}</th>
        <td>{{$trash->name}} </td>
        <td class="text-nowrap" style="width: 1px">
            <a href="{{route('categories.restore',['category'=>$trash->id])}}" class="btn btn-primary">Khôi phục</a>
            <a href="{{route('categories.edit',$trash)}}" class="btn btn-warning">Xóa</a>
        </td>    
      </tr>           
      @endforeach
    </tbody>
</table>
{{$trashs->links()}}
<a href="{{route('posts.index')}}" class="btn btn-light mt-3">Quay lại</a>

@endsection
