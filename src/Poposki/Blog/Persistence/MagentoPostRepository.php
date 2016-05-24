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

class MagentoPostRepository implements PostRepositoryInterface
{
    private $mapper;

    public function __construct($mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * {@inheritdoc}
     */
    public function findById(PostId $postId)
    {
        $post = $this->mapper->load($postId->getId());

        if (null === $post->getId()) {
            return null;
        }

        return new Post(
            new PostId($post->getId()),
            $post->getTitle(),
            $post->getContent()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function findAll()
    {
        $collection = $this->mapper->getCollection();

        $posts = [];

        foreach ($collection->getItems() as $post) {
            $posts[] = new Post(
                new PostId($post->getId()),
                $post->getTitle(),
                $post->getContent()
            );
        }

        return $posts;
    }

    /**
     * {@inheritdoc}
     */
    public function save(Post $post)
    {
        // TODO
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        return new PostId();
    }
}
