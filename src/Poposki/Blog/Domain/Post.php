<?php

/*
 * (c) Darko Poposki <darko.poposki@sitewards.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Poposki\Blog\Domain;

class Post
{
    /** @var PostId */
    private $postId;

    /** @var string */
    private $title;

    /** @var string */
    private $content;

    /**
     * Post constructor.
     *
     * @param PostId $postId
     * @param string $title
     * @param string $content
     */
    public function __construct(PostId $postId, $title, $content)
    {
        $this->postId  = $postId;
        $this->title   = $title;
        $this->content = $content;
    }

    /**
     * @return PostId
     */
    public function getId()
    {
        return $this->postId;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        if (!$title = trim($title)) {
            throw new \InvalidArgumentException('Title must not be empty');
        }

        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        if (!$content = trim($content)) {
            throw new \InvalidArgumentException('Content must not be empty');
        }

        $this->content = $content;
    }
}
