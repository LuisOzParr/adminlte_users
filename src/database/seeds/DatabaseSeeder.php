<?php
namespace Ozparr\AdminLogin\DataBase\Seeds;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ozparr\Login\Models\Rol;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        self::llenarTabla('roles',[
            ['nombre' => 'root', 'nivel' => 0 ],
            ['nombre' => 'Admin', 'nivel' => 1],
            ['nombre' => 'Moderador', 'nivel' => 20],
            ['nombre' => 'Usuario', 'nivel' => 99],
        ]);

        self::llenarTabla('users',[
            [
                'name' =>  'root',
                'email'=> 'root@root.com',
                'password' => bcrypt('secret'),
                'rol_id' =>  '1'
            ]
        ]);
    }

    public function llenarTabla ($tabla,$datos){
        foreach ($datos as $dato){
            DB::table($tabla)->insert([$dato]);
        }
    }
}