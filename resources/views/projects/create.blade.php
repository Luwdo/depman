@extends('layouts.app')

@section('content')
    <div class="content container">
        <h5>Create Project</h5>
        <hr />
        <form method="POST" action="{{ route('post_create_project') }}">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Deployer Directory') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('deployer_directory') ? ' is-invalid' : '' }}" name="deployer_directory" value="{{ old('deployer_directory') }}" required autofocus>

                    @if ($errors->has('deployer_directory'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('deployer_directory') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Deployer User') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('deployer_user') ? ' is-invalid' : '' }}" name="deployer_user" value="{{ old('deployer_user') }}" autofocus>

                    @if ($errors->has('deployer_user'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('deployer_user') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Save') }}
                    </button>
                </div>
            </div>
        </form>

    </div>
@endsection
