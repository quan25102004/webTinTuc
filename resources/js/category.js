$(document).ready(function () {
    $(document).on('click', '.btn-show-data', function () {
        LoadData();
    })
    LoadData();

    // Show
    $(document).on('click', '.btn-show[data-bs-target="#show"]', function () {
        var id = $(this).data('category-id');
        console.log(id);

        $.ajax({
            url: 'http://asm.com/api/admin/categories/' + id,
            type: 'GET',
            success: function (res) {
                $('input#nameCategory').val(res.data.name);
            }
        })
    })
    // End show

    // Create
    $(document).on('submit', '#createForm', function (e) {
        e.preventDefault();
        // Validate
        $('#nameError').text('');

        var name = $('#name').val();
        var hasError = false;

        if (!name) {
            $('#nameError').text('* Mời bạn nhập');
            hasError = true;
        }
        if (hasError) {
            return;
        }
        // End validate
        var formData = new FormData();
        formData.append('name', $('#name').val());

        $.ajax({
            url: 'http://asm.com/api/admin/categories',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function () {
                LoadData();
                $('#createForm')[0].reset();
                alert('Thêm mới thành công!');
            },
            error: function (xhr, status, error) {
                alert('Thêm mới không thành công!');
            }
        })
    })
    // End create

    // Update
    $(document).on('click', '.btn-update[data-bs-target="#update"]', function () {
        var id = $(this).data('category-id')
        console.log(id);
        $('#updateForm').data('category-id', id)
        $.ajax({
            url: 'http://asm.com/api/admin/categories/' + id,
            type: 'GET',
            success: function (res) {
                $('input#nameUpdate').val(res.data.name);
            }
        })
    })
    $(document).on('submit', '#updateForm', function (e) {
        e.preventDefault();
        var categoryID = $(this).data('category-id');

         $('#nameError').text('');

        var name = $('#nameUpdate').val();
        var hasError = false;

        if (!name) {
            $('#nameError').text('* Mời bạn nhập');
            hasError = true;
        }
        if (hasError) {
            return;
        }

        var formData = new FormData(this);
        formData.append('_method', 'PUT');
        //  console.log("Dữ liệu đang gửi:");
        // for (var pair of formData.entries()) {
        //     console.log(pair[0] + ': ' + pair[1]);
        // }
        $.ajax({
            url: 'http://asm.com/api/admin/categories/' + categoryID,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function () {
                LoadData();
                alert('Sửa mới thành công!');
            },
            error: function (xhr, status, error) {
                alert('Sửa mới không thành công!');
                console.log(xhr.responseText);
                
            }
        })
    })
    // End Update

    // Search
    $(document).on('submit', '#search', function (e) {
        e.preventDefault();
        var query = $('#searchInput').val();
        $.ajax({
            url: 'http://asm.com/api/admin/categories',
            method: 'GET',
            data: { q: query },
            success: function (res) {
                if (res.length > 0) {
                    var category = "";
                    $.each(res, function (i, item) {
                        category += '<tr>'
                        category += '<td>' + item.id + '</td>'
                        category += '<td>' + item.name + '</td>'
                        category += '<td><button class="btn btn-primary" data-bs-toggle="modal" data-category-id="' + item.id + '" data-bs-target="#show" style="margin:5px">Show</button> <button style="margin:5px" class="btn btn-warning" data-bs-toggle="modal" data-category-id="' + item.id + '" data-bs-target="#update">Update</button>  <button style="margin:5px" class="btn btn-danger" data-category-id="' + item.id + '">Delete</button></td>'
                        category += '</tr>'
                    })
                    $('#listData').html(category);
                } else {
                    var category = "";
                    category += '<p>'
                    category += 'Không có dữ liệu nào'
                    category += '</p>'
                    $('#listData').html(category);
                }
            }
        });
    });
    // End search

    // Delete
    $(document).on('click', '.btn-danger', function () {
        var id = $(this).data('category-id')
        if (!confirm('Bạn có chắc chắn muốn xóa mục không?')) {
            return; // Nếu người dùng không xác nhận, thoát
        }
        $.ajax({
            url: 'http://asm.com/api/admin/categories/' + id,
            method: 'DELETE',
            // data: {
            //     is_deleted: true,
            //     deleted_at: new Date().toISOString(),// Thêm thời gian xóa
            // },
            success: function () {
                alert('Xóa thành công!');
                LoadData(); // Làm mới dữ liệu nếu cần
            },
            error: function (xhr, status, error) {
                alert('Có lỗi xảy ra trong quá trình xóa!');
            }
        })
    })
    // End delete

    // List Trashs
    $(document).on('click', '.btn-show-trash', function () {
        LoadData(true);
    })
    // End List Trashs
    
    // Restore
    $(document).on('click', '#restore', function () {
        var id = $(this).data('category-id')
        $.ajax({
            url:'http://asm.com/api/categories/'+ id +'/restore',
            method: 'POST',
            success: function (res) {
                LoadData(true);
                alert('Khôi phục thành công!');
            }
        })
    })
    // End Restore


})

function LoadData(isTrash = false) {
    var url = isTrash ? 'http://asm.com/api/categories/trash' : 'http://asm.com/api/admin/categories';
    $.ajax({
        url: url,
        type: 'GET',
        success: function (res) {
            var category = "";
            $.each(res, function (i, item) {
                category += '<tr>'
                category += '<td>' + item.id + '</td>'
                category += '<td>' + item.name + '</td>'
                category += '<td>';
                if (isTrash) {
                    category += '<button id="restore" data-category-id="' + item.id + '" class="btn btn-success"><i class="bi bi-arrow-clockwise"></i>Restore</button>';
                    category += '<button class="btn btn-danger" data-category-id="' + item.id + '"><i class="bi bi-trash"></i> Delete Permanently</button>';
                } else {
                    category += '<button class="btn btn-primary btn-show" data-bs-toggle="modal" data-category-id="' + item.id + '" data-bs-target="#show" style="margin:5px"><i class="bi bi-eye-fill"></i> Show</button>';
                    category += '<button class="btn btn-warning btn-update" data-bs-toggle="modal" data-category-id="' + item.id + '" data-bs-target="#update"><i class="bi bi-pencil-square"></i> Update</button>';
                    category += '<button style="margin:5px" class="btn btn-danger" data-category-id="' + item.id + '"><i class="bi bi-x-circle-fill"></i> Delete</button>';
                }
                category += '</td>';
                category += '</tr>'
            })
            $('#listData').html(category);
        }
    })
}
