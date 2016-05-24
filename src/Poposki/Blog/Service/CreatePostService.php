<?php

/*
 * (c) Darko Poposki <darko.poposki@sitewards.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Poposki\Blog\Service;

use Poposki\Blog\Domain\Post;

class CreatePostService extends PostService
{
    /**
     * @param CreatePostRequest $request
     */
    public function execute(CreatePostRequest $request)
    {
        $this->repository->save(
            new Post(
                $this->repository->next(),
                $request->getTitle(),
                $request->getContent()
            )
        );
    }
}
