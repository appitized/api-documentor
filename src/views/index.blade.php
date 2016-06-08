@extends('documentor::layout')
@inject('resource', 'Appitized\Documentor\ApiResource')

@section('content')
    @include('documentor::navigation.nav')

    <div class="container">
        <div class="background">
            <div class="background__example"></div>
        </div>
        <div class="resource-group resource">
            <div class="resource__area">
                <div class="resource__area__copy">
                    <div class="resource__area__padding">
                        @if(config('documentor.settings.logo_url'))
                            <img src="/logo.png" />
                        @endif
                        <h2 class="group-heading">API Reference</h2>
                        <p>Welcome to the {{ $project }} API. This API provides access to the {{ $project }} web
                            service.</p>
                    </div>
                </div>
                <div class="resource__area__example">
                    <div class="resource__area__padding">
                        <div class="endpoint">
                            <h4>API Endpoint</h4>
                            <pre><code><p class="endpoint__url">{{ url($prefix) }}</p></code></pre>
                        </div>
                    </div>

                </div>
            </div>
            @foreach($documents as $key => $value)
                <div id="{{ snake_case($key) }}" class="resource-group resource">
                    <div class="resource__area">
                        <div class="resource__area__copy">
                            <div class="resource__area__padding">
                                <h2 class="group-heading">{{ $key }} <a href="#{{ snake_case($key) }}"
                                                                        class="permalink"></a></h2>

                                <p>{!! nl2br($value['description']) !!}</p>
                            </div>
                        </div>
                        <div class="resource__area__example"></div>
                    </div>
                    @foreach($value['resources'] as $endpoint => $resource)
                        @include('documentor::resource', $resource->createResource($endpoint, $resource))
                    @endforeach
                </div>
            @endforeach
        </div>
@stop
