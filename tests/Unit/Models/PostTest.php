<?php

namespace Tests\Unit\Models;

use App\Models\Post;
use App\Models\User;

class PostTest extends ModelTestCase
{
    /**
     * Test configurations.
     *
     * @test
     *
     * @return void
     */
    public function postHasConfigurations()
    {
        $post = new Post;
        $this->runConfigurationAssertions(
            $post,
            [
                'user_id',
                'content',
            ]
        );
    }

    /**
     * Test post belong to user.
     *
     * @test
     *
     * @return void
     */
    public function postBelongToUser()
    {
        $post = new Post;
        $user = $post->user();
        $this->assertBelongsToRelation($user, $post, new User, 'user_id');
    }
}
