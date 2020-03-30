<html>
@extends('layout.head')
@include('layout.nav')
</html>

<body>

<div class="container">
    @isset($successMessage)
        <div class="alert alert-success" role="alert" style="text-align:center;">
            {{$successMessage}}
        </div>
    @endisset

    @if(count($designs) > 0)
    <div class="card-deck">
        @foreach($designs as $design)
            <div class="card mb-4" style="min-width: 20rem;">
                <a href="http://161.35.38.150/designs/{{$design->id}}" class="cardLink cardHover">
                    <img class="card-img-top" src="{{$design->imagelink}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$design->title}}</h5>
                        <p class="card-text">{{$design->description}}</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Uploaded by {{$design->username}}</small> <br>
                        <small class="text-muted">Design type: {{$design->designtype}}</small>
                    </div>
                </a>
                <div class="card-body">
                    <form action="{{ route('approve.designs') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $design->id }}">
                        <input type="hidden" name="title" value="{{ $design->title }}">
                        <input type="hidden" name="description" value="{{ $design->description }}">
                        <input type="hidden" name="username" value="{{ $design->username }}">
                        <input type="hidden" name="designType" value="{{ $design->designtype }}">
                        <input type="hidden" name="imageLink" value="{{ $design->imagelink }}">
                        <button type="submit" class="btn btn-primary">Approve!</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
            {{$designs->links()}}
    @else
        <div class="alert alert-danger " role="alert" style="text-align:center;">
            No designs found. :( Maybe try searching again?
        </div>
    @endif
  
</div>

@include('layout.footer')
</body>