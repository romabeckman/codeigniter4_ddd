<?php

namespace Quote\Application\Service;

use \Quote\Domain\Contract\Query\CustomerQueryInterface;
use \Quote\Domain\Contract\Service\ValidateEmailServiceInterface;
use \Quote\Domain\ValueObject\Email;
use \RuntimeException;

/**
 * Description of ValidateEmailService
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class ValidateEmailService implements ValidateEmailServiceInterface {

    private CustomerQueryInterface $customerQuery;

    public function __construct(CustomerQueryInterface $customerQuery) {
        $this->customerQuery = $customerQuery;
    }

    public function valid(Email $email): void {
        if ($this->customerQuery->existsEmail($email->getEmail())) {
            throw new RuntimeException('Email already exist');
        }
    }

}
