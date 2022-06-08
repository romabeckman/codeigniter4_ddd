<?php

namespace SharedResource\Domain\ValueObject;

use \Quote\Domain\Exception\InvalidEmailException;

/**
 * Description of Name
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class Email extends ValueObjectAbstract {

    private string $email;

    public function __construct(string $email) {
        if (static::isValid($email) === FALSE) {
            throw new InvalidEmailException('Email "' . $email . '" is not valid.');
        }

        $this->email = $email;
    }

    public function getEmail(): string {
        return $this->email;
    }

    static public function isValid(string $email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

}
