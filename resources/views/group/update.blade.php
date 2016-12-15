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
                        <form action="{{ route('group.update', $group->id) }}" method="post" class="form-horizontal">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <label for="">
                                Name:
                                <input type="text" name="name" value="{{ $group->name }}" required>
                            </label>
                            <label for="">
                                Role:
                                <input type="text" name="role" value="{{ $group->role }}">
                            </label>
                            <label for="">
                                Description:
                                <input type="text" name="description" value="{{ $group->description }}" required>
                            </label>

                            <input class="btn-danger" type="submit" value="Update">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
