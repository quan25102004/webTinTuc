@extends('admin.layout.master')
@section('title')
    Chi tiết sản phẩm {{ $category->name }}
@endsection
@section('content')
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Trường</th>
                    <th scope="col">Giá trị</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category->toArray() as $key => $value)
                    
                <tr class="">
                    <td scope="row">{{$key}}</td>
                    <td>{{$value}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{route('categories.index')}}" class="btn btn-light mt-3">Quay lại</a>

    </div>
@endsection
