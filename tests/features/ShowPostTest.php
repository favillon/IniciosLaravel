<?php

class ShowPostTest extends FeatureTestCase
{
    /**
     * 
     * @test
     */
    public function a_user_can_see_the_post_details()
    {
        // Having
        $user = $this->defaultUser([
            'name' => 'Fabian Andres'
        ]);
        $post = factory(\App\Post::class)->make([
            'title' => 'Titulo del post',
            'content' => 'Este es el contenido del post',
        ]);
        $user->posts()->save($post);

        // When        
        $this->visit(route('posts.show', $post))
            ->seeInElement('h1', $post->title)
            ->see($post->content)
            ->see($user->name);
    }
}

