<html>
@extends('layout.head')
@include('layout.nav')
</html>

<body>

<div class="container">
    @include('layout.designFilter')

    @isset($searchMessage)
        <div class="alert alert-info" role="alert" style="text-align:center;">
            {{$searchMessage}}
        </div>
    @endisset

    @if(count($designs) > 0)
    <div class="card-deck">
        @foreach($designs as $design)
            <a href="/designs/{{$design->id}}" class="card mb-4 cardHover cardLink" style="min-width: 20rem;">
                <img class="card-img-top" src="{{$design->imagelink}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$design->title}}</h5>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Uploaded by {{$design->username}}</small> <br>
                    <small class="text-muted">Design type: {{$design->designtype}}</small> <br>
                    <small class="text-muted">Tags: {{$design->tag1 ?? ""}} {{$design->tag2 ?? ""}} {{$design->tag3 ?? ""}}</small>
                </div>
            </a>
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
