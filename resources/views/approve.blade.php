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
                <a href="/designs/{{$design->id}}" class="cardLink cardHover">
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
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('upload.designs') }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $design->id }}">
                                <button type="submit" class="btn btn-primary">Approve!</button>
                            </form>
                        </div>
                        <div class="col">
                            <form action="{{ route('disapprove.designs') }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $design->id }}">
                                <button type="submit" class="btn btn-danger">Disapprove!</button>
                            </form>
                        </div>
                    </div>
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
