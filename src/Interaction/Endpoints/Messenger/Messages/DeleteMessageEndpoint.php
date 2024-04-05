<?php declare(strict_types=1);

/**
 * This file is part of Smart Web Services package
 *
 * (c) Serdiuk Oleksandr <serdiuk@smartsender.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SmartSender\Interaction\Endpoints\Messenger\Messages;

use SmartSender\Interaction\Endpoints\DataEndpoint;
use SmartSender\Interaction\Responses\Messenger\Messages\DeleteMessageResponse;
use SmartSender\Interaction\Responses\PendingResponse;
use SmartSender\Specifications\Request as RequestSpecification;

/**
 * Send message endpoint.
 *
 * @author Serdiuk Oleksandr <serdiuk@smartsender.com>
 */
class DeleteMessageEndpoint extends DataEndpoint
{
    /**
     * @var int
     */
    private int $gateId;

    /**
     * Setup contact identifier and context.
     *
     * @param int   $gateId
     * @param array $context
     */
    public function __construct(int $gateId, array $context)
    {
        $this->gateId = $gateId;

        // boot ...
        parent::__construct($context);
    }

    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return sprintf('gates/%s/messages', $this->gateId);
    }

    /**
     * @inheritDoc
     */
    public function getMethod(): string
    {
        return RequestSpecification::METHOD_DELETE;
    }

    /**
     * @inheritDoc
     */
    public function getAdapted(PendingResponse $response): DeleteMessageResponse
    {
        return new DeleteMessageResponse($response);
    }
}
