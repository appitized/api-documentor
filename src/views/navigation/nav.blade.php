<div class="nav">
    <div class="nav__container">
        <h1>{{ $project }}<span> api</span></h1>
        @foreach($documents as $key => $value)
            <div class="resource-group">
                <div class="heading">
                    <h2><a href="#{{ snake_case($key) }}">{{ $key }}</a></h2>
                </div>
                <div>
                    <ul>
                        @foreach($value['resources'] as $key => $resource)
                            <li><a href="#{{ snake_case($key) }}"><span class="badge post"><i
                                                class="fa fa-plus"></i></span>{{ $resource['alias'] or $key }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
</div>
