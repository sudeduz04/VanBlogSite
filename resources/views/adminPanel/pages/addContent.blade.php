@extends('adminPanel.layout.app')
@section('content')
    <h5>İçerik Ekle</h5>
    <form action="{{route('panel.addContentPost')}}" method="POST">
        @csrf

        <div class="form-group">
            <label for="exampleFormControlSelect1">Kategori Seç</label>
            <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Başlık</label>
            <input type="text" class="form-control" name="title" placeholder="Başlık">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">İçerik</label>
            <textarea class="form-control" name="contents"  rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success mt-2">Kaydet</button>
    </form>
@endsection

