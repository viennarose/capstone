<?php

namespace App\Rules;

use DateTime;
use Illuminate\Support\Carbon;
use Illuminate\Contracts\Validation\Rule;

class TimeBetween implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $pickupDate = Carbon::parse($value);
        $pickupTime = Carbon::createFromTime($pickupDate->hour, $pickupDate->minute, $pickupDate->second);
        //$newDateTime = CarbonImmutable::now()->add(1, 'hour');
        //$now =  new DateTime();
        //$earliestTime = $now->addMinutes(120);
        $earliestTime = Carbon::createFromTimeString('8:00:00')->addMinutes(30);
        $lastTime = Carbon::createFromTimeString('17:00:00');

        // $now = new DateTime();
        // echo $now->format('Y-m-d H:i:s');
        return $pickupTime->between($earliestTime, $lastTime) ? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please choose the time between 8:00am-5:00pm';
    }
}
