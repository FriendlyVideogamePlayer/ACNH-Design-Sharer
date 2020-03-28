<html>
@extends('layout.head')
@include('layout.nav')
</html>

<body>
@include('layout.designFilter')
<div class="container">
    @if(count($designs) > 0)
    <div class="card-deck">
        @foreach($designs as $design)
            <div class="card mb-4 cardHover" style="min-width: 22rem;">
                <a href="./designs/{{$design->id}}" class="cardLink">
                    <img class="card-img-top" src="https://i.redd.it/yx5s9sib1bp41.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$design->title}}</h5>
                        <p class="card-text">{{$design->description}}</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Uploaded by {{$design->username}}</small>
                    </div>
                </a>
            </div>
    
        @endforeach
    </div>

            {{$designs->links()}}

    @else
        <p> No designs found :( </p>
    @endif

  
</div>



@include('layout.footer')
</body>