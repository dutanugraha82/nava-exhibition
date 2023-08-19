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
                    'date' => 'Mon, 25 Sept 2023',
                    'status' => 0,

                ],
                [
                    'date' => 'Tue, 26 Sept 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Wed, 27 Sept 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Thu, 28 Sept 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Fri, 29 Sept 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Sat, 30 Sept 2023',
                    'status' => 1,
                ],
                [
                    'date' => 'Sun, 01 Oct 2023',
                    'status' => 1,
                ],
                [
                    'date' => 'Mon, 02 Oct 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Tue, 03 Oct 2023',
                    'status' => 0,
                ],
                [
                    'date' => 'Wed, 04 Oct 2023',
                    'status' => 0,
                ],
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
                ];
       
            foreach ($data as $item) {
                DB::table('schedule')->insert([
                    'date' => $item['date'],
                    'status' => $item['status'],
                ]);
            }
    }
}
