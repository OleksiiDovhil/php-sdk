<?php declare(strict_types=1);

/**
 * This file is part of Smart Web Services package
 *
 * (c) Serdiuk Oleksandr <serdiuk.oleksandr@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SmartSender\Interaction\Responses\Console\Contacts;

use SmartSender\Common\Models\Console\Contact;
use SmartSender\Interaction\Responses\General\CollectResponse;

/**
 * Collect contacts response.
 *
 * @author Serdiuk Oleksandr <serdiuk.oleksandr@gmail.com>
 */
class CollectContactsResponse extends CollectResponse
{
    /**
     * @inheritDoc
     */
    protected function createModel(array $context): Contact
    {
        return Contact::create($context);
    }
}
