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

class InMemoryPostRepository implements PostRepositoryInterface
{
    /** @var Post[] */
    private $posts = [];

    /**
     * InMemoryPostRepository constructor.
     */
    public function __construct()
    {
        $this->posts[] = new Post(
            new PostId(), 'Title 1', 'Content 1'
        );
        $this->posts[] = new Post(
            new PostId(), 'Title 2', 'Content 2'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function findById(PostId $postId)
    {
        if (isset($this->posts[$postId->getId()])) {
            return $this->posts[$postId->getId()];
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function findAll()
    {
        return $this->posts;
    }

    /**
     * {@inheritdoc}
     */
    public function save(Post $post)
    {
        $this->posts[$post->getId()->getId()] = $post;
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        return new PostId();
    }
}
