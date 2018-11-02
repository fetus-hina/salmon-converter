<?php
declare(strict_types=1);

namespace jp3cki\statink\salmonconv;

class Wave
{
    use SafeAccessor;

    public static function convert(?array $json): array
    {
        if (!$json) {
            return null;
        }

        return [
            'golden_egg_appearances' => static::getInteger($json, 'golden_ikura_pop_num'),
            'golden_egg_delivered' => static::getInteger($json, 'golden_ikura_num'),
            'golden_egg_quota' => static::getInteger($json, 'quota_num'),
            'known_occurrence' => Event::convert($json['event_type']['key'] ?? null),
            'power_egg_collected' => static::getInteger($json, 'ikura_num'),
            'water_level' => WaterLevel::convert($json['water_level']['key'] ?? null),
        ];
    }
}
