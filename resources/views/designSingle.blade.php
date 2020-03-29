<html>
@extends('layout.head')
@include('layout.nav')
</html>

<body>

<div class="container">
    @if($design != NULL)
        <div class="card-deck">
                <div class="card mb-4" style="min-width: 22rem;">
                        <img class="card-img-top" src="{{$design->image_url}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$design->title}}</h5>
                            <p class="card-text">{{$design->description}}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Uploaded by {{$design->username}}</small>
                        </div>
                </div>
        </div>
    @else
        @include('layout.designFilter')
        <div class="alert alert-danger my-5" role="alert" style="text-align:center;">
            No designs found. :( Maybe try searching again?
        </div>
    @endif
</div>

@include('layout.footer')
</body>
