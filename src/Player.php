<?php
declare(strict_types=1);

namespace jp3cki\statink\salmonconv;

class Player
{
    use SafeAccessor;

    public static function convert(?array $json, ?array $playerType): ?array
    {
        if (!$json) {
            return null;
        }

        return [
            'boss_kills' => static::getBossKilss($json['boss_kill_counts'] ?? []),
            'death' => static::getInteger($json, 'dead_count'),
            'gender' => static::getString($playerType, 'style'),
            'golden_egg_delivered' => static::getInteger($json, 'golden_ikura_num'),
            'name' => static::getString($json, 'name'),
            'power_egg_collected' => static::getInteger($json, 'ikura_num'),
            'rescue' => static::getInteger($json, 'help_count'),
            'special' => Special::convert($json['special'] ?? null),
            'special_uses' => $json['special_counts'] ?? null,
            'species' => Species::convert($playerType['species']),
            'splatnet_id' => static::getString($json, 'pid'),
            'weapons' => array_map(
                function ($weapon): ?string {
                    return Weapon::convert(static::getInteger($weapon, 'id'));
                },
                $json['weapon_list'] ?? []
            ),
        ];
    }

    protected static function getBossKilss(array $data): array
    {
        $result = [];
        foreach ($data as $boss) {
            $key = Boss::convert($boss['boss']['key'] ?? null);
            $count = (int)static::getInteger($boss, 'count');
            if ($key && $count > 0) {
                $result[$key] = $count;
            }
        }
        ksort($result);
        return $result;
    }
}
