@extends('layouts.site')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
    <!-- Detail Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <h1 class="section-title mb-3">{{ $article->name ?? null }}</h1>
                        <div class="d-flex mb-2">
                            <a class="text-secondary text-uppercase font-weight-medium" href="{{ route('articles.addFavourite', $article->id) }}"><i @if($article->findFavourite($article)) style="color: red" @endif class="fa fa-heart"></i></a>
                            <span class="text-primary px-2">|</span>
                            <a class="text-secondary text-uppercase font-weight-medium" href=""><i class="fa fa-eye">{{ $article->views }}</i></a>
                        </div>
                        <div class="d-flex mb-2">
                            @forelse($article->tags as $tag)
                                <a href="{{ route('tag.index', $tag->slug) }}" class="btn btn-outline-secondary m-1">{{ $tag->name }}</a>
                            @empty

                            @endforelse
                        </div>

                    </div>

                    <div class="mb-5">
                        <p>{{ $article->description }}</p>
                    </div>

                    <div class="mb-5">
                        <h3 class="mb-4 section-title">{{ isset($article->comments) ? $article->comments->count() : 0 }} Comments</h3>
                        @forelse($article->comments as $comment)
                            <div class="media mb-4">
                                <div class="media-body">
                                    <h6>{{ $comment->user->name }} <small><i>{{ $comment->created_at->format('Y-m-d H:i:s') }}</i></small></h6>
                                    <p>{{ $comment->content }}</p>
                                </div>
                            </div>
                        @empty
                            <p>No comment</p>
                        @endforelse
                    </div>
                    @if(\Illuminate\Support\Facades\Auth::user())
                    <div class="bg-light rounded p-5">
                        <h3 class="mb-4 section-title">Leave a comment</h3>
                        <form action="{{ route('comment.create') }}" method="POST">
                            @csrf
                            <input type="hidden" name="article_id" value="{{ $article->id }}">
                            <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" name="title" class="form-control" id="name">
                                <p style="color: red">{{ $errors->first('title') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea id="message" cols="30" rows="5" name="content" class="form-control"></textarea>
                                <p style="color: red">{{ $errors->first('content') }}</p>
                            </div>
                            <div class="form-group mb-0">
                                <input type="submit" value="Send Comment" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->
@endsection
