@extends('admin.layout.master')
@section('title')
    Danh Mục
@endsection
@section('content')
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
    <table class="table table-striped table-bordered mt-3">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên Danh Mục</th>
                <th scope="col">Tương tác</th>

            </tr>
        </thead>
        <tbody id="listData">

        </tbody>
    </table>
    <div id="pagination">
        <!-- Các nút phân trang sẽ được hiển thị ở đây -->
    </div>
    </div>
    {{-- Paginate --}}

    {{-- <div class="d-flex justify-content-center">
  <nav aria-label="Page navigation example" class="">
    {{$data->links()}}
  </nav>
</div> --}}

    {{-- End paginate --}}

    <!-- Modal show -->
    <div class="modal fade" id="show" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Chi tiết</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="mb-3 row">
                            <label for="nameCategory" class="col-4 col-form-label">Name</label>
                            <div class="col-8">
                                <input type="text" disabled class="form-control" name="nameCategory" id="nameCategory"
                                    placeholder="Name" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Show --}}

    <!-- Modal Create -->
    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form id="createForm">
                            <div class="mb-3 row">
                                <label for="name" class="col-4 col-form-label">Name</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Name" />
                                    <div class="text-danger" id="nameError"></div>
                                </div>
                            </div>
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
    {{-- End Create --}}

    <!-- Modal update -->
    <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form id="updateForm" data-category-id="">
                            <div class="mb-3 row">
                                <label for="name" class="col-4 col-form-label">Name</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" name="name" id="nameUpdate"
                                        placeholder="Name" />
                                    <div class="text-danger" id="nameError"></div>
                                </div>
                            </div>
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
    {{-- End update --}}
    @vite('resources/js/category.js')
@endsection
