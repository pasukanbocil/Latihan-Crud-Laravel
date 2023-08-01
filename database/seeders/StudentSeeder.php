<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Schema::disableForeignKeyConstraints();
        // Student::truncate();
        // Schema::enableForeignKeyConstraints();

        // $data = [
        //     ['name' => 'DICKY SATRIA PH', 'nis' => '20110113', 'gender' => 'L', 'class_id' => 3],
        //     ['name' => 'MELI AMELIA PUTRI', 'nis' => '20110127', 'gender' => 'P', 'class_id' => 3],
        //     ['name' => 'FAKHRI PRIWALRAIBANA', 'nis' => '20110100', 'gender' => 'L', 'class_id' => 3],
        //     ['name' => 'FARHAN JULIANTO', 'nis' => '20110101', 'gender' => 'L', 'class_id' => 3],
        //     ['name' => 'YAYAN SURYANA', 'nis' => '20110126', 'gender' => 'L', 'class_id' => 3],
        //     ['name' => 'MELI AMELIA PUTRI', 'nis' => '20110125', 'gender' => 'L', 'class_id' => 3],
        // ];
        // foreach ($data as $dt) {
        //     Student::insert([
        //         'name' => $dt['name'],
        //         'nis' => $dt['nis'],
        //         'gender' => $dt['gender'],
        //         'class_id' => $dt['class_id'],
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ]);
        // }

        Student::factory()->count(20)->create();
    }
}
