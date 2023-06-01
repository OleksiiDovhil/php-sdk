<?php declare(strict_types=1);

/**
 * This file is part of Smart Web Services package
 *
 * (c) Serdiuk Oleksandr <serdiuk@smartsender.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SmartSender\Interaction\Responses\Console\Contacts\Selection;

use SmartSender\Common\Models\Messenger\Funnel;
use SmartSender\Interaction\Responses\General\CollectResponse;

/**
 * Collect contact funnels response.
 *
 * @see \SmartSender\Interaction\Endpoints\Console\Contacts\Selection\Funnels\CollectContactFunnelsEndpoint
 *
 * @author Serdiuk Oleksandr <serdiuk@smartsender.com>
 */
class CollectContactFunnelsResponse extends CollectResponse
{
    /**
     * @inheritDoc
     */
    protected function createModel(array $context): Funnel
    {
        return Funnel::create($context);
    }
}
