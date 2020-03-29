<html>
@extends('layout.head')
@include('layout.nav')
</html>

<body>

<div class="container">

    @if(count($designs) > 0)
    <div class="card-deck">
        @foreach($designs as $design)
            <div class="card mb-4" style="min-width: 20rem;">
                <a href="/designs/{{$design->id}}" class="cardLink cardHover">
                    <img class="card-img-top" src="https://i.redd.it/yx5s9sib1bp41.jpg" alt="Card image cap">
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
                    <button type="submit" class="btn btn-primary">Approve!</button>
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
