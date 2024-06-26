<?php declare(strict_types=1);

/**
 * This file is part of Smart Web Services package
 *
 * (c) Serdiuk Oleksandr <serdiuk@smartsender.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SmartSender\Foundation\Resources\Source\Messenger;

use SmartSender\Exceptions\BadResponseException;
use SmartSender\Exceptions\InvalidResponseException;
use SmartSender\Foundation\Service;
use SmartSender\Interaction\Endpoints\Messenger\Messages\DeleteMessageEndpoint;
use SmartSender\Interaction\Endpoints\Messenger\Messages\EditMessageEndpoint;
use SmartSender\Interaction\Endpoints\Messenger\Messages\SendMessageEndpoint;
use SmartSender\Interaction\Responses\Messenger\Messages\DeleteMessageResponse;
use SmartSender\Interaction\Responses\Messenger\Messages\EditMessageResponse;
use SmartSender\Interaction\Responses\Messenger\Messages\SendMessageResponse;
use SmartSender\Interaction\Endpoints\Messenger\Messages\CollectMessagesEndpoint;
use SmartSender\Interaction\Responses\Messenger\Messages\CollectMessagesResponse;
use SmartSender\Interaction\Endpoints\Messenger\Messages\CollectChatMessagesEndpoint;

/**
 * This API allows you to receive / send a message to a contact and also receive
 * the entire history of correspondence with the selected contact.
 *
 * @link https://smartsendereu.atlassian.net/wiki/spaces/docsru/pages/1676575830/Messages+API+-+en
 *
 * @author Serdiuk Oleksandr <serdiuk@smartsender.com>
 */
class MessageService extends Service
{
    /**
     * Allows you to send a message to a contact (with the ability to select a channel).
     *
     * @param int   $contactId
     * @param array $resource
     *
     * @return \SmartSender\Interaction\Responses\Messenger\Messages\SendMessageResponse
     *
     * @throws \SmartSender\Exceptions\BadResponseException
     * @throws \SmartSender\Exceptions\InvalidResponseException
     */
    public function send(int $contactId, array $resource): SendMessageResponse
    {
        return $this->createCallee()->call(new SendMessageEndpoint($contactId, $resource));
    }

    /**
     * @throws InvalidResponseException
     * @throws BadResponseException
     */
    public function edit(int $gateId, array $resource): EditMessageResponse
    {
        return $this->createCallee()->call(new EditMessageEndpoint($gateId, $resource));
    }

    /**
     * @param int $gateId
     * @param array $resource
     *
     * @return DeleteMessageResponse
     *
     * @throws BadResponseException
     * @throws InvalidResponseException
     */
    public function delete(int $gateId, array $resource): DeleteMessageResponse
    {
        return $this->createCallee()->call(new DeleteMessageEndpoint($gateId, $resource));
    }

    /**
     * Allows you to receive a message through a contact.
     *
     * @param int   $contactId
     * @param array $resource
     *
     * @return \SmartSender\Interaction\Responses\Messenger\Messages\CollectMessagesResponse
     *
     * @throws \SmartSender\Exceptions\BadResponseException
     * @throws \SmartSender\Exceptions\InvalidResponseException
     */
    public function collect(int $contactId, array $resource): CollectMessagesResponse
    {
        return $this->createCallee()->call(new CollectMessagesEndpoint($contactId, $resource));
    }

    /**
     * Allows you to receive a message via chat.
     *
     * @param int   $chatId
     * @param array $resource
     *
     * @return \SmartSender\Interaction\Responses\Messenger\Messages\CollectMessagesResponse
     *
     * @throws \SmartSender\Exceptions\BadResponseException
     * @throws \SmartSender\Exceptions\InvalidResponseException
     */
    public function collectFromChat(int $chatId, array $resource): CollectMessagesResponse
    {
        return $this->createCallee()->call(new CollectChatMessagesEndpoint($chatId, $resource));
    }
}
