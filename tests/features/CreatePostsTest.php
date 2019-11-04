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

    /**
     * @test
     */
    function creating_a_post_requires_authentication() 
    {
        $this->visit(route('posts.create'))
             ->seePageIs(route('login'));
    }

    /**
     * @test
     */
    function create_post_from_validation() 
    {
        $user = $this->defaultUser();
        $this->actingAs($user)
            ->visit(route('posts.create'))
            ->press('Publicar')
            ->seePageIs(route('posts.create'))
            ->seeInElement('#field_title .help-block', 'El campo título es obligatorio')
            ->seeInElement('#field_content .help-block', 'El campo contenido es obligatorio');
    }

    /**
     * @test
     */
    function create_post_from_validation_custom_method() 
    {
        $user = $this->defaultUser();
        $this->actingAs($user)
            ->visit(route('posts.create'))
            ->press('Publicar')
            ->seePageIs(route('posts.create'))
            ->seeErrors([
                'title' => 'El campo título es obligatorio',
                'content' => 'El campo contenido es obligatorio'
            ]);
    }
}
