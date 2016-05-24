<?php

/*
 * (c) Darko Poposki <darko.poposki@sitewards.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Poposki\Blog\Domain;

class PostId
{
    /** @var string */
    private $id;

    /**
     * PostId constructor.
     *
     * @param string $id
     */
    public function __construct($id = null)
    {
        $this->id = (null === $id) ? uniqid() : $id;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
}
