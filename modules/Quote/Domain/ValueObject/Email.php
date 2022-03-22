<?php

namespace Quote\Domain\ValueObject;

use \Quote\Domain\Contract\Service\ValidateEmailServiceInterface;
use \RuntimeException;

/**
 * Description of Name
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class Email {

    private string $email;

    public function __construct(string $email, ValidateEmailServiceInterface $validateEmailService) {
        $this->email = $email;
        $validateEmailService->valid($this);
    }

    public function getEmail(): string {
        return $this->email;
    }

}
