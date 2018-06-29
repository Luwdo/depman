@extends('layouts.app')
@section('content')
    <div class="content container">
        <h5>Projects</h5>
        <hr />

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Deployer Directory</th>
                <th scope="col">Deployer User</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($projects as $project)
                <tr data-href="{{ route('get_edit_project', ['id' => $project->id]) }}">
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->deployer_directory }}</td>
                    <td>{{ $project->deployer_user }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection