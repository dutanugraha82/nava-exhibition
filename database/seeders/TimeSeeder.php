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
        $time = [
            // 2 start
            [
                'schedule_id' => 1,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 1,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 1,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 1,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 1,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 1,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 1,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 1,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 2 End
            // 3 start
            [
                'schedule_id' => 2,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 2,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 2,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 2,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 2,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 2,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 2,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 2,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 3 end
            // 4 start
            [
                'schedule_id' => 3,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 3,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 3,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 3,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 3,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 3,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 3,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 3,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 4 end
            // 5 start
            [
                'schedule_id' => 4,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 4,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 4,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 4,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 4,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 4,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 4,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 4,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 5 End
            // 6 Start
            [
                'schedule_id' => 5,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 5,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 5,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 5,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 5,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 5,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 5,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 5,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 6 end
            // 7 start
            [
                'schedule_id' => 6,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 6,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 6,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 6,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 6,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 6,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 6,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 6,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 7 end
            // 8 Start
            [
                'schedule_id' => 7,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 7,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 7,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 7,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 7,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 7,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 7,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 7,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 8 End
            // 9 start
            [
                'schedule_id' => 8,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 8,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 8,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 8,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 8,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 8,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 8,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 8,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 9 end
            // 10 start
            [
                'schedule_id' => 9,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 9,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 9,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 9,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 9,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 9,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 9,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 9,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 10 end
            // 11 start
            [
                'schedule_id' => 10,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 10,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 10,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 10,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 10,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 10,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 10,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 10,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 11 end
            // 12 start
            [
                'schedule_id' => 11,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 11,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 11,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 11,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 11,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 11,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 11,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 11,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 12 end
            // 13 start
            [
                'schedule_id' => 12,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 12,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 12,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 12,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 12,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 12,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 12,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 12,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 13 end
            // 14 start
            [
                'schedule_id' => 13,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 13,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 13,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 13,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 13,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 13,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 13,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 13,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 14 end
            // 15 start
            [
                'schedule_id' => 14,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 14,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 14,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 14,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 14,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 14,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 14,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 14,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 15 end
            //  16 start
            [
                'schedule_id' => 15,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 15,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 15,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 15,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 15,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 15,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 15,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 15,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 16 End
            // 17 start
            [
                'schedule_id' => 16,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 16,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 16,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 16,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 16,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 16,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 16,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 16,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 17 end
            // 18 start
            [
                'schedule_id' => 17,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 17,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 17,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 17,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 17,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 17,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 17,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 17,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 18 end
            // 19 start
            [
                'schedule_id' => 18,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 18,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 18,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 18,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 18,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 18,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 18,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 18,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 19 End
            // 20 Start
            [
                'schedule_id' => 19,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 19,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 19,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 19,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 19,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 19,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 19,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 19,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 20 end
            // 21 start
            [
                'schedule_id' => 20,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 20,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 20,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 20,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 20,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 20,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 20,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 20,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 21 end
            // 22 Start
            [
                'schedule_id' => 21,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 21,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 21,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 21,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 21,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 21,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 21,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 21,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 22 End
            // 23 start
            [
                'schedule_id' => 22,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 22,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 22,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 22,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 22,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 22,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 22,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 22,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 23 end
            // 24 start
            [
                'schedule_id' => 23,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 23,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 23,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 23,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 23,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 23,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 23,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 23,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 24 end
            // 25 start
            [
                'schedule_id' => 24,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 24,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 24,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 24,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 24,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 24,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 24,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 24,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 25 end
            // 26 start
            [
                'schedule_id' => 25,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 25,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 25,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 25,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 25,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 25,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 25,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 25,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 26 end
            // 27 start
            [
                'schedule_id' => 26,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 26,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 26,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 26,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 26,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 26,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 26,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 26,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 27 end
            // 28 start
            [
                'schedule_id' => 27,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 27,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 27,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 27,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 27,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 27,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 27,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 27,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 28 end
            // 29 start
            [
                'schedule_id' => 28,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 28,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 28,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 28,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 28,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 28,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 28,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 28,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 29 end
            // 30 start
            [
                'schedule_id' => 29,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 29,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 29,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 29,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 29,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 29,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 29,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 29,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 30 end
            // 31 start
            [
                'schedule_id' => 30,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 30,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 30,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 30,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 30,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 30,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 30,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 30,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 31 end
            // 32 start
            [
                'schedule_id' => 31,
                'time' => '10:00 - 11:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 31,
                'time' => '11:00 - 12:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 31,
                'time' => '13:00 - 14:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 31,
                'time' => '14:00 - 15:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 31,
                'time' => '15:00 - 16:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 31,
                'time' => '16:00 - 17:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 31,
                'time' => '17:00 - 18:00',
                'slot' => 30,
            ],
            [
                'schedule_id' => 31,
                'time' => '19:00 - 20:00',
                'slot' => 30,
            ],
            // 32 end
            ];

            foreach ($time as $item) {
                DB::table('time')->insert([
                    'schedule_id' => $item['schedule_id'],
                    'time' => $item['time'],
                    'slot' => $item['slot'],
                ]);
            }


        
    }
}
