<?php

namespace FrankDeJonge\HttpStatusRange;

use PHPUnit\Framework\TestCase;

class HttpStatusInRangeTest extends TestCase
{
    /**
     * @test
     * @dataProvider statusInRange
     */
    public function status_is_detected_in_range(int $range, array $good, array $bad)
    {
        foreach ($good as $statusCode) {
            $this->assertTrue(http_status_in_range($statusCode, $range));
        }
        foreach ($bad as $statusCode) {
            $this->assertFalse(http_status_in_range($statusCode, $range));
        }
    }

    /**
     * @test
     * @dataProvider statusInRange
     */
    public function status_is_detected_not_in_range(int $range, array $good, array $bad)
    {
        foreach ($good as $statusCode) {
            $this->assertFalse(http_status_not_in_range($statusCode, $range));
        }
        foreach ($bad as $statusCode) {
            $this->assertTrue(http_status_not_in_range($statusCode, $range));
        }
    }

    public function statusInRange()
    {
        return [
            [HTTP_INFORMATIONAL, [100, 101, 199], [200, 99]],
            [HTTP_SUCCESS, [200, 204, 299], [199, 300]],
            [HTTP_REDIRECTION, [300, 301, 302, 399], [299, 400]],
            [HTTP_CLIENT_ERROR, [400, 401, 403, 499], [399, 500]],
            [HTTP_SERVER_ERROR, [500, 501, 504, 599], [499, 600]],
        ];
    }
}