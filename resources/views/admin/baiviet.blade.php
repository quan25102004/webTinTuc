@extends('admin.layout.master')
@section('title')
    Bài Viết
@endsection
@section('content')
    <div class="container">
        <div class="text-end d-flex justify-content-between">
            <button data-bs-toggle="modal" data-bs-target="#create" class="btn btn-success"><i class="bi bi-plus-circle"></i>
                Create
            </button>
            <form id="search">
                <input type="text" name="searchInput" id="searchInput"
                    style=" width: 300px; 
                    padding: 10px; 
                    border: 2px solid #007BFF; 
                    border-radius: 5px; 
                    font-size: 10px; 
                    transition: border-color 0.3s; "
                    placeholder="Search....">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
    
            </form>
        </div>
            <table class="table table-striped table-bordered mt-2">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Content</th>
                        <th scope="col">Category_Name</th>
                        <th>Tags</th>
                        <th scope="col" >Action</th>

                    </tr>
                </thead>
                <tbody id="listData">
                  
                </tbody>
            </table>
        </div>

        {{-- Modal Create --}}
        <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form id="createForm">
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
                                    <label for="content" class="form-label">Content</label>
                                    <input type="text" name='content' id='content' class="form-control" value="{{old('content')}}">
                                    <label for="" class="form-label">Image</label>
                                    <input type="file" name="image" id="image" class="form-control" value="{{old('image')}}">
                                    <label for="" class="form-label">Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        @foreach ($categories as $id =>$name)
                                        <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select> <br>
                                    <label for="" class="form-label">Tags</label>
                                    <select name="tags[]" multiple id="tags" class="form-control">
                                        @foreach ($tags as $id=>$name)
                                        <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End Modal Create --}}

        {{-- Modal Show --}}
            <div class="modal fade" id="show" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Show</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form id="createForm">
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" disabled name="titleShow" id="titleShow" class="form-control" >
                                    <label for="content" class="form-label">Content</label>
                                    <input type="text" disabled name='contentShow' id='contentShow' class="form-control">
                                    <label for="" class="form-label">Image</label> <br>
                                    <img src="" width="100px" name="imageShow" id="imageShow" alt=""> <br>
                                    <label for="" class="form-label">Category</label>
                                    <input type="text" disabled name='category_id_show' id='category_id_show' class="form-control">
                                    <label for="" class="form-label">Tags</label>
                                    <input type="text" disabled name='tagsShow' id='tagsShow' class="form-control">
                                   
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End Modal Show --}}

        {{-- Modal Update --}}
        <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form id="updateForm" data-post-id="">
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" name="title" id="titleUpdate" class="form-control" value="{{old('title')}}">
                                    <label for="content" class="form-label">Content</label>
                                    <input type="text" name='content' id='contentUpdate' class="form-control" value="{{old('content')}}">
                                    <label for="" class="form-label">Image</label>
                                    <input type="file" name="image" id="image" class="form-control" value="{{old('image')}}">
                                    <img src="" width="100px" name="image" id="imageUpdate" alt=""> <br>
                                    <label for="" class="form-label">Category</label>
                                    <select name="category_id" id="category_id_update" class="form-control">
                                        @foreach ($categories as $id =>$name)
                                        <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select> <br>
                                    <label for="" class="form-label">Tags</label>
                                    <select name="tags[]" multiple id="tagsUpdate" class="form-control">
                                        @foreach ($tags as $id=>$name)
                                        <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End Model Update --}}
        @vite('resources/js/post.js')
    @endsection
