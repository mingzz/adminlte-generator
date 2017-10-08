<li class="{{ Request::is('projects*') ? 'active' : '' }}">
    <a href="{!! route('projects.index') !!}"><i class="fa fa-edit"></i><span>projects</span></a>
</li>

<li class="{{ Request::is('publications*') ? 'active' : '' }}">
    <a href="{!! route('publications.index') !!}"><i class="fa fa-edit"></i><span>publications</span></a>
</li>

