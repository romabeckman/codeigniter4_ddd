<?php

namespace Quote\Domain\ValueObject;

use \Quote\Domain\Contract\Query\CustomerQueryInterface;
use \RuntimeException;

/**
 * Description of Name
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class Email {

    private string $email;
    private CustomerQueryInterface $customerQuery;

    public function __construct(string $email, CustomerQueryInterface $customerQuery) {
        $this->customerQuery = $customerQuery;
        $this->setEmail($email);
    }

    private function setEmail(string $email): void {
        if ($this->customerQuery->existsEmail($email)) {
            throw new RuntimeException('Email already exist');
        }

        $this->email = $email;
    }

    public function getEmail(): string {
        return $this->email;
    }

}
