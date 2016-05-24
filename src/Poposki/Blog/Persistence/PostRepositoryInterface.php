<?php

/*
 * (c) Darko Poposki <darko.poposki@sitewards.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Poposki\Blog\Persistence;

use Poposki\Blog\Domain\Post;
use Poposki\Blog\Domain\PostId;

interface PostRepositoryInterface
{
    /**
     * @param PostId $postId
     * @return Post
     */
    public function findById(PostId $postId);

    /**
     * @return Post[]
     */
    public function findAll();

    /**
     * @param Post $post
     * @return void
     */
    public function save(Post $post);

    /**
     * @return PostId
     */
    public function next();
}
