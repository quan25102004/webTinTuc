$(document).ready(function () {
    LoadData();
    $(document).on('click', '.btn-show-data', function () {
        LoadData();
    })
    $(document).on('click', '.btn-show-trash', function () {
        LoadData(true);
    })

    // Create
    $(document).on('submit','#createForm',function(e){
        e.preventDefault();

        var formData = new FormData();
        formData.append('title',$('#title').val());
        formData.append('content',$('#content').val());
        formData.append('category_id',$('#category_id').val());
        var tags = $('#tags').val();

        tags.forEach(function(tagId){
            formData.append('tags[]',tagId);
        })

        if($('#image')[0].files.length > 0){
          formData.append('image', $('#image')[0].files[0]);
        }

        $.ajax({
            url: 'http://asm.com/api/admin/posts',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success:function(){
                LoadData();
                $('#createForm')[0].reset();
                alert('Thêm mới thành công!')
            },
            error: function(xhr,error){
                alert('Thêm mới không thành công! Vui lòng thử lại')
                console.log(xhr.responseText);
                console.error('Có lỗi xảy ra:', error);
            }
        })
    })
    // End create

    // Show
    $(document).on('click','.btn-show[data-bs-target="#show"]',function(){
        var id = $(this).data('post-id');
        // console.log(id);
        $.ajax({
            url:'http://asm.com/api/admin/posts/' + id,
            type:'GET',
            success: function (res) {
                $('input#titleShow').val(res.data.title);
                $('input#contentShow').val(res.data.content);
                $('#imageShow').attr('src','/storage/'+res.data.image);
                $('input#category_id_show').val(res.data.category_name);
                $('input#contentShow').val(res.data.content);
                $('input#tagsShow').val(res.data.tag_list);
            }
        })
    })
    // End show

    // Update
    $(document).on('click','.btn-update[data-bs-target="#update"]',function(){
        var id = $(this).data('post-id');
        $('#updateForm').data('post-id',id);
        console.log(id);
        $.ajax({
            url:'http://asm.com/api/admin/posts/' + id,
            type:'GET',
            success: function (res) {
                $('input#titleUpdate').val(res.data.title);
                $('input#contentUpdate').val(res.data.content);
                $('#imageUpdate').attr('src','/storage/'+res.data.image);
                $('#category_id_update').val(res.data.category_id).trigger('change'); // selected
                $('#tagsUpdate').val(res.data.tag_id).trigger('change'); // selected

            }
        })
    })

    $(document).on('submit','#updateForm',function(e){
        e.preventDefault();
        var postId = $(this).data('post-id');

        var formData = new FormData(this);
        formData.append('_method','PUT');

        if($('#image')[0].files.length > 0){
          formData.append('image', $('#image')[0].files[0]);
        }

        $.ajax({
            url: 'http://asm.com/api/admin/posts/' + postId,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success:function(){
                LoadData();
                alert('Sửa thành công!')
            },
            error: function(xhr,error){
                alert('Sửa không thành công! Vui lòng thử lại')
                console.log(xhr.responseText);
                console.error('Có lỗi xảy ra:', error);
            }
        })
    })
    // End Update

    // Delete
    $(document).on('click','.destroy', function(){
        var id = $(this).data('post-id');
        $.ajax({
            url: 'http://asm.com/api/admin/posts/' + id,
            method: 'DELETE',
            success:function(){
                alert('Xóa thành công!')
                LoadData();
            },
            error: function(xhr){
                alert('Xóa không thành công! Vui lòng thử lại')
            }
            
        })
    })
    // End delete
    // Restore
    $(document).on('click','#restore', function(){
        var id = $(this).data('post-id');
        $.ajax({
            url: 'http://asm.com/api/posts/' + id + '/restore',
            method: 'POST',
            success:function(){
                alert('Khôi phục thành công!')
                LoadData(true);
            },
            error: function(xhr){
                alert('Khôi phục không thành công! Vui lòng thử lại')
            }
            
        })
    })
    // End Restore
})
function LoadData(isTrash = false) {
    var url = isTrash ? 'http://asm.com/api/posts/trash' : 'http://asm.com/api/admin/posts';
    $.ajax({
        url: url,
        type: 'GET',
        success: function (res) {
            var post = "";
            $.each(res, function (i, item) {
                post += '<tr>'
                post += '<td>' + item.id + '</td>'
                post += ' <td>'
                post += '<div style=" display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;overflow: hidden">' + item.title + '</div>'
                post += '</td>'
                post += '<td> <img src="/storage/' + item.image + '" width="100px" height="100px" alt=""> </td>'
                post += ' <td>'
                post += '<div style = "display: -webkit-box; -webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden; width:200px">' + item.content + '</div > '
                post += '</td>'
                post += '<td>' + item.category_name + '</td>'
                post += '<td>';
                if (item.tag && item.tag.length > 0) {
                    $.each(item.tag, function (j, tag) {
                        post += '<span class="badge bg-primary">' + tag.name + '</span>';
                    });
                } else {
                    post += '<span class="badge bg-danger">No tags</span>';
                }
                post += '</td>';
                post += '<td style="width:1px" class="text-nowrap">';
                if(isTrash){
                    post += '<button id="restore" data-post-id="' + item.id + '" class="btn btn-success"><i class="bi bi-arrow-clockwise"></i>Restore</button>';
                    post += '<button class="btn btn-danger" data-post-id="' + item.id + '"><i class="bi bi-trash"></i> Delete Permanently</button>';
                }else{
                    post += '<button class="btn btn-primary btn-show" data-bs-toggle="modal" data-post-id="'+ item.id +'" data-bs-target="#show" style="margin:5px"><i class="bi bi-eye-fill"></i> Show</button>';
                    post += '<button class="btn btn-warning btn-update" data-bs-toggle="modal" data-post-id="' + item.id + '" data-bs-target="#update"><i class="bi bi-pencil-square"></i> Update</button>';
                    post += '<button style="margin:5px" class="btn btn-danger destroy" data-post-id="' + item.id + '"><i class="bi bi-x-circle-fill"></i> Delete</button>';
                }
                post += '</td>';

                post += '</tr>'

            })
            $('#listData').html(post);
        }
    })
}