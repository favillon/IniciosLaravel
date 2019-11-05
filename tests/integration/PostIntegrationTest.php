<?php

use App\Post;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostIntegrationTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * 
     * @test
     */
    public function a_slug_is_generated_and_saved_to_the_database()
    {
        $user = $this->defaultUser();

        $post = factory(\App\Post::class)->make([
            'title' => 'Nuevo post de prueba integracion',
            'content' => 'Este es el contenido del post',
        ]);

        $user->posts()->save($post);

        $this->assertSame('nuevo-post-de-prueba-integracion', $post->fresh()->slug);
    }
}
