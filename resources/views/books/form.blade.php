
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('ISBN', 'ISBN:') !!}
    {!! Form::text('ISBN', null, ['class'=>'form-control']) !!}
</div>


<!-- 
    TODO: Add author(s) fields 
    * The author isn't stored in the Book table, though
    * Will need to add a row, for each Author of the Book, to the Book_Authors table
    * Ensure it works in books.create and books.edit
-->

<div class="form-group">
    {!! Form::label('author', 'Author(s):') !!}
    {!! Form::text('author', null, ['class'=>'form-control', 'placeholder' => 'spearate authors by a comma with no spaces (Mark Fitzjerald,John Green)']) !!}
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