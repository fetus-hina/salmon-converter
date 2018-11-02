<?php
declare(strict_types=1);

namespace jp3cki\statink\salmonconv;

class Stage
{
    public static function convert(?array $json): ?string
    {
        if (!$json) {
            return null;
        }

        if (!$image = $json['image'] ?? null) {
            return null;
        }

        $map = [
            '6d68f5baa75f3a94e5e9bfb89b82e7377e3ecd2c' => 'shaketoba',
            'e07d73b7d9f0c64e552b34a2e6c29b8564c63388' => 'donburako',
            'e9f7c7b35e6d46778cd3cbc0d89bd7e1bc3be493' => 'tokishirazu',
            '65c68c6f0641cc5654434b78a6f10b0ad32ccdee' => 'dam',
        ];

        foreach ($map as $hint => $key) {
            if (strpos($image, $hint) !== false) {
                return $key;
            }
        }

        return null;
    }
}
