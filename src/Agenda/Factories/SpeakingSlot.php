<?php

namespace Dutchento\Agenda\Factories;

use Dutchento\Agenda\Objects\Speaker;
use Dutchento\Agenda\Objects\SpeakingSlot as SpeakingSlotObject;

class SpeakingSlot
{
    public static function createObject(array $slot): SpeakingSlotObject
    {
        $speaker = new Speaker((string)$slot['fields']['Speaker'][0], 'name', 'company');

        $startDate = new \DateTimeImmutable('2019-04-18 00:00:00');

        switch ((string)$slot['fields']['Room'][0]) {
            case 'rechRyRqqn8DITbhg': $roomLabel = 'Theatre'; break;
            case 'recXUTGoOf97x6pLa': $roomLabel = 'Henry Ford'; break;
            case 'recDkU8qpn9BFCGC4': $roomLabel = 'Toyoda'; break;
            default: $roomLabel = 'sponsor pavilion'; break;
        }

        return new SpeakingSlotObject(
            (string)$slot['id'],
            $speaker,
            $roomLabel,
            $startDate->add(new \DateInterval("PT{$slot['fields']['Start']}S")),
            $startDate->add(new \DateInterval("PT{$slot['fields']['End']}S")),
            (string)$slot['fields']['Name'],
            (string)$slot['fields']['Field 13'][0]
        );
    }
}
