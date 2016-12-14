@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create User</div>

                    <div class="panel-body">
                        @if(isset($status))
                            <h2>{{ $status }}</h2>
                            @endif
                        <form action="{{ route('user.create') }}" method="post" class="form-horizontal">
                            {{ csrf_field() }}
                            <label for="">
                                Name:
                                <input type="text" name="name" required>
                            </label>
                            <label for="">
                                Second name:
                                <input type="text" name="second_name">
                            </label>
                            <label for="">
                                E-mail:
                                <input type="email" name="email" required>
                            </label>
                            <label for="">
                                Phone:
                                <input type="number" name="phone">
                            </label>
                            <label for="">
                                Cellphone:
                                <input type="text" name="cellphone">
                            </label>
                            <label for="">
                                Password:
                                <input type="password" name="password" required>
                            </label>
                            <input type="submit" value="Send">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
