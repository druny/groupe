@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Users</div>

                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>
                                <p>ID</p>
                            </th>
                            <th>
                                <p>Name</p>
                            </th>
                            <th>
                                <p>Second Name</p>
                            </th>
                            <th>
                                <p>E-mail</p>
                            </th>
                            <th>
                                <p>Phone</p>
                            </th>
                            <th>
                                <p>Cellphone</p>
                            </th>
                            <th>
                                <p></p>
                            </th>
                        </tr>
                        @foreach ($users as $user)
                        <tr>
                            <td>
                                <p>
                                    {{ $user->id }}
                                </p>
                            </td>
                            <td>
                                <p>
                                    {{ $user->name }}
                                </p>
                            </td>
                            <td>
                                <p>{{ $user->second_name }}</p>
                            </td>
                            <td>
                                <p>{{ $user->email }}</p>
                            </td>
                            <td>
                                <p>{{ $user->phone }}</p>
                            </td>
                            <td>
                                <p>{{ $user->cellphone }}</p>
                            </td>
                            <td>
                                <form classs="col-xs-12" action="{{ route('user.delete', $user->id) }}" method="post" >
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger" type="submit">
                                        Delete
                                    </button>
                                </form>
                                <a class="btn btn-success col-xs-12" href=""> Update</a>
                            </td>

                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
