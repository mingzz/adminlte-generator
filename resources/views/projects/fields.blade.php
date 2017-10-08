<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Website Field -->
<div class="form-group col-sm-6">
    {!! Form::label('website', 'Website:') !!}
    {!! Form::text('website', null, ['class' => 'form-control']) !!}
</div>

<!-- People Field -->
<div class="form-group col-sm-6">
    {!! Form::label('people', 'People:') !!}
    {!! Form::text('people', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status',array('C' => 'Current', 'P' => 'Past'), 'C', ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    <label>Image: </label>
    {!! Form::file('image', ['class' => 'form-control']) !!}
</div>

<!-- Detail Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('detail', 'Detail:') !!}
    {!! Form::textarea('detail', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('projects.index') !!}" class="btn btn-default">Cancel</a>
</div>
