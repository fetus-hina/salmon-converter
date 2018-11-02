<?php
declare(strict_types=1);

namespace jp3cki\statink\salmonconv;

class Main
{
    use SafeAccessor;

    public static function convert(?array $json): ?array
    {
        if (!$json) {
            return null;
        }

        return [
            'automated' => 'yes',
            'boss_appearances' => static::getBossAppearances(
                $json['boss_counts'] ?? []
            ),
            'clear_waves' => ($json['job_result']['is_clear'] ?? null)
                ? 3
                : count($json['wave_details']) - 1,
            'danger_rate' => static::getString($json, 'danger_rate'),
            'fail_reason' => $json['job_result']['failure_reason'] ?? null,
            'my_data' => Player::convert(
                $json['my_result'] ?? null,
                $json['player_type'] ?? null
            ),
            'shift_start_at' => static::getInteger($json, 'start_time'),
            'splatnet_number' => static::getInteger($json, 'job_id'),
            'stage' => Stage::convert($json['schedule']['stage'] ?? null),
            'start_at' => static::getInteger($json, 'play_time'),
            'teammates' => array_map(
                function (array $json): array {
                    return Player::convert($json, null);
                },
                array_values($json['other_results'] ?? [])
            ),
            'title_after' => Title::convert($json['grade'] ?? null),
            'title_exp_after' => static::getInteger($json, 'grade_point'),
            'uuid' => Uuid::convert($json),
            'waves' => array_map(
                function (array $json): array {
                    return Wave::convert($json);
                },
                array_values($json['wave_details'] ?? [])
            ),
        ];
    }

    protected static function getBossAppearances(array $data): array
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
