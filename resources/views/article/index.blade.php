@extends('layouts.site')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')

    <!-- Detail Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="mb-5">
                        <h3 class="mb-4 section-title">Tag Cloud</h3>
                        <div class="d-flex flex-wrap m-n1">
                            @forelse($tags as $tag)
                                <a href="{{ route('tag.index', $tag->slug) }}" class="btn btn-outline-secondary m-1">{{ $tag->name }}</a>
                            @empty

                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    @foreach( $articles as $article)
                        <div class="mb-5  border">
                            <img class="img-fluid rounded w-100 mb-4" src="/img/carousel-1.jpg" alt="Image">
                            <div class="p-4">
                                <a class="text-decoration-none text-dark" href="{{ route('articles.show', $article->slug)}}">
                                    <h3 >{{$article->name}}</h3>
                                    <p>{{$article->description}}</p>
                                </a>
                                <div class="d-flex justify-content-between mb-2">
                                    <h5 class="text-secondary text-uppercase font-weight-medium"><i class="fa fa-eye">{{ '  '.$article->views }}</i></h5>
                                    <span class="text-primary px-2">|</span>
                                    <a class="text-secondary text-uppercase font-weight-medium" href="{{ route('articles.addFavourite', $article->id) }}"><i @if($article->findFavourite($article)) style="color: red" @endif class="fa fa-heart"></i></a>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
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
    <!-- Detail End -->
@endsection
