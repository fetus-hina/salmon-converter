<?php
declare(strict_types=1);

namespace jp3cki\statink\salmonconv;

class Title
{
    use SafeAccessor;

    public static function convert(?array $json): ?string
    {
        if (!$json) {
            return null;
        }
        $id = SafeAccessor::getInteger($json, 'id');
        if ($id === null) {
            return null;
        }

        $map = [
            'intern',
            'apprentice',
            'part_timer',
            'go_getter',
            'overachiever',
            'profreshional',
        ];
        return $map[$id] ?? null;
    }
}
