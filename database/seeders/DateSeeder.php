<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
                
                [
                    'date' => 'Thu, 05 Oct 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Fri, 06 Oct 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Sat, 07 Oct 2023',
                    'status' => 1,
                ],
                [
                    'date' => 'Sun, 08 Oct 2023',
                    'status' => 1,
                ],
                [
                    'date' => 'Mon, 09 Oct 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Tue, 10 Oct 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Wed, 11 Oct 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Thu, 12 Oct 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Fri, 13 Oct 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Sat, 14 Oct 2023',
                    'status' => 1,
                ],
                [
                    'date' => 'Sun, 15 Oct 2023',
                    'status' => 1,
                ],
                [
                    'date' => 'Mon, 16 Oct 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Tue, 17 Oct 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Wed, 18 Oct 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Thu, 19 Oct 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Fri, 20 Oct 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Sat, 21 Oct 2023',
                    'status' => 1,
                ],
                [
                    'date' => 'Sun, 22 Oct 2023',
                    'status' => 1,
                ],
                [
                    'date' => 'Mon, 23 Oct 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Tue, 24 Oct 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Wed, 25 Oct 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Thu, 26 Oct 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Fri, 27 Oct 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Sat, 28 Oct 2023',
                    'status' => 1,
                ],
                [
                    'date' => 'Sun, 29 Oct 2023',
                    'status' => 1,
                ],
                [
                    'date' => 'Mon, 30 Oct 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Tue, 31 Oct 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Wed, 01 Nov 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Thu, 02 Nov 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Fri, 03 Nov 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Sat, 04 Nov 2023',
                    'status' => 1,
                ],
                [
                    'date' => 'Sun, 05 Nov 2023',
                    'status' => 1,
                ],
                [
                    'date' => 'Mon, 06 Nov 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Tue, 07 Nov 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Wed, 08 Nov 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Thu, 09 Nov 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Fri, 10 Nov 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Sat, 11 Nov 2023',
                    'status' => 1,
                ],
                [
                    'date' => 'Sun, 12 Nov 2023',
                    'status' => 1,
                ],
                [
                    'date' => 'Mon, 13 Nov 203',
                    'status' => 0,
                ],
                [
                    'date' => 'Tue, 14 Nov 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Wed, 15 Nov 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Thu, 16 Nov 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Fri, 17 Nov 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Sat, 18 Nov 2023',
                    'status' => 1,
                ],
                [
                    'date' => 'Sun, 19 Nov 2023',
                    'status' => 1,
                ],
                [
                    'date' => 'Mon, 20 Nov 2023',
                    'status' => 0,
                ],
                ];
       
            foreach ($data as $item) {
                DB::table('schedule')->insert([
                    'date' => $item['date'],
                    'status' => $item['status'],
                ]);
            }
    }
}
