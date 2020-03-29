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
        {!! Form::open(['action' => 'DesignsController@store', 'method' => 'POST']) !!}
                <div class="row"> 
                    <div class="col-xs-12 col-md-12 pt-3">
                        {{Form::label('username', 'Name')}}
                        {{Form::text('username', '', ['class' => 'form-control', 'placeholder' => 'The name you want displayed on your submission'])}}
                    </div>
                    <div class="col-xs-12 col-md-12  pt-3">
                        {{Form::label('title', 'Title')}}
                        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'The title you want displayed on your submission'])}}
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-xs-12 col-md-12  pt-3">
                        {{Form::label('description', 'Description')}}
                        {{Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'The description you want displayed under your submission'])}}
                    </div>
                    <div class="col-xs-12 col-md-12  pt-3">
                        {{Form::label('imageLink', 'Image link')}}
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