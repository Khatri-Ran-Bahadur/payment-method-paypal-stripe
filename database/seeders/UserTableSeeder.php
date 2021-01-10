<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $adminRole=Role::where('slug','admin')->first();
        $vendorRole=Role::where('slug','vendor')->first();
        $admin=User::create([
            'name'=>"Ran Bahadur kc",
            'email'=>'rnkhatri@gmail.com',
            'password'=>bcrypt('admin')
        ]);

        $vendor=User::create([
            'name'=>"RN KC",
            'email'=>'vendor@gmail.com',
            'password'=>bcrypt('vendor')
        ]);

        $admin->roles()->attach($adminRole);
        $vendor->roles()->attach($vendorRole);
    }
}
