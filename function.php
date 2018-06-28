<?php

namespace FrankDeJonge\HttpStatusRange;

const HTTP_INFORMATIONAL = 1;
const HTTP_SUCCESS = 2;
const HTTP_REDIRECTION = 3;
const HTTP_CLIENT_ERROR = 4;
const HTTP_SERVER_ERROR = 5;

function http_status_in_range(int $statusCode, int $range): bool {
    return (($statusCode / 100) | 0) === $range;
}