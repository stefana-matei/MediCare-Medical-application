<?php

namespace App\Services;

use Carbon\Carbon;

class Calendar
{
    const START_HOUR = 8;
    const END_HOUR = 17;

    /**
     * Builds the time slots for appointment time selector
     *
     * @return array
     */
    public static function getTimeslots()
    {
        $slot_duration = 30;

        $start_date = Carbon::today()->setTime(self::START_HOUR, 0, 0);
        $end_date = Carbon::today()->setTime(self::END_HOUR, 0, 0)->subMinutes($slot_duration);

        $times = [];
        $slots = $start_date->diffInMinutes($end_date) / $slot_duration;

        // First time
        $times[] = [
            'start' => $start_date->format('H:i'),
            'end' => $start_date->copy()->addMinutes($slot_duration)->format('H:i'),
        ];

        for ($i = 1; $i <= $slots; $i++) {
            // Adding each additional to the list
            $times[] = [
                'start' => $start_date->addMinutes($slot_duration)->format('H:i'),
                'end' => $start_date->copy()->addMinutes($slot_duration)->format('H:i')
            ];
        }

        return $times;
    }

    /**
     * @param $month
     * @return string
     */
    public static function getMonthTranslated($month)
    {
        switch ($month) {
            case 1: return 'Ianuarie';
            case 2: return 'Februarie';
            case 3: return 'Martie';
            case 4: return 'Aprilie';
            case 5: return 'Mai';
            case 6: return 'Iunie';
            case 7: return 'Iulie';
            case 8: return 'August';
            case 9: return 'Septembrie';
            case 10: return 'Octombrie';
            case 11: return 'Noiembrie';
            case 12: return 'Decembrie';
        }

        return 'Luna gresita';
    }

}
