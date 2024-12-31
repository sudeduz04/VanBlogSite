@extends('adminPanel.layout.app')
@section('content')
    <div class="card p-3">
        <div class="card-header">
            <h4>İçeerikler</h4>
            <a href="{{route('panel.addContent')}}" class="btn btn-md btn-success">Yeni içerik oluştur</a>
        </div>

        <div class="card-body">
            <div class="card">
                <h5 class="card-header">İçerikler</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>İçerik Adı</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach($posts as $post)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$post->title}}</strong></td>
                                <td>{{$post->created_at}}</td>
                                <td>
                                    <button class="btn btn-sm btn-info">Güncelle</button>
                                    <button class ="btn btn-sm btn-danger">Sil</button>
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
