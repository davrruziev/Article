@extends('layouts.site')

@section('content')
    <!-- Page Header Start -->

    <!-- Page Header End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-end mb-4">
                <div class="col-lg-6">

                </div>
                <div class="col-lg-6">

                </div>
            </div>
            <div class="row">
                @foreach( $articles as $article)
                <div class="col-lg-4 border px-1 col-md-6 mb-5">
                    <div class="position-relative mb-4">
                        <img class="img-fluid rounded w-100" src="img/blog-1.jpg" alt="">
                        <div class="blog-date">
                            <h4 class="font-weight-bold mb-n1">01</h4>
                            <small class="text-white text-uppercase">Jan</small>
                        </div>
                    </div>
                    <a class="btn btn-sm  py-2" href="{{ route('articles.show', $article->slug)}}">
                    <h5 class="font-weight-medium mb-2">{{ \Str::limit($article->name,10) }}</h5>
                    <p class="mb-4">{{ \Str::limit($article->description, 100) }}</p>
                    </a>
                    <div class="d-flex justify-content-between mb-2">
                        <a class="text-secondary text-uppercase font-weight-medium" href="{{ route('articles.addFavourite', $article->id) }}"><i @if($article->findFavourite($article)) style="color: red" @endif class="fa fa-heart"></i></a>
                        <span class="text-primary px-2">|</span>
                        <h5 class="text-secondary text-uppercase font-weight-medium" href=""><i class="fa fa-eye">{{$article->views}}</i></h5>
                    </div>
                </div>
                @endforeach
                <div class="col-12">
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-lg justify-content-center mb-0">
                           {{$articles->links()}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection
