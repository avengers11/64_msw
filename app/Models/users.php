<?php

namespace App\Models;

use App\Models\Balance;
use App\Models\Device;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;
    protected $table = "users";
    protected $primaryKey = "id";
    
    function devices(){
        return $this->hasMany(Device::class);
    }


    // attr 
    public function getBalanceAttribute()
    {
        $user = users::where('username', session()->get('username'))->first();

        return Balance::where('user_id', $user->id)->sum('amount') ?? 0;
    }

    public function getExpiredFormatAttribute()
    {
        // Example: Retrieve the `expired` value from the database
        $expiredInSeconds = $this->expired  - time();
        if (!is_numeric($expiredInSeconds) || $expiredInSeconds <= 0) {
            $expiredTimes = [
                'months' => null,
                'days' => null,
                'hours' => null,
                'minutes' => null,
            ];
        }

        // Convert the seconds into Carbon interval
        $endDate = Carbon::now()->addSeconds($expiredInSeconds);
        $now = Carbon::now();

        // Calculate the difference
        $diffInMonths = $now->diffInMonths($endDate);
        $remainingDays = $now->addMonths($diffInMonths)->diffInDays($endDate);
        $remainingHours = $now->addDays($remainingDays)->diffInHours($endDate);
        $remainingMinutes = $now->addHours($remainingHours)->diffInMinutes($endDate);
        $expiredTimes = [
            'months' => $diffInMonths > 0 ? $diffInMonths : null,
            'days' => $remainingDays > 0 ? $remainingDays : null,
            'hours' => $remainingHours,
            'minutes' => $remainingMinutes,
        ];

        return $expiredTimes;
    }
}
