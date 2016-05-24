<?php

/*
 * (c) Darko Poposki <darko.poposki@sitewards.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Poposki\Blog\Service;

use Poposki\Blog\Domain\PostId;
use Poposki\Blog\Domain\PostDoesNotExistException;

class EditPostService extends PostService
{
    /**
     * @param EditPostRequest $request
     * @throws PostDoesNotExistException
     */
    public function execute(EditPostRequest $request)
    {
        $post = $this->repository->findById(new PostId($request->getId()));

        if (null === $post) {
            throw new PostDoesNotExistException();
        }

        $post->setTitle($request->getTitle());
        $post->setContent($request->getContent());

        $this->repository->save($post);
    }
}
