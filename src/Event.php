<?php
declare(strict_types=1);

namespace jp3cki\statink\salmonconv;

class Event
{
    public static function convert(?string $key): ?string
    {
        switch ($key) {
            case 'cohock-charge':
                return 'cohock_charge';

            case 'fog':
                return 'fog';

            case 'goldie-seeking':
                return 'goldie_seeking';

            case 'griller':
                return 'griller';

            case 'rush':
                return 'rush';

            case 'the-mothership':
                return 'mothership';

            default:
                return null;
        }
    }
}
