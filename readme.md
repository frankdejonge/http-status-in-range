## HTTP Status Range Checker

```bash
composer require frankdejonge/http-status-in-range
```

```php
<?php

use function FrankDeJonge\HttpStatusRange\http_status_in_range;
use function FrankDeJonge\HttpStatusRange\http_status_not_in_range;
use const FrankDeJonge\HttpStatusRange\HTTP_SUCCESS;

$response = $httpClient->get('/something');

if (http_status_in_range($response->getStatusCode(), HTTP_SUCCESS)) {
    // SUCCESS!
}

if (http_status_not_in_range($response->getStatusCode(), HTTP_SUCCESS)) {
    // NOT SUCCESS!
}
```

## Ranges:

* `HTTP_INFORMATIONAL` 100-199
* `HTTP_SUCCESS` 200-299
* `HTTP_REDIRECT` 300-399
* `HTTP_CLIENT_ERROR` 400-499
* `HTTP_SERVER_ERROR` 500-599