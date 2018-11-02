<?php
declare(strict_types=1);

namespace jp3cki\statink\salmonconv;

class WaterLevel
{
    public static function convert(?string $key): ?string
    {
        switch ($key) {
            case 'low':
            case 'normal':
            case 'high':
                return $key;

            default:
                return null;
        }
    }
}
