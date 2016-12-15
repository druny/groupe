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
                        <form action="{{ route('user.update', $user->id) }}" method="post" class="form-horizontal">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <label for="">
                                Name:
                                <input type="text" name="name" value="{{ $user->name }}" required>
                            </label>
                            <label for="">
                                Second name:
                                <input type="text" name="second_name" value="{{ $user->second_name }}">
                            </label>
                            <label for="">
                                E-mail:
                                <input type="email" name="email" value="{{ $user->email }}" required>
                            </label>
                            <label for="">
                                Phone:
                                <input type="number" name="phone" value="{{ $user->phone }}">
                            </label>
                            <label for="">
                                Cellphone:
                                <input type="text" name="cellphone" value="{{ $user->cellphone }}">
                            </label>

                            <label for="">
                                Password:
                                <input type="password" name="password">
                            </label>
                            <label for="">
                                Groups:
                                <select name="group">

                                    @foreach($groups as $group)
                                        <option value="{{ $group->id }}"
                                        @foreach($user->groups as $my_groups )

                                            @if($my_groups->id == $group->id)
                                                 @echo disabled selected
                                                @endif
                                        @endforeach
                                        >{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </label>
                            <input class="btn-danger" type="submit" value="Update">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
