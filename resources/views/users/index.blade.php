@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Users <a class="btn btn-primary float-right"
                       href="{{ route('users.create') }}">
                        Add New
                    </a></div>

                <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                    @include('users.table')
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
