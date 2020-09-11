<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Response;

use Etrias\PayvisionConnector\Type\ResultTrait;

class ErrorResponse
{
    use ResultTrait;
    use GenericHeaderTrait;

    /** @var null|ErrorBody */
    protected $body;

    public function getBody(): ErrorBody
    {
        return $this->body ?? ($this->body = new ErrorBody());
    }

    public function setBody(ErrorBody $body): self
    {
        $this->body = $body;

        return $this;
    }

    public function toExceptionMessage(): string
    {
        $error = $this->getBody()->getError();
        $message = $this->description ?? 'An unknown error occurred.';
        $labels = array_filter(['result' => $this->result, 'error_code' => $error ? $error->getCode() : null]);

        if ($error) {
            $labels['description'] = $message;
            $message = $error->getDetailedMessage() ?? $error->getMessage() ?? $message;
        }

        if ($labels) {
            $message .= ' ('.json_encode($labels).')';
        }

        return $message;
    }
}
