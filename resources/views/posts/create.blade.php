@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                    Create Posts
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">


        <div class="card">

            {!! Form::open(['route' => 'posts.store']) !!}

            <div class="card-body">

                <div class="row">
                <div class="form-group col-sm-12">
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
                </div>

                <div class="form-group col-sm-12">
                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group col-sm-12">
                    {!! Form::label('contact_phone_number', 'Contact Phone Number:') !!}
                    {!! Form::text('contact_phone_number', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-sm-12">
                    {!! Form::label('user_id', 'User:') !!}
                    {!! Form::select('user_id', \App\Models\User::pluck('name', 'id')->toArray(), null, ['class' => 'form-control']) !!}                </div>
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('posts.index') }}" class="btn btn-default"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
