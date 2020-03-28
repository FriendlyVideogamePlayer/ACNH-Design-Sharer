<div class="filter-form form">
{!! Form::open(['action' => 'DesignsController@update', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Seach for a design')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Enter search term'])}}
        </div>
    {!! Form::close() !!}
</div>