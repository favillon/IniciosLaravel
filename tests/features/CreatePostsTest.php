<?php

class CreatePostsTest extends FeatureTestCase
{
   
    /**
     * @test
     */
    function a_user_create_a_post()
    {
        // Having - Tenemos
        $titulo = 'Este es una pregunta';
        $contenido = 'Este es el contenido';

        // Usuario logeado
        $user = $this->defaultUser();
        $this->actingAs($user);

        // When - Cuando
        $this->visit(route('posts.create'))
            ->type($titulo, 'title')
            ->type($contenido, 'content')
            ->press('Publicar', 'content');

        // Then - Entonces
        $this->seeInDatabase('posts', [
            'title' => $titulo,
            'content' => $contenido,
            'pending' => true,
            'user_id' => $user->id,
        ]);

        // Usuario redirigido para ver el detalle del post
        //$this->seeInElement("h1", $titulo);
        $this->see($titulo);
    }
}
