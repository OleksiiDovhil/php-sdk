<?php declare(strict_types=1);

/**
 * This file is part of Smart Web Services package
 *
 * (c) Serdiuk Oleksandr <serdiuk@smartsender.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SmartSender\Interaction\Responses\Console\Tags;

use SmartSender\Common\Models\Console\Tag;
use SmartSender\Interaction\Responses\General\CollectResponse;

/**
 * Collect tags response.
 *
 * @see \SmartSender\Interaction\Endpoints\Console\Tags\CollectTagsEndpoint
 *
 * @author Serdiuk Oleksandr <serdiuk@smartsender.com>
 */
class CollectTagsResponse extends CollectResponse
{
    /**
     * @inheritDoc
     */
    protected function createModel(array $context): Tag
    {
        return Tag::create($context);
    }
}
