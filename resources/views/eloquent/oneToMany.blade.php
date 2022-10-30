@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Eloquent ORM (ONE TO MANY)</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">SL</th>
                                <th class="text-center">USER NAME</th>
                                <th class="text-center">PHONE</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Eloquent ORM (ONE TO Many - invserse belongsTo)</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">SL</th>
                                <th class="text-center">PHONE</th>
                                <th class="text-center">USER NAME</th>
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