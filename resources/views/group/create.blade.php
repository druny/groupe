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
                        <form action="{{ route('group.create') }}" method="post" class="form-horizontal form">
                            {{ csrf_field() }}
                            <label for="">
                                Name:
                                <input type="text" name="name" required>
                            </label>
                            <label for="">
                                Role:
                                <input type="text" name="role">
                            </label>

                            <label for="">
                                Description:
                                <input type="text" name="description">
                            </label>

                            <input type="submit" value="Send">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
