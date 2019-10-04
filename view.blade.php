@extends("layouts.app");

@section("content");
<div class="container">

    @if(session('info'))
        <div class="alert alert-info">
            {{session('info')}}
        </div>
    @endif

    <div class="card bg-light text-dark">
        <div class="card-header">
            
                {{ $post->title }}
            
        </div>
        <div class="card-body">
            {{ $post->body }}
        </div>
        <div class="card-footer">
            <b>Category :</b> {{ $post->category->name }},
            <b>By</b> {{$post->user->name}},
            {{ $post->created_at->diffForHumans() }}
            <div class="float-right">
                <a href="{{ url("/posts/edit/$post->id") }}">
                    <i class="fas fa-edit"></i>Edit
                </a>   
                <a class="text-danger" href="{{ url("/posts/delete/$post->id") }}">
                    <i class="fas fa-trash"></i>
                </a>
            </div>
        </div>
    </div>
    <hr>
    <h2>Comments  ({{ count ($post->comments) }}) </h2>
        <ul class="list-group">
            @foreach ($post->comments as $comment)
                <li class="list-group-item">
                <a class="float-right" href="{{url("/comments/delete/$comment->id")}}">
                        <i class="fas fa-times-circle"></i>
                    </a>
                    {{ $comment->comment }}
                    <small class="text-muted muted">
                            commented by {{$comment->user->name}}
                    </small>
                </li> 
                <br>
            @endforeach
        </ul>  
    <form action="{{ url('/comments/add')}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <textarea name="comment" class="form-control"></textarea> <br>
        <input type="submit" value="Add Comment" class="btn btn-secondary">
    </form>
    <br><br><br>
</div>
@endsection