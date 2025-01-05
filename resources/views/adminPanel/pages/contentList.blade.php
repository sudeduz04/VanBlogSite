@extends('adminPanel.layout.app')
@section('content')
    <div class="card p-3">
        <div class="card-header">
            <h4>İçerikler</h4>
            <a href="{{route('panel.addContent')}}" class="btn btn-md btn-success">Yeni içerik oluştur</a>
        </div>

        <div class="card-body">
            <div class="card">
                <h5 class="card-header">İçerikler</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Kategori Adı</th>
                            <th>İçerik Adı</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>Güncellenme Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach($posts as $post)
                            <tr>

                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$post->category->name}}</strong></td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$post->title}}</strong></td>
                                <td>{{$post->created_at}}</td>
                                <td>{{$post->updated_at}}</td>
                                <td>
                                    <a href="{{route('panel.updateContent', $post->id)}}" class="btn btn-sm btn-info">Güncelle</a>
                                    <a href="{{route('panel.deleteContent', $post->id)}}" class ="btn btn-sm btn-danger">Sil</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
