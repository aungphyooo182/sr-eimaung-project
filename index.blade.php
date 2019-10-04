@extends("layouts.app");

@section("content");
    <div class="container">
        <h1>Post List</h1>
        @if(session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif


        @foreach($posts as $post)
            <div class="card bg-light text-dark">
                <div class="card-header">
                    <a href="{{ url("posts/view/$post->id")}}">
                        {{ $post->title }}
                    </a>
                </div>
                <div class="card-body">
                    {{ $post->body }}
                </div>
                <div class="card-footer">
                        <b>Category :</b> {{ $post->category->name }},
                        <b>By</b> {{$post->user->name}},
                        {{ $post->created_at->diffForHumans() }}
                    <div class="float-right">
                        <a href="{{url("posts/view/$post->id")}}">
                        <span class="badge badge-primary">{{ count($post->comments) }}</span>   </a>
                        Comments 
                    </div>
                </div>
                
            </div>
            <br>
        @endforeach
        {{ $posts->links() }}
    </div>
@endsection