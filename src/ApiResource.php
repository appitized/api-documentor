<?php

namespace Appitized\Documentor;

class ApiResource
{
    public function createResource($endpoint, $resource)
    {
        return [
          'resource' => $resource,
          'href' => $this->explode_endpoint($endpoint),
          'endpoint' => $this->explode_endpoint($endpoint)
        ];
    }

    protected function explode_endpoint($endpoint)
    {
        list($method, $endpoint) = explode(':', $endpoint);
        return $endpoint;
    }
}
