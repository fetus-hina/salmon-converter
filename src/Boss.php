<?php
declare(strict_types=1);

namespace jp3cki\statink\salmonconv;

class Boss
{
    public static function convert(?string $key): ?string
    {
        switch ($key) {
            case 'sakediver':
                return 'maws';

            case 'sakedozer':
                return 'griller';

            case 'sakelien-bomber':
                return 'steelhead';

            case 'sakelien-cup-twins':
                return 'flyfish';

            case 'sakelien-golden':
                return 'goldie';

            case 'sakelien-shield':
                return 'scrapper';

            case 'sakelien-snake':
                return 'steel_eel';

            case 'sakelien-tower':
                return 'stinger';

            case 'sakerocket':
                return 'drizzler';

            default:
                return null;
        }
    }
}
