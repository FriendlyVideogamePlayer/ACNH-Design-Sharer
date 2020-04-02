<html>
@extends('layout.head')
@include('layout.nav')
</html>

<body>
<div class="form">
    <div class="container">
        @isset($errorMessage)
            <div class="alert alert-danger mt-4" role="alert" style="text-align:center;">
                {{$errorMessage}}
            </div>
        @endisset
        @isset($successMessage)
            <div class="alert alert-success mt-4" role="alert" style="text-align:center;">
                {{$successMessage}}
            </div>
        @endisset

        @include('layout.warnings')
        <div class="alert alert-warning mt-4" role="alert" style="text-align:center;">
            Images MUST be uploaded to <a href="https://imgur.com/" target="_blank">Imgur</a> and you must copy the i.imgur link. <a href="/uploadhelp">Need help uploading an image?</a>
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
                        {{Form::label('tag1', 'OPTIONAL: Tags (max 20 characters per tag)')}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-md-4  pt-3">
                        {{Form::text('tag1', '', ['class' => 'form-control', 'placeholder' => 'Tag 1 e.g Cute'])}}
                    </div>
                    <div class="col-xs-4 col-md-4  pt-3">
                        {{Form::text('tag2', '', ['class' => 'form-control', 'placeholder' => 'Tag 2 e.g Purple'])}}
                    </div>
                    <div class="col-xs-4 col-md-4  pt-3">
                        {{Form::text('tag3', '', ['class' => 'form-control', 'placeholder' => 'Tag 3 e.g Animal Crossing'])}}
                    </div>
                    <div class="col-xs-12 col-md-12  pt-3">
                        {{Form::label('imageLink', 'Image link (This MUST be an i.imgur link)')}}
                        {{Form::text('imageLink', '', ['class' => 'form-control', 'placeholder' => 'A link to the image of your design'])}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12  pt-3">
                    {{Form::label('designType', 'Type of Design')}}
                    {!! Form::select('designType',['Brimmed Hat' => 'Brimmed Hat','Brimmed Cap'=>'Brimmed Cap',
                    'Knit Cap'=>'Knit Cap','Top'=>'Top','Long Sleeve Dress Shirt'=>'Long Sleeve Dress Shirt','Short Sleeve T-shirt'=>'Short Sleeve T-shirt',
                    'Coat'=>'Coat','Hoodie'=>'Hoodie','Sweater'=>'Sweater','Robe'=>'Robe','Round Dress'=>'Round Dress','Balloon Hem Dress'=>'Balloon Hem Dress',
                    'Long Sleeve Dress'=>'Long Sleeve Dress','Short Sleeve Dress'=>'Short Sleeve Dress','Sleeveless Dress'=>'Sleeveless Dress',
                    'Standard Design'=>'Standard Design','Nook Phone Case'=>'Nook Phone Case'],'',['class'=>'form-control','placeholder'=>'Select type']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12  pt-3">
                        {{Form::submit('Submit Design!', ['class' => 'btn btn-primary'])}}
                    </div>
                </div>
        {!! Form::close() !!}
    </div>
</div>

@include('layout.footer')
</body>
