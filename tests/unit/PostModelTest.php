<?php

use App\Post;

class PostModelTest extends TestCase
{
    /**
     *
     * @test
     */
    public function adding_a_title_generates_a_slug()
    {
        $post = new Post([
            'title' => 'Titulo con slug'
        ]);
        $this->assertSame('titulo-con-slug', $post->slug);
    }

    /**
     *
     * @test
     */
    public function editting_the_title_changes_the_slug()
    {
        $post = new Post([
            'title' => 'Titulo con slug'
        ]);
        $post->title = 'Titulo con slug cambiado';
        $this->assertSame('titulo-con-slug-cambiado', $post->slug);
    }
}
