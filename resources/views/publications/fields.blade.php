<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Author Field -->
<div class="form-group col-sm-6">
    {!! Form::label('author', 'Author:') !!}
    {!! Form::text('author', null, ['class' => 'form-control']) !!}
</div>

<!-- Publication Field -->
<div class="form-group col-sm-6">
    {!! Form::label('publication', 'Publication:') !!}
    {!! Form::text('publication', null, ['class' => 'form-control']) !!}
</div>

<!-- Source Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('source_code', 'Source Code:') !!}
    {!! Form::text('source_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Article Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('article_url', 'Article Url:') !!}
    {!! Form::text('article_url', null, ['class' => 'form-control']) !!}
</div>

<!-- Project ID Field -->
<div class="form-group col-sm-6">
    {!! Form::label('project_id', 'Project ID:') !!}
    {!! Form::text('project_id', request('id', $default = null), ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('publications.index') !!}" class="btn btn-default">Cancel</a>
</div>
