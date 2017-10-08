<table class="table table-responsive" id="publications-table">
    <thead>
        <th>Title</th>
        <th>Author</th>
        <th>Publication</th>
        <th>Source Code</th>
        <th>Article Url</th>
        <th>Project Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($publications as $publication)
        <tr>
            <td>{!! $publication->title !!}</td>
            <td>{!! $publication->author !!}</td>
            <td>{!! $publication->publication !!}</td>
            <td>{!! $publication->source_code !!}</td>
            <td>{!! $publication->article_url !!}</td>
            <td>{!! $publication->project_id !!}</td>
            <td>
                {!! Form::open(['route' => ['publications.destroy', $publication->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('publications.show', [$publication->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('publications.edit', [$publication->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>