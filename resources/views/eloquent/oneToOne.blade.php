@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Eloquent ORM (ONE TO ONE)</h4>
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
                            @php
                            $sl = 1;
                            @endphp
                            @foreach($users as $user)
                            <tr>
                                <td class="text-center">{{ $sl }}</td>
                                <td class="text-center">{{ $user->name }}</td>
                                <td class="text-center">{{ $user->phone->name }}</td>
                            </tr>
                            @php
                            $sl++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Eloquent ORM (ONE TO ONE - invserse belongsTo)</h4>
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
                            @php
                            $sl = 1;
                            @endphp
                            @foreach($phones as $phone)
                            <tr>
                                <td class="text-center">{{ $sl }}</td>
                                <td class="text-center">{{ $phone->name }}</td>
                                <td class="text-center">{{ $phone->user->name }}</td>
                            </tr>
                            @php
                            $sl++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection