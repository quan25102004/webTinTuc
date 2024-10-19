@extends('admin.layout.master')
@section('title')
    Danh Mục
@endsection
@section('content')
<div class="container">
  @if (session()->has('succes') && !session()->get('succes'))
  <div class="alert alert-danger">
      {{ session()->get('error') }}
  </div>
@endif
@if (session()->has('succes') && session()->get('succes'))
  <div class="alert alert-success">
      Thao tác thành công
  </div>
@endif
<div class="text-end d-flex justify-content-between">
  <a href="{{ route('categories.trash') }}" class="btn btn-danger">Thùng giác</a>
  <a href="{{ route('categories.create') }}" class="btn btn-success">Add</a>
</div>
<div class="mt-3 text-end">
  <form action="{{ route('categories.index') }}" method="GET">
    <input type="text" name="search" style="padding: 6px" placeholder="Tìm kiếm....">
    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
  </form>
</div>
        <table class="table table-striped table-bordered mt-3">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên Danh Mục</th>
                    <th scope="col">Tương tác</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $category)
                  <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td class="text-nowrap" style="width: 1px">
                      <a href="{{ route('categories.show', $category) }}" class="btn btn-primary">Show</a>
                      <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Edit</a>
                      <form action="{{ route('categories.destroy', $category) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" onclick="return confirm('Xác nhận xóa?')"
                              type="submit">Xóa</button>
                      </form>
                      {{-- <form action="{{ route('posts.forceDestroy', $post) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-warning" onclick="return confirm('Xác nhận xóa?')"
                              type="submit">Xóa cứng</button>
                      </form> --}}
                  </td>
                   
                  </tr>
                      
                  @endforeach
                </tbody>
          </table>
</div>
<div class="d-flex justify-content-center">
  <nav aria-label="Page navigation example" class="">
    {{$data->links()}}
  </nav>
</div>
@endsection