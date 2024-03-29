@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card-header">Edit User</div>

            <div class="card">
            @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        {!! Form::open(['route' => 'users.store']) !!}

        <div class="card-body">

            <div class="row">
                <div class="form-group col-sm-6">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
                </div>

                <div class="form-group col-sm-6">
                    {!! Form::label('username', 'Username:') !!}
                    {!! Form::text('username', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
                </div>

                <div class="form-group col-sm-6">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::email('email', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
                </div>

                <div class="form-group col-sm-6">
                    {!! Form::label('mobile', 'Mobile:') !!}
                    {!! Form::text('mobile', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
                </div>

                <div class="form-group col-sm-6">
                    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
                    {!! Form::text('email_verified_at', null, ['class' => 'form-control','id'=>'email_verified_at']) !!}
                </div>

                @push('page_scripts')
                <script type="text/javascript">
                    $('#email_verified_at').datepicker()
                </script>
                @endpush

                <div class="form-group col-sm-6">
                    {!! Form::label('mobile_verified_at', 'Mobile Verified At:') !!}
                    {!! Form::text('mobile_verified_at', null, ['class' => 'form-control','id'=>'mobile_verified_at']) !!}
                </div>

                @push('page_scripts')
                <script type="text/javascript">
                    $('#mobile_verified_at').datepicker()
                </script>
                @endpush

                <div class="form-group col-sm-6">
                    {!! Form::label('password', 'Password:') !!}
                    {!! Form::password('password', ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
                </div>

                <div class="form-group col-sm-6">
                    {!! Form::label('remember_token', 'Remember Token:') !!}
                    {!! Form::text('remember_token', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
                </div>
            </div>

        </div>

        <div class="card-footer">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('users.index') }}" class="btn btn-default"> Cancel </a>
        </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection