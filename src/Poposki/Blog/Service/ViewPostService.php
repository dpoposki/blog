<?php

/*
 * (c) Darko Poposki <darko.poposki@sitewards.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Poposki\Blog\Service;

use Poposki\Blog\Domain\Post;
use Poposki\Blog\Domain\PostId;
use Poposki\Blog\Domain\PostDoesNotExistException;

class ViewPostService extends PostService
{
    /**
     * @param ViewPostRequest $request
     *
     * @return Post
     * @throws PostDoesNotExistException
     */
    public function execute(ViewPostRequest $request)
    {
        $post = $this->repository->findById(new PostId($request->getId()));

        if (null === $post) {
            throw new PostDoesNotExistException();
        }

        return $post;
    }
}
