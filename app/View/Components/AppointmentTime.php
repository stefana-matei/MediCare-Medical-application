<?php

namespace App\View\Components;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\View\Component;

/**
 *  TODO DELETE THIS!
 *
 * Class AppointmentTime
 * @package App\View\Components
 */
class AppointmentTime extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $start_date = Carbon::today()->setTime(8,0,0);
        $end_date = Carbon::today()->setTime(17,0,0);
        $slot_duration = 30;

        $times = [];
        $slots = $start_date->diffInMinutes($end_date)/$slot_duration;

        // First time
        $times[]=$start_date->format('H:i');

        for($s = 1;$s <=$slots;$s++){
            // Adding each additional to the list
            $times[]=$start_date->addMinute($slot_duration)->format('H:i');
        }

        return view('components.appointment-time', compact('times'));
    }
}
