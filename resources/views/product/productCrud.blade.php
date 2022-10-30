@extends('layouts.app')

@section('content')

<!-- Start Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['group' => 'form', 'url' => '#','class' => 'form-horizontal', 'id' => 'submitForm', 'files' => true]) !!}
                <div class="form-group">
                    <label class="control-label col-md-12" for="title">Title<span class="text-danger"> *</span></label>
                    <div class="col-md-12">
                        {!! Form::text('title', null, ['id'=> 'title', 'class' => 'form-control', 'autocomplete' => 'off']) !!}
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-12" for="description">Description<span class="text-danger"> *</span></label>
                    <div class="col-md-12" wire:ignore> 
                        {!! Form::textarea('description', null, ['id'=> 'description', 'class' => 'form-control','cols'=>'20','rows' => '5']) !!}
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-12" for="subcategoryId">Sub Category<span class="text-danger"> *</span></label>
                    <div class="col-md-12">
                        {!! Form::select('subcategory_id', $subCategoryList, ['id'=> 'subcategoryId', 'class' => 'form-control form-select form-select-lg mb-3', 'autocomplete' => 'off']) !!}
                        <span class="text-danger">{{ $errors->first('subcategory_id') }}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-12" for="price">Price<span class="text-danger"> *</span></label>
                    <div class="col-md-12">
                        {!! Form::text('price', null, ['id'=> 'price', 'class' => 'form-control', 'autocomplete' => 'off']) !!}
                        <span class="text-danger">{{ $errors->first('price') }}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-12" for="unit">Select Thumbnail<span class="text-danger"> *</span></label>
                    <span class="btn green-seagreen btn-outline btn-file">
                        {!! Form::file('thumbnail', null, ['id'=> 'thumbnail']) !!}
                    </span>
                </div>
                {!!Form::close()!!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_product">ADD</button>
            </div>
        </div>
    </div>
</div>
<!-- End Product Modal -->


<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Product CRUD
                        <a href="#" class="btn btn-primary float-end btn-sm" data-bs-toggle="modal" data-bs-target="#addProductModal">
                            ADD PRODUCT</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">TITLE</th>
                                <th class="text-center">DESCRIPTION</th>
                                <th class="text-center">SUB CATEGORY</th>
                                <th class="text-center">PRICE</th>
                                <th class="text-center">THUMBNAIL</th>
                                <th class="text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody id="showProduct">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        var options = {
            closeButton: true,
            debug: false,
            positionClass: "toast-bottom-right",
            onclick: null,
        };



        fetchStudent();

        function fetchStudent() {
            $.ajax({
                url: "{{ URL::to('/product/create')}}",
                type: "GET",
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // console.log(response.studentList);
                    $('#showProduct').html(response.html);
                    // $.each(response.productList, function(key, item) {
                    //     $('tbody').append(
                    //         '<tr>\
                    //             <td class="text-center">' + item.title + '</td>\
                    //             <td class="text-center">' + item.description + '</td>\
                    //             <td class="text-center">' + item.subcategory_id + '</td>\
                    //             <td class="text-center">' + item.price + '</td>\
                    //             <td class="text-center">\
                    //             <img class="img-responsive" width="50" alt="Not Found!" src="{{URL::to('/')}}/public/uploads/'+item.thumbnail+'"/>\
                    //             </td>\
                    //             <td class="text-center">\
                    //                 <button type="button" value="' + item.id + '" class="edit_product btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editProductModal">Edit</button>\
                    //                 <button type="button" value="' + item.id + '"class="delete_product btn btn-danger btn-sm">Delete</button>\
                    //             </td>\
                    //         </tr>'
                    //     );
                    // });
                }

            });
        }

        $(document).on('click', '.add_product', function(e) {
            e.preventDefault();
            var formData = new FormData($('#submitForm')[0]);
            $.ajax({
                url: "{{ URL::to('/product')}}",
                type: "POST",
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {
                    $('#addProductModal').modal('hide');
                    fetchStudent();
                    toastr.success(res.message, res.heading, options);
                },
                error: function(jqXhr, ajaxOptions, thrownError) {
                    var errorsHtml = '';
                    if (jqXhr.status == 400) {
                        var errors = jqXhr.responseJSON.message;
                        $.each(errors, function(key, value) {
                            errorsHtml += '<li>' + value[0] + '</li>';
                        });
                        toastr.error(errorsHtml, jqXhr.responseJSON.heading, options);
                    } else if (jqXhr.status == 401) {
                        var errors = jqXhr.responseJSON.errormessage;
                        $.each(errors, function(key, value) {
                            errorsHtml += '<li>' + value + '</li>';
                        });
                        toastr.error(errorsHtml, jqXhr.responseJSON.heading, options);
                    } else {
                        toastr.error('SOMETHING WENT WRONG', 'Error', options);
                    }
                    // App.unblockUI();
                }
            }); //ajax

        });

        $(document).on('click', '.delete_product', function(e) {
            e.preventDefault();
            var options = {
                closeButton: true,
                debug: false,
                positionClass: "toast-bottom-right",
                onclick: null,
            };
            var productId = $(this).val();

            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "/product/" + productId,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(res) {
                                toastr.success(res.message, res.heading, options);
                                setTimeout(() => {
                                    // location.reload();
                                    fetchStudent();
                                }, 1000);
                            },
                            error: function(jqXhr, ajaxOptions, thrownError) {

                                if (jqXhr.status == 400) {
                                    var errorsHtml = '';
                                    var errors = jqXhr.responseJSON.message;
                                    $.each(errors, function(key, value) {
                                        errorsHtml += '<li>' + value + '</li>';
                                    });
                                    toastr.error(errorsHtml, jqXhr.responseJSON.heading,
                                        options);
                                } else if (jqXhr.status == 401) {
                                    toastr.error(jqXhr.responseJSON.message, '',
                                        options);
                                } else if (jqXhr.status == 422) {
                                    toastr.error(jqXhr.responseJSON.message, '', options);
                                } else {
                                    toastr.error('Error', "SOMETHING WENT WRONG",
                                        options);
                                }
                            }
                        });
                    }
                });
        });

        $(function(){
            tinymce.init({
                selector: '#description',
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        var data = $('#description').val();
                    });
                }
            });
        });

    });
</script>
@endsection