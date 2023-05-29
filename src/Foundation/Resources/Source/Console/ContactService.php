<?php declare(strict_types=1);

/**
 * This file is part of Smart Web Services package
 *
 * (c) Serdiuk Oleksandr <serdiuk.oleksandr@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SmartSender\Foundation\Resources\Source\Console;

use SmartSender\Foundation\Service;
use SmartSender\Interaction\Endpoints\Console\Contacts\SearchContactsEndpoint;
use SmartSender\Interaction\Endpoints\Console\Contacts\CollectContactsEndpoint;
use SmartSender\Interaction\Responses\Console\Contacts\CollectContactsResponse;
use SmartSender\Foundation\Resources\Source\Console\Contacts\SelectedContactService;

/**
 * Contact service.
 *
 * @author Serdiuk Oleksandr <serdiuk.oleksandr@gmail.com>
 */
class ContactService extends Service
{
    /**
     * Select given contact identifier.
     *
     * @param int $contactId
     *
     * @return \SmartSender\Foundation\Resources\Source\Console\Contacts\SelectedContactService
     */
    public function select(int $contactId): SelectedContactService
    {
        return new SelectedContactService($this->client, $contactId);
    }

    /**
     * Search contacts.
     *
     * @param array $resource
     *
     * @return \SmartSender\Interaction\Responses\Console\Contacts\CollectContactsResponse
     *
     * @throws \SmartSender\Exceptions\BadResponseException
     * @throws \SmartSender\Exceptions\InvalidResponseException
     */
    public function search(array $resource): CollectContactsResponse
    {
        return $this->createCallee()->call(new SearchContactsEndpoint($resource));
    }

    /**
     * Retrieve contacts.
     *
     * @param array $resource
     *
     * @return \SmartSender\Interaction\Responses\Console\Contacts\CollectContactsResponse
     *
     * @throws \SmartSender\Exceptions\BadResponseException
     * @throws \SmartSender\Exceptions\InvalidResponseException
     */
    public function collect(array $resource): CollectContactsResponse
    {
        return $this->createCallee()->call(new CollectContactsEndpoint($resource));
    }
}
