<?php
declare(strict_types=1);

namespace jp3cki\statink\salmonconv;

trait SafeAccessor
{
    public static function getString(?array $json, string $key): ?string
    {
        $value = $json[$key] ?? null;
        if ($value === null || !is_scalar($value)) {
            return null;
        }

        $value = trim((string)$value);
        return ($value === '') ? null : $value;
    }

    public static function getInteger(?array $json, string $key): ?int
    {
        $value = static::getString($json, $key);
        if ($value === null) {
            return null;
        }

        $value = filter_var($value, FILTER_VALIDATE_INT);
        return ($value === false) ? null : $value;
    }
}
