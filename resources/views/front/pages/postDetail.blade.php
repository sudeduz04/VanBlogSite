@extends('front.layout.app')

@section('content')
    <style>
        .btn {
            letter-spacing: 0.5px;
            border-radius: 20px;
            font-weight: 500;
        }
        .btn-info {
            background-color: #17a2b8;
            border: none;
            transition: background-color 0.3s;
        }
        .btn-info:hover {
            background-color: #138496;
        }
        .btn-danger {
            border-radius: 20px;
            background-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .card {
            border: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 15px;
            padding: 20px;
        }
        .comment-box {
            background-color: #f1f1f1;
            border-radius: 8px;
            padding: 10px;
        }
        .comment-box p {
            margin-bottom: 10px;
            font-size: 16px;
        }
        .comment-box small {
            color: #6c757d;
        }
        .comment-box a {
            text-decoration: none;
        }
        .comment-box .btn-danger {
            margin-top: 5px;
            font-size: 12px;
        }
        textarea {
            border-radius: 8px;
            resize: none;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h2 {
            font-size: 28px;
            font-weight: 600;
            color: #343a40;
        }
        h3 {
            font-size: 22px;
            font-weight: 600;
            color: #343a40;
        }
        hr {
            border-color: #e0e0e0;
        }
        img {
            border-radius: 8px;
            margin-top: 15px;
        }
    </style>

    <div class="container">
        <br>
        <h2>{{ $post->title }}</h2>

        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" width="50%">
        @endif

        <p>{{ $post->content }}</p>

        <!-- Beğeni Butonu -->
        <form action="{{ route('front.postLike', $post->id) }}" method="POST" style="display: inline-block;">
            @csrf
            <button type="submit" class="btn btn-sm btn-info">
                @if($post->likes->where('user_id', Auth::id())->count() > 0)
                    Beğenme
                @else
                    Beğen
                @endif
            </button>
        </form>

        <br><br>
        <hr>

        <!-- Yorum Formu -->
        <h3>Yorum Yap</h3>
        <form action="{{ route('front.postComment', $post->id) }}" method="POST">
            @csrf
            <textarea name="content" class="form-control" rows="4" required placeholder="Yorumunuzu buraya yazın..."></textarea>
            <br>
            <button type="submit" class="btn btn-sm btn-info">Yorum yap</button>
        </form>

        <hr>

        <!-- Yorumlar Listesi -->
        @if($post->comments)
            <h3>Yorumlar</h3>
            @foreach($post->comments as $comment)
                <div class="comment-box card mb-3 p-1">
                    <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}</p>
                    <small>{{ $comment->created_at->diffForHumans() }}</small>

                    @guest
                    @else
                        @if(Auth::user()->id == $comment->user->id || Auth::user()->role_id == 1)
                            <a href="{{ route('front.deleteComment', $comment->id) }}" class="btn btn-danger btn-sm">Sil</a>
                        @endif
                    @endguest
                </div>
            @endforeach
        @endif
    </div>
@endsection
