@extends('adminPanel.layout.app')
@section('content')
    <h5>Kategori Ekle</h5>
    <form action="{{ route('panel.addCategoryPost') }}" method="POST">
        @csrf
        <div class="form-group mb-4">
            <label for="exampleInputEmail1">Kategori Adı</label>
            <input type="text" class="form-control" name="category" placeholder="Kategori Adı">
        </div>

        <button type="submit" class="btn btn-success">Kaydet</button>
    </form>
@endsection
