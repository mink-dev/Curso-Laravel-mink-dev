<?php

use Illuminate\Database\Seeder;
use App\Email;
use Carbon\Carbon;
class EmailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Email::truncate();

        for($i=1; $i<101; $i++){
            Email::create([
                'name' => 'Usuario'.$i,
                'email' => 'usuario'.$i.'@hotmail.com',
                'subject' => 'Pruebas Seeder'.$i,
                'content' => 'Este es el mensaje del número '.$i,
                'created_at' => Carbon::now()->subDays(100)->addDays($i)
            ]);
        }
    }
}
