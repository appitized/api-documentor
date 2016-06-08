<section class="resource" id="{{ $href }}">
    <div class="resource__area">
        <div class="resource__area__copy">
            <div class="resource__area__padding">
                <h3>
                    <span class="method method--{{strtolower($resource['method'])}}">{{ strtoupper($resource['method']) }}</span>{{ $endpoint }}
                </h3>

                <p>{!! nl2br($resource['description']) !!}</p>
                @if( isset($resource['requests']) )
                    <div class="request">
                        <h4>Arguments</h4>
                        <table>
                            <tbody>
                            @foreach($resource['requests'] as $request => $parameters)
                                <tr>
                                    <td>
                                        <p>{{ $request }} @if(isset($parameters['required'])) <span class="required">*REQUIRED</span> @endif
                                        </p>

                                        <p>{{ $parameters['type'] }}</p>
                                    </td>
                                    <td><p>{{ $parameters['description'] }}</p></td>
                                </tr>

                            @endforeach
                            </tbody>

                        </table>
                    </div>
                @endif
                @if( isset($resource['parameters']) )
                    <div class="parameters">
                        <h4>Parameters</h4>
                        <table>
                            <tbody>
                            @foreach($resource['parameters'] as $request => $parameters)
                                <tr>
                                    <td>
                                        <p>{{ $request }} @if(isset($parameters['required'])) <span class="required">*REQUIRED</span> @endif
                                        </p>

                                        <p>{{ $parameters['type'] }}</p>
                                    </td>
                                    <td><p>{{ $parameters['description'] }}</p></td>
                                </tr>

                            @endforeach
                            </tbody>

                        </table>
                    </div>
                @endif
            </div>
        </div>

        <div class="resource__area__example">
            <div class="resource__area__padding">
                <div class="endpoint">
                    <pre><code><p class="endpoint__url"><span>{{ $resource['method'] }}</span>{{ url($prefix) }}{{ $endpoint }}</p></code></pre>
                </div>
                @if(isset($resource['curl']))
                    <div class="curl">
                        <h4>curl Request</h4>
                        <pre><code>{{ $resource['curl'] }}</code></pre>
                    </div>
                @endif
                @foreach($resource['responses'] as $code => $response)
                <div class="response">
                    <h4>Example Response {{ $code }}</h4>
                    <pre><code>{!! \Appitized\Documentor\ApiHelper::format_json($response['json'], true) !!}</code></pre>
                </div>
                    @endforeach
            </div>
        </div>
    </div>
</section>

