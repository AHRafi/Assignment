@extends('layouts.app')

@section('content')

<!-- Start Student Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Add Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['group' => 'form', 'url' => '#','class' => 'form-horizontal', 'id' => 'submitForm', 'files' => true]) !!}
                <div class="form-group">
                    <label class="control-label col-md-12" for="name">Name<span class="text-danger"> *</span></label>
                    <div class="col-md-12">
                        {!! Form::text('name', null, ['id'=> 'name', 'class' => 'form-control', 'autocomplete' => 'off']) !!}
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12" for="email">Email<span class="text-danger"> *</span></label>
                    <div class="col-md-12">
                        {!! Form::text('email', null, ['id'=> 'email', 'class' => 'form-control', 'autocomplete' => 'off']) !!}
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12" for="phone">Phone<span class="text-danger"> *</span></label>
                    <div class="col-md-12">
                        {!! Form::text('phone', null, ['id'=> 'phone', 'class' => 'form-control', 'autocomplete' => 'off']) !!}
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12" for="course">Course<span class="text-danger"> *</span></label>
                    <div class="col-md-12">
                        {!! Form::text('course', null, ['id'=> 'course', 'class' => 'form-control', 'autocomplete' => 'off']) !!}
                        <span class="text-danger">{{ $errors->first('course') }}</span>
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_student">ADD</button>
            </div>
        </div>
    </div>
</div>
<!-- End Student Modal -->

<!-- Start Edit Student Modal -->
<div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Edit Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['group' => 'form', 'url' => '#','class' => 'form-horizontal', 'id' => 'editSubmitForm', 'files' => true]) !!}
                {!! Form::hidden('student_id', null, ['id'=> 'studentId', 'class' => 'form-control', 'autocomplete' => 'off']) !!}
                <div class="form-group">
                    <label class="control-label col-md-12" for="name">Name<span class="text-danger"> *</span></label>
                    <div class="col-md-12">
                        {!! Form::text('edit_name', null, ['id'=> 'editName', 'class' => 'form-control', 'autocomplete' => 'off']) !!}
                        <span class="text-danger">{{ $errors->first('edit_name') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12" for="email">Email<span class="text-danger"> *</span></label>
                    <div class="col-md-12">
                        {!! Form::text('edit_email', null, ['id'=> 'editEmail', 'class' => 'form-control', 'autocomplete' => 'off']) !!}
                        <span class="text-danger">{{ $errors->first('edit_email') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12" for="phone">Phone<span class="text-danger"> *</span></label>
                    <div class="col-md-12">
                        {!! Form::text('edit_phone', null, ['id'=> 'editPhone', 'class' => 'form-control', 'autocomplete' => 'off']) !!}
                        <span class="text-danger">{{ $errors->first('edit_phone') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12" for="course">Course<span class="text-danger"> *</span></label>
                    <div class="col-md-12">
                        {!! Form::text('edit_course', null, ['id'=> 'editCourse', 'class' => 'form-control', 'autocomplete' => 'off']) !!}
                        <span class="text-danger">{{ $errors->first('edit_course') }}</span>
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary update_student">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- End Edit Student Modal -->

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>AJAX CRUD
                        <a href="#" class="btn btn-primary float-end btn-sm" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                            ADD STUDENT</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">NAME</th>
                                <th class="text-center">EMAIL</th>
                                <th class="text-center">PHONE</th>
                                <th class="text-center">COURSE</th>
                                <th class="text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>

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
                url: "{{ URL::to('/fetchStudent')}}",
                type: "GET",
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // console.log(response.studentList);
                    $('tbody').html("");
                    $.each(response.studentList, function(key, item) {
                        $('tbody').append(
                            '<tr>\
                                <td class="text-center">' + item.id + '</td>\
                                <td class="text-center">' + item.name + '</td>\
                                <td class="text-center">' + item.email + '</td>\
                                <td class="text-center">' + item.phone + '</td>\
                                <td class="text-center">' + item.course + '</td>\
                                <td class="text-center">\
                                    <button type="button" value="' + item.id + '" class="edit_student btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editStudentModal">Edit</button>\
                                    <button type="button" value="' + item.id + '"class="delete_student btn btn-danger btn-sm">Delete</button>\
                                </td>\
                            </tr>'
                        );
                    });
                }

            });
        }

        $(document).on('click', '.add_student', function(e) {
            e.preventDefault();
            var formData = new FormData($('#submitForm')[0]);
            $.ajax({
                // both url is ok
                // url: "/addStudent",
                url: "{{ URL::to('/addStudent')}}",
                type: "POST",
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                // beforeSend: function () {
                //     $(this).prop("disabled", true);
                //     App.blockUI({boxed: true});
                // },
                success: function(res) {
                    $('#addStudentModal').modal('hide');
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
                        toastr.error('@lang("label.SOMETHING_WENT_WRONG")', 'Error', options);
                    }
                    // App.unblockUI();
                }
            }); //ajax

        });

        $(document).on('click', '.edit_student', function(e) {
            e.preventDefault();
            var studentId = $(this).val();
            // alert(studentId);

            $.ajax({
                url: "/editStudent/" + studentId,
                type: "GET",
                success: function(response) {
                    $('#editName').val(response.studentInfo.name);
                    $('#editEmail').val(response.studentInfo.email);
                    $('#editPhone').val(response.studentInfo.phone);
                    $('#editCourse').val(response.studentInfo.course);
                    $('#studentId').val(studentId);
                }

            });
        });

        $(document).on('click', '.update_student', function(e) {
            e.preventDefault();
            var formData = new FormData($('#editSubmitForm')[0]);
            var studentId = $('#studentId').val();


            var dataInfo = {
                'name': $('#editName').val(),
                'email': $('#editEmail').val(),
                'phone': $('#editPhone').val(),
                'course': $('#editCourse').val(),
                'student_id': studentId,
            };


            $.ajax({
                // both url is ok
                // url: "/addStudent",

                url: "/updateStudent",
                type: "POST",
                dataType: "json",
                data: dataInfo,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                // beforeSend: function () {
                //     $(this).prop("disabled", true);
                //     App.blockUI({boxed: true});
                // },
                success: function(res) {
                    $('#editStudentModal').modal('hide');
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
                        setTimeout(function() {
                            // location.reload();
                            fetchStudent();
                        }, 1000);
                    } else if (jqXhr.status == 401) {
                        var errors = jqXhr.responseJSON.errormessage;
                        $.each(errors, function(key, value) {
                            errorsHtml += '<li>' + value + '</li>';
                        });
                        toastr.error(errorsHtml, jqXhr.responseJSON.heading, options);
                    } else {
                        toastr.error('@lang("label.SOMETHING_WENT_WRONG")', 'Error', options);
                        setTimeout(function() {
                            // location.reload();
                            fetchStudent();
                        }, 1000);
                    }
                    // App.unblockUI();
                }
            }); //ajax

        });

        $(document).on('click', '.delete_student', function(e) {
            e.preventDefault();
            var options = {
                closeButton: true,
                debug: false,
                positionClass: "toast-bottom-right",
                onclick: null,
            };
            var studentId = $(this).val();

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
                            url: "/deleteStudent/"+studentId,
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
                                    toastr.error('Error', "@lang('label.SOMETHING_WENT_WRONG')",
                                        options);
                                }
                            }
                        });
                    }
                });
        });

    });
</script>
@endsection