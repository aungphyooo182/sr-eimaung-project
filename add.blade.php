@extends('layouts.app');

@section('content')
    <div class="container">

        @if($errors->any())
            <div class="alert alert-warning">
                @foreach ($errors->all() as $error)
                    {{ $error . " "}}
                @endforeach
            </div>
        @endif
        
        <h1>New Post</h1>
        <form action="{{ url("/posts/add") }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label>Body</label>
                <textarea name="body" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                <option value="{{ $category->id}}">
                    {{ $category->name }}
                </option>
                    @endforeach
                </select>
            </div>
            <input type="submit" class="btn btn-primary">
        </form>
    </div>
@endsection