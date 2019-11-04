<?php

class ExampleTest extends FeatureTestCase
{
   
    /**
     * @test
     */
    function basic_example()
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
