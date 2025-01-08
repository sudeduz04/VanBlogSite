@extends('front.layout.app')
@section('content')
<link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
<div class="container">
    <h1>{{$post->title}}</h1>
    <p>{{$post->content}}</p>

    <!-- Beğeni Butonu -->
    <form action="{{ route('front.postLike', $post->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn {{ $post->likes->where('user_id', Auth::id())->count() > 0 ? 'btn-primary' : 'btn-outline-primary' }}">
            Beğen
        </button>
    </form>

    <hr>

    <!-- Yorum Formu -->
    <h3>Yorum Yap</h3>
    <form action="{{ route('front.postComment', $post->id) }}" method="POST">
        @csrf
        <label for="comment"></label>
        <textarea name="content" class="form-control" rows="4"required></textarea>
        <br>
        <button type="submit" class="btn btn-info">Yorum yap</button>
    </form>


    <hr>
    <!-- Yorumlar Listesi -->
    @if($post->comments)

    <h3>Yorumlar</h3>
    @foreach($post->comments as $comment)
        <div class="comment-box card mb-3 p-1">
            <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}</p>
            <small>{{ $comment->created_at->diffForHumans() }}</small>
            @if(Auth::user()->id == $comment->user->id || Auth::user()->role_id == 1)
                <a href="{{route('front.deleteComment', $comment->id)}}" class="btn btn-danger btn-sm">Sil</a>

            @endif
        </div>
    @endforeach
    @endif
</div>
@endsection
