<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$4eCRZgcY37Oegrb9Nu3i..aygMkkCkLp.gXZRIqDqVC7dYV/BUBya',
                'remember_token' => 'u8LWJO87DPBX5qV5cc5xmPvWBtuvVtYbQtJKOEY0prf6L7KDdCRcK0tHMSSk',
                'created_at' => '2023-03-20 18:04:06',
                'updated_at' => '2023-03-20 18:04:06',
                'permissions' => '{"platform.index": true, "platform.systems.roles": true, "platform.systems.users": true, "platform.systems.attachment": true}',
            ),
        ));
        
        
    }
}