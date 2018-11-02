<?php
declare(strict_types=1);

namespace jp3cki\statink\salmonconv;

class Species
{
    public static function convert(?string $key): ?string
    {
        $key = trim((string)$key, 's'); // "inklings" -> "inkling"
        if ($key === 'inkling' || $key === 'octoling') {
            return $key;
        }

        return null;
    }
}
