<?php

use Illuminate\Database\Seeder;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count=User::count();
        if ($count==0){
            $user=new User();
            $user->name='Admin';
            $user->email='kaleemshoukat96@gmail.com';
            $user->email_verified_at=Carbon::now();
            $user->password=Hash::make('12345678');
            $user->save();
        }
    }
}
