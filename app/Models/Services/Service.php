<?php

namespace App\Models\Services;

use App\Models\Errors\ErrorsTrait;
use Illuminate\Http\Request;

abstract class Service
{
    use ErrorsTrait;

    protected ?Request $request;

    public function __construct(Request $request = null)
    {
        $this->request = $request;
    }

    public function response(array $data = null): array
    {
        $response = [
            'status' => $this->hasErrors() ? 'error' : 'ok',
        ];

        if ($this->hasErrors()) {
            $response['message'] = $this->getError()?->getMessage();

            return $response;
        }

        return [
            ...$response,
            'data' => $data
        ];
    }

    public function getRequest(): Request
    {
        return $this->request;
    }

    public function setRequest(Request $request): static
    {
        $this->request = $request;
        return $this;
    }
}
