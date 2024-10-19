@extends('admin.layout.master')
@section('title')
    Thêm mới
@endsection
@section('content')
@if (session()->has('succes') && !session()->get('succes'))
<div class="alert alert-danger">
    {{session()->get('error')}}
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
    <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}">
        <button type="submit" class="btn btn-primary mt-3">Thêm mới</button>
        <a href="{{route('categories.index')}}" class="btn btn-light mt-3">Quay lại</a>
    </form>
@endsection