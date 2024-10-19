@extends('admin.layout.master')
@section('title')
    Sửa sản phẩm {{$category->title}}
@endsection
@section('content')
@if (session()->has('succes') && !session()->get('succes'))
<div class="alert alert-danger">
    {{session()->get('error')}}
</div>
@endif
@if (session()->has('succes')&& session()->get('succes'))
<div class="alert alert-success">
  Thao tác thành công
</div>
@endif   
@if ($errors->any())
<div class="alert alert-danger mt-3 mb-3">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
    <form action="{{route('categories.update', $category)}}" method="post" >
        @csrf
        @method('PUT')
        <label for="" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{$category->name}}">
        <button type="submit" class="btn btn-primary mt-3">Sửa</button>
        <a href="{{route('categories.index')}}" class="btn btn-light mt-3">Quay lại</a>

    </form>
@endsection