@extends('adminPanel.layout.app')
@section('content')
    <div class="card p-3">
        <div class="card-header">
            <h4>İçerik güncelle </h4>
        </div>


        <div class="card-body">

            <form action="{{route('panel.updateContentPost', $postModel->id)}}" method="POST">
                @csrf
                <input type="hidden" value="{{$postModel->id}}" name="postId">

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Kategori Adı:</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                        @foreach($category as $categori)
                            <option value="{{ $categori->id }}">{{ $categori->name }}</option>
                        @endforeach
                    </select>
                </div>

                <label for="">Gönderi Adı: </label>
                <input type="text" class="form-control" value="{{$postModel->title}}" name="contentTitle">


                <label for="">İçerik: </label>
                <input type="text" class="form-control" value="{{$postModel->content}}" name="contents">

                <button type="submit" class="btn btn-md btn-success mt-2">Güncelle</button>
            </form>

        </div>

    </div>

@endsection
