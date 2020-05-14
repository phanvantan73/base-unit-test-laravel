<?php

namespace Tests\Unit\Models;

use App\Models\Post;
use App\Models\User;

class UserTest extends ModelTestCase
{
    /**
     * Test configurations.
     *
     * @test
     *
     * @return void
     */
    public function userHasConfigurations()
    {
        $user = new User;
        $this->runConfigurationAssertions(
            $user,
            [
                'name',
                'email',
                'password',
            ],
            [
                'password',
                'remember_token',
            ]
        );
    }

    /**
     * Test user has many post.
     *
     * @test
     *
     * @return void
     */
    public function userHasManyPost()
    {
        $user = new User;
        $posts = $user->posts();
        $this->assertHasManyRelation($posts, $user, new Post);
    }
}
