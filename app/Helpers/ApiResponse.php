<?php

namespace App\Helpers;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ApiResponse extends Response implements Responsable
{
    protected int $httpCode;
    protected array $data;
    protected string $errorMessage;

    public function __construct(int $httpCode, array $data = [], string $errorMessage = '')
    {
        $this->httpCode = $httpCode;
        $this->data = $data;
        $this->errorMessage = $errorMessage;
    }

    public function toResponse($request): JsonResponse
    {
        $payload = match (true) {
            $this->httpCode >= 500 => ['error_message' => 'server error'],
            $this->httpCode == 400 => ['error_message' => 'validation error', "error_fields" => $this->data],
            $this->httpCode == 401 => ['error_message' => 'unauthorized'],
            $this->httpCode == 403 => ['error_message' => 'forbidden'],
            $this->httpCode > 400 => ['error_message' => $this->errorMessage],
            $this->httpCode >= 200 => ['data' => $this->data],
        };

        return response()->json(
            data: [...$payload, "status" => $this->httpCode],
            status: $this->httpCode,
            options: JSON_UNESCAPED_UNICODE
        );
    }

    public static function ok(array $data = [])
    {
        return new static(200, $data);
    }

    public static function created(array $data)
    {
        return new static(201, $data);
    }

    public static function badRequest(array $data)
    {
        return new static(400, $data);
    }

    public static function unauthorized()
    {
        return new static(401);
    }

    public static function forbidden()
    {
        return new static(403);
    }

    public static function notFound(string $errorMessage = "can't found any data")
    {
        return new static(404, errorMessage: $errorMessage);
    }
}
