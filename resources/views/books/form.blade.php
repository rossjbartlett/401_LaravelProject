
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('ISBN', 'ISBN:') !!}
    {!! Form::text('ISBN', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('publisher', 'Publisher:') !!}
    {!! Form::text('publisher', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('publication_year', 'Publication Year:') !!}
    {!! Form::text('publication_year', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::text('image', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
</div> 