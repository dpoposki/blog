<?php

/*
 * (c) Darko Poposki <darko.poposki@sitewards.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Poposki\Blog\Service;

use Poposki\Blog\Persistence\PostRepositoryInterface;

abstract class PostService
{
    /** @var PostRepositoryInterface */
    protected $repository;

    /**
     * PostService constructor.
     * 
     * @param PostRepositoryInterface $repository
     */
    public function __construct(PostRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
