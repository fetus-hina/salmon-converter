<?php
declare(strict_types=1);

namespace jp3cki\statink\salmonconv;

class Special
{
    public static function convert(?array $json): ?string
    {
        if (!$json) {
            return null;
        }

        switch ($json['id'] ?? null) {
            case 2:
                return 'pitcher';

            case 7:
                return 'presser';

            case 8:
                return 'jetpack';
            
            case 9:
                return 'chakuchi';

            default:
                return null;
        }
    }
}
