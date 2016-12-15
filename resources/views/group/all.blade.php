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
                                <p>Role</p>
                            </th>
                            <th>
                                <p>Description</p>
                            </th>
                         <th></th>
                        @foreach ($groups as $group)
                        <tr>
                            <td>
                                <p>
                                    {{ $group->id }}
                                </p>
                            </td>
                            <td>
                                <p>
                                    {{ $group->name }}
                                </p>
                            </td>
                            <td>
                                <p>{{ $group->role }}</p>
                            </td>
                            <td>
                                <p>{{ $group->description }}</p>
                            </td>

                            <td>
                                <form classs="" action="{{ route('group.delete', $group->id) }}" method="post" >
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger col-xs-12" type="submit" >
                                        Delete
                                    </button>
                                </form>
                                <a class="btn btn-success col-xs-12" href="{{ route('group.edit', $group->id) }}"> Update</a>
                                <a class="btn btn-warning col-xs-12" href="{{ route('group.users', $group->id) }}">Show Users</a>
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
