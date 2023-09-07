<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scheduleIds = DB::table('schedule')->pluck('id');

    $result = [];
    
    foreach ($scheduleIds as $scheduleId) {
        $timeSlots = [
            '10:00 - 11:00',
            '11:00 - 12:00',
            '13:00 - 14:00',
            '14:00 - 15:00',
            '15:00 - 16:00',
            '16:00 - 17:00',
            '17:00 - 18:00',
            '19:00 - 20:00',
        ];
    
        foreach ($timeSlots as $timeSlot) {
            $result[] = [
                'schedule_id' => $scheduleId,
                'time' => $timeSlot,
                'slot' => 30,
            ];
        }
    }

    foreach ($result as $item) {
       DB::table('time')->insert([
        'schedule_id' => $item['schedule_id'],
        'time' => $item['time'],
        'slot' => 50,
       ]);
    }
    }
}
