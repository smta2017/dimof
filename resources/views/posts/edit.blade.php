@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card-header">Edit Post</div>

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
                <form action="/posts/{{$post->id}}" method="post">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" value="{{$post->title}}" id="title">
                            </div>

                            <div class="form-group col-sm-12">

                                <label for="description">Description</label>
                                <textarea type="textarea" class="form-control" name="description" style="height: 350px;" id="description">{{$post->description}}</textarea>

                            </div>

                            <div class="form-group col-sm-12">
                                <label for="contact_phone_number">contact_phone_number</label>
                                <input type="text" class="form-control" name="contact_phone_number" value="{{$post->contact_phone_number}}" id="contact_phone_number">

                            </div>

                            <div class="form-group col-sm-12">
                                <label for="contact_phone_number">user</label>
                                <input type="text" class="form-control" name="contact_phone_number" value="{{$post->contact_phone_number}}" id="contact_phone_number">

                            </div>
                            <div class="form-group col-sm-12">
                                <label for="contact_phone_number">user</label>
                                {!! Form::select('user_id', \App\Models\User::pluck('name', 'id')->toArray(), null, ['class' => 'form-control']) !!}                </div>

                            </div>

                        </div>
                    </div>

                    <div class="card-footer">
                        <input type="submit" value="Save" class="btn btn-primary">
                        <a href="{{ route('posts.index') }}" class="btn btn-default"> Cancel </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>@endsection