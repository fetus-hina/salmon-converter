<?php
declare(strict_types=1);

namespace jp3cki\statink\salmonconv;

use jp3cki\uuid\Uuid as UuidImpl;

class Uuid
{
    use SafeAccessor;

    const UUID_NAMESPACE = '418fe150-cb33-11e8-8816-d050998473ba';

    public static function convert(?array $json): ?string
    {
        if (!$json) {
            return null;
        }

        if (!$myData = $json['my_result'] ?? null) {
            return null;
        }

        if (!$number = static::getInteger($json, 'job_id')) {
            return null;
        }

        $uuid = UuidImpl::v5(
            new UuidImpl(static::UUID_NAMESPACE),
            sprintf('%d@%s', $number, $myData['pid'])
        );

        return $uuid->__toString();
    }
}
