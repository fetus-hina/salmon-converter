<?php
declare(strict_types=1);

namespace jp3cki\statink\salmonconv;

class Weapon
{
    public static function convert(?int $id): ?string
    {
        switch ($id) {
            case 0: return 'bold';
            case 10: return 'wakaba';
            case 20: return 'sharp';
            case 30: return 'promodeler_mg';
            case 40: return 'sshooter';
            case 50: return '52gal';
            case 60: return 'nzap85';
            case 70: return 'prime';
            case 80: return '96gal';
            case 90: return 'jetsweeper';
            case 200: return 'nova';
            case 210: return 'hotblaster';
            case 220: return 'longblaster';
            case 230: return 'clashblaster';
            case 310: return 'h3reelgun';
            case 240: return 'rapid';
            case 250: return 'rapid_elite';
            case 300: return 'l3reelgun';
            case 400: return 'bottlegeyser';
            case 1000: return 'carbon';
            case 1010: return 'splatroller';
            case 1020: return 'dynamo';
            case 1030: return 'variableroller';
            case 1100: return 'pablo';
            case 1110: return 'hokusai';
            case 2000: return 'squiclean_a';
            case 2010: return 'splatcharger';
            case 2030: return 'liter4k';
            case 2050: return 'bamboo14mk1';
            case 2060: return 'soytuber';
            case 3000: return 'bucketslosher';
            case 3010: return 'hissen';
            case 3020: return 'screwslosher';
            case 3030: return 'furo';
            case 3040: return 'explosher';
            case 4000: return 'splatspinner';
            case 4010: return 'barrelspinner';
            case 4020: return 'hydra';
            case 4030: return 'kugelschreiber';
            case 4040: return 'nautilus47';
            case 5000: return 'sputtery';
            case 5010: return 'maneuver';
            case 5020: return 'kelvin525';
            case 5030: return 'dualsweeper';
            case 5040: return 'quadhopper_black';
            case 6000: return 'parashelter';
            case 6010: return 'campingshelter';
            case 6020: return 'spygadget';
            case 20000: return 'kuma_blaster';
            case 20010: return 'kuma_brella';
            case 20020: return 'kuma_charger';
            case 20030: return 'kuma_slosher';
            default: return null;
        }
    }
}
