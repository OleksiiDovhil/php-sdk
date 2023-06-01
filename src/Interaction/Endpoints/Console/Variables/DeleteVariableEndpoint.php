<?php declare(strict_types=1);

/**
 * This file is part of Smart Web Services package
 *
 * (c) Serdiuk Oleksandr <serdiuk@smartsender.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SmartSender\Interaction\Endpoints\Console\Variables;

use SmartSender\Interaction\Responses\PendingResponse;
use SmartSender\Contracts\Endpoint as EndpointContract;
use SmartSender\Interaction\Responses\General\StateResponse;
use SmartSender\Specifications\Request as RequestSpecification;

/**
 * Delete variable endpoint.
 *
 * @author Serdiuk Oleksandr <serdiuk@smartsender.com>
 */
class DeleteVariableEndpoint implements EndpointContract
{
    /**
     * @var int
     */
    private int $variableId;

    /**
     * Setup variable identifier.
     *
     * @param int $variableId
     */
    public function __construct(int $variableId)
    {
        $this->variableId = $variableId;
    }

    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return sprintf('variables/%s', $this->variableId);
    }

    /**
     * @inheritDoc
     */
    public function getOptions(): array
    {
        return [];
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
    public function getAdapted(PendingResponse $response): StateResponse
    {
        return new StateResponse($response);
    }

}
