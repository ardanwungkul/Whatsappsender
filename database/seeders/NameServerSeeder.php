<?php

namespace Database\Seeders;

use App\Models\NameServer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NameServerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nameserver = [
            [
                'id' => 1,
                'name_server_1' => 'plesk1.com',
                'name_server_2' => 'plesk2.com',
                'tanggal' => '2023-08-01',
                'status' => true,

            ],
            [
                'id' => 2,
                'name_server_1' => 'plesk1.sites.id',
                'name_server_2' => 'plesk2.sites.id',
                'tanggal' => '2023-10-09',
                'status' => true,

            ],
            [
                'id' => 3,
                'name_server_1' => 'ns1.hostns.io',
                'name_server_2' => 'ns2.hostns.io',
                'tanggal' => '2023-10-09',
                'status' => true,

            ],
        ];
        NameServer::insert($nameserver);
    }
}
