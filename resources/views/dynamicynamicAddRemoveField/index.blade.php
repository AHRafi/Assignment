@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Dynamic Add Remove Field</h4>
                </div>
                <div class="card-body">
                    <form class="insert-form" id="submitForm" method="POST" action="">
                        <table class="table table-bordered table-striped" id="inputTable">
                            <tr>
                                <th class="text-center">NAME</th>
                                <th class="text-center">EMAIL</th>
                                <th class="text-center">PHONE</th>
                                <th class="text-center">ADD/REMOVE</th>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <input type="text" name="name[]">
                                </td>
                                <td class="text-center">
                                    <input type="text" name="email[]">
                                </td>
                                <td class="text-center">
                                    <input type="text" name="phone[]">
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary add_student">ADD</button>
                                </td>
                            </tr>
                        </table>
                        <center>
                            <button type="submit" class="btn btn-info" id="save">Save Data</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {

        var options = {
            closeButton: true,
            debug: false,
            positionClass: "toast-bottom-right",
            onclick: null,
        };

        var html = '<tr><td class="text-center"><input type="text" name="name[]"></td>\
                                <td class="text-center"><input type="text" name="email[]"></td>\
                                <td class="text-center"><input type="text" name="phone[]"></td>\
                                <td class="text-center"><button type="button" class="btn btn-danger remove_student">REMOVE</button></td>\
                            </tr>';
        var max = 3;
        var x = 1;

        $(document).on('click', '.add_student', function(e) {
            e.preventDefault();
            if (x <= max) {
                $('#inputTable').append(html);
                x++;
            }

        });

        $(document).on('click', '.remove_student', function(e) {
            e.preventDefault();
            // alert("ok");
            $(this).closest('tr').remove();
            x--;
        });

        $(document).on('click', '#save', function(e) {
            e.preventDefault();
            // alert("ok");
            // var data = $(this).serialize();
            // console.log(data);

            // var formData = new FormData($('#submitForm')[0]);
            $.ajax({
                url: "/saveData",
                type: "POST",
                data: $('#submitForm').serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {
                    toastr.success(res.message, res.heading, options);
                    setTimeout(() => {
                        location.reload();
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
        });



    });
</script>
@endsection


@endsection