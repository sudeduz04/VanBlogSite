@extends('front.layout.app')
@section('content')
    <div class="ftco-blocks-cover-1">
        <div class="site-section-cover overlay">
            <video autoplay loop muted playsinline class="background-video">
                <source src="{{ asset('front/van.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>


    <div class="site-section py-5">
        <div class="container">
            <div class="heading-50000 mb-3">
                <span class="subtitle-39191">Van'ın Tarihçesi</span>
            </div>
            <p>Van, verimli toprakları ve stratejik konumu nedeniyle tarih boyunca birçok medeniyetin hüküm sürdüğü bir yerleşim merkezidir. İlk olarak Hurriler, ardından Urartular M.Ö. 900’de Tuşba’yı (Van) başkent yaparak bölgeye hâkim oldular. Urartu Krallığı, Medler tarafından sona erdirildi. Daha sonra Persler, Makedonyalılar, Partlar, Romalılar ve Sasaniler bölgeyi kontrol etti. 644 yılında Müslüman orduları Van’ı ele geçirerek bölgeyi Emevi ve Abbasi egemenliğine aldı. 1071 Malazgirt Zaferi’nden sonra Van, Büyük Selçukluların kontrolüne geçti. Bölge, Karakoyunlular ve Akkoyunlular arasında el değiştirdi. Osmanlılar, Kanuni Sultan Süleyman döneminde Van’ı Safevilerden alarak kesin hâkimiyet kurdu. XIX. yüzyılda Ermeniler, Rusların desteğiyle isyanlar çıkardı. 1915’te Ruslar Van’ı işgal etti ve şehir yakıldı. Türk ordusu 1918’de Van’ı kurtardı. Cumhuriyet döneminde Van yeniden inşa edilerek 1923’te vilayet merkezi oldu.</p>
        </div>
        <!--<div class="col-md-6" data-aos="fade-right"></div>-->
    </div>
    </div>
    </div>
    <div class="container mt-5">
        @foreach($categoryModel as $category)
            <div id="{{ strtolower($category->name) }}" class="category-section mb-5">
                <h2>{{ $category->name }}</h2>
                @if($category->posts->count() > 0)
                    <ul class="list-group">
                        @foreach($category->posts as $post)
                            <li class="list-group-item">{{ $post->title }}</li>
                            <a href="{{route('front.postDetail', $post->id)}}">Detay</a>
                        @endforeach
                    </ul>
                @else
                    <p>No posts available in this category.</p>
                @endif
            </div>
        @endforeach
    </div>


@endsection
