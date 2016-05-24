<?php

/*
 * (c) Darko Poposki <darko.poposki@sitewards.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Poposki\Blog\Service;

use Poposki\Blog\Domain\Post;

class ViewPostsService extends PostService
{
    /**
     * @return Post[]
     */
    public function execute()
    {
        return $this->repository->findAll();
    }
}
