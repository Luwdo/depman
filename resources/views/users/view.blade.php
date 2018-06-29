@extends('layouts.app')
@section('content')
    <div class="content container">
        <h5>Users</h5>
        <hr />

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr data-href="{{ route('edit_user', ['id' => $user->id]) }}">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script type="application/javascript">

    </script>

@endsection