<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    // use DatabaseMigrations; no se utiliza por ejecuta toda la migracion 
    // (depende de la cantidad de migraciones q tenga)
    use DatabaseTransactions;
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $nombre = 'Fabian Villon';
        $correo = "admin@favillon.com";

        $user = factory(\App\User::class)->create([
            'name' => $nombre,
            'email' => $correo
        ]);

        $this->actingAs($user, 'api')
            ->visit('api/user')
            ->see($nombre)
            ->see($correo);
    }
}
