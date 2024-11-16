<?php

namespace App\Utils;

class HttpStatus
{
    // Success Responses
    public const SUCCESS_200 = 200;
    public const CREATED_201 = 201;
    public const ACCEPTED_202 = 202;
    public const NO_CONTENT_204 = 204;

    // Client Error Responses
    public const BAD_REQUEST_400 = 400;
    public const UNAUTHORIZED_401 = 401;
    public const FORBIDDEN_403 = 403;
    public const NOT_FOUND_404 = 404;
    public const METHOD_NOT_ALLOWED_405 = 405;
    public const CONFLICT_409 = 409;
    public const UNPROCESSABLE_ENTITY_422 = 422;
    public const TOO_MANY_REQUESTS_429 = 429;

    // Server Error Responses
    public const INTERNAL_SERVER_ERROR_500 = 500;
    public const NOT_IMPLEMENTED_501 = 501;
    public const BAD_GATEWAY_502 = 502;
    public const SERVICE_UNAVAILABLE_503 = 503;
    public const GATEWAY_TIMEOUT_504 = 504;
}
