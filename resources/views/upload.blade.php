<html>
@extends('layout.head')
@include('layout.nav')
</html>

<body>
<div class="form">
    <div class="container">
        @isset($errorMessage)
            <div class="alert alert-danger" role="alert" style="text-align:center;">
                {{$errorMessage}}
            </div>
        @endisset
        @isset($successMessage)
            <div class="alert alert-success" role="alert" style="text-align:center;">
                {{$successMessage}}
            </div>
        @endisset

        @include('layout.warnings')
        <div class="alert alert-warning" role="alert" style="text-align:center;">
            <p>Images MUST be uploaded to imgur and you must copy the i.imgur link. <a href="/uploadhelp">Need help uploading an image?</a> </p>
        </div>
        {!! Form::open(['action' => 'DesignsController@store', 'method' => 'POST']) !!}
                <div class="row"> 
                    <div class="col-xs-12 col-md-12 pt-1">
                        {{Form::label('username', 'Name (max 50 characters)')}}
                        {{Form::text('username', '', ['class' => 'form-control', 'placeholder' => 'The name you want displayed on your submission'])}}
                    </div>
                    <div class="col-xs-12 col-md-12  pt-3">
                        {{Form::label('title', 'Title (max 50 characters)')}}
                        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'The title you want displayed on your submission'])}}
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-xs-12 col-md-12  pt-3">
                        {{Form::label('description', 'Description (max 150 characters)')}}
                        {{Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'The description you want displayed under your submission'])}}
                    </div>
                    <div class="col-xs-12 col-md-12  pt-3">
                        {{Form::label('imageLink', 'Image link (This MUST be an i.imgur link)')}}
                        {{Form::text('imageLink', '', ['class' => 'form-control', 'placeholder' => 'A link to the image of your design'])}}
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-xs-12 col-md-12  pt-3">
                    {{Form::label('designType', 'Type of Design')}}    
                    {!! Form::select('designType',['Top' => 'Top (Custom Design Pro editor needed)','Dress'=>'Dress (Custom Design Pro editor needed)','Headwear'=>'Headwear (Custom Design Pro editor needed)','Standard Design'=>'Standard Design','Room Design'=>'Room Design'],'Top',['class'=>'form-control','placeholder'=>'Select type']) !!}
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-xs-12 col-md-12  pt-3">
                        {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
                    </div>
                </div>
        {!! Form::close() !!}
    </div>
</div>


@include('layout.footer')
</body>