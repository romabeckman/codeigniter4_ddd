<?php

namespace Quote\Domain\ValueObject;

/**
 * Description of Status
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class Status {

    public const QUOTE_STATUS_APPROVED = 'approved';
    public const QUOTE_STATUS_PENDING = 'pending';
    public const QUOTE_STATUS_REJECT = 'rejected';

    public const QUOTE_STATUS_DEFAULT = self::QUOTE_STATUS_PENDING;

    private string $status;

    public function __construct() {
        $this->status = static::QUOTE_STATUS_DEFAULT;
    }

    private function isStatusValid(string $status): bool {
        return ($status == static::QUOTE_STATUS_APPROVED || $status == static::QUOTE_STATUS_PENDING || $status == static::QUOTE_STATUS_REJECT);
    }

    public function setStatus(string $status) {
        if ($this->isStatusValid($status) === false) {
            throw new OutOfRangeException('Status is not accepted');
        }

        $this->status = $status;
        return $this;
    }

    public function getStatus(): string {
        return $this->status;
    }

}
