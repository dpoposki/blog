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

class PdoPostRepository implements PostRepositoryInterface
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * {@inheritdoc}
     */
    public function findById(PostId $postId)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM post WHERE post_id = ?');
        $stmt->execute([$postId->getId()]);

        $data = $stmt->fetch();

        if (null === $data) {
            return null;
        }

        return new Post(
            new PostId($data['post_id']),
            $data['title'],
            $data['content']
        );
    }

    /**
     * {@inheritdoc}
     */
    public function findAll()
    {
        $stmt = $this->pdo->query('SELECT * FROM post');
        $stmt->execute();

        $data = $stmt->fetchAll();

        if (null === $data) {
            return null;
        }

        $posts = [];

        foreach ($data as $post) {
            $posts[] = new Post(
                new PostId($post['post_id']),
                $post['title'],
                $post['content']
            );
        }

        return $posts;
    }

    /**
     * {@inheritdoc}
     */
    public function save(Post $post)
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO 
                post (post_id, title, content) 
             VALUES (?, ?, ?) 
             ON DUPLICATE KEY UPDATE 
                title = VALUES(title), content = VALUES(content)'
        );
        $stmt->execute([$post->getId()->getId(), $post->getTitle(), $post->getContent()]);
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        return new PostId();
    }
}
