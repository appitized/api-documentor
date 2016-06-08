<?php

namespace Appitized\Documentor;

class ApiResource
{
    public function createResource($endpoint, $resource)
    {
        return [
          'resource' => $resource,
          'href' => snake_case($endpoint),
          'endpoint' => $this->explode_endpoint($endpoint)
        ];
    }

    public function getHref($endpoint)
    {
        return snake_case($this->explode_endpoint($endpoint));
    }

    protected function explode_endpoint($endpoint)
    {
        list($method, $endpoint) = explode(':', $endpoint);
        return $endpoint;
    }
}
