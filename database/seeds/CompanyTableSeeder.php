<?php

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company')->insert([
            ['company_id' => 1, 'company_kode' => 'CB001', 'company_nama' => 'Cabang 001'],
            ['company_id' => 2, 'company_kode' => 'CB002', 'company_nama' => 'Cabang 002'],
            ['company_id' => 3, 'company_kode' => 'CB003', 'company_nama' => 'Cabang 003'],
            ['company_id' => 4, 'company_kode' => 'CB004', 'company_nama' => 'Cabang 004'],
            ['company_id' => 5, 'company_kode' => 'CB005', 'company_nama' => 'Cabang 005'],
            ['company_id' => 6, 'company_kode' => 'CB006', 'company_nama' => 'Cabang 006'],
            ['company_id' => 7, 'company_kode' => 'CB007', 'company_nama' => 'Cabang 007'],
            ['company_id' => 8, 'company_kode' => 'CB008', 'company_nama' => 'Cabang 008'],
            ['company_id' => 9, 'company_kode' => 'CB009', 'company_nama' => 'Cabang 009'],
            ['company_id' => 10, 'company_kode' => 'CB010', 'company_nama' => 'Cabang 010']
        ]);
        DB::table('company_project')->insert([
            ['company_id' => 1, 'company_project_kode' => 'CB001CP01', 'company_project_nama' => 'Cabang Project CB001CP01'],
            ['company_id' => 1, 'company_project_kode' => 'CB001CP02', 'company_project_nama' => 'Cabang Project CB001CP01'],
            ['company_id' => 2, 'company_project_kode' => 'CB002CP01', 'company_project_nama' => 'Cabang Project CB002CP01'],
            ['company_id' => 2, 'company_project_kode' => 'CB002CP02', 'company_project_nama' => 'Cabang Project CB002CP02'],
            ['company_id' => 2, 'company_project_kode' => 'CB002CP03', 'company_project_nama' => 'Cabang Project CB002CP03'],
            ['company_id' => 2, 'company_project_kode' => 'CB002CP04', 'company_project_nama' => 'Cabang Projet CB002CP04'],
            ['company_id' => 3, 'company_project_kode' => 'CB003CP01', 'company_project_nama' => 'Cabang Project CB003CP01'],
            ['company_id' => 3, 'company_project_kode' => 'CB003CP02', 'company_project_nama' => 'Cabang Project CB003CP02'],
            ['company_id' => 4, 'company_project_kode' => 'CB004CP01', 'company_project_nama' => 'Cabang Project CB004CP01'],
            ['company_id' => 5, 'company_project_kode' => 'CB005CP01', 'company_project_nama' => 'Cabang Project CB005CP01']
        ]);
    }
}
