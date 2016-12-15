@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="{{ route('user.all') }}">Users</a>
                    <br>
                    <a href="{{ route('group.all') }}">Groups</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
