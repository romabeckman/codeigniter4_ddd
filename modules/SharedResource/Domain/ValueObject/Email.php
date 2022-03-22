<?php

namespace SharedResource\Domain\ValueObject;

/**
 * Description of Name
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class Email extends ValueObjectAbstract {

    private string $email;

    public function __construct(string $email) {
        $this->email = $email;
    }

    public function getEmail(): string {
        return $this->email;
    }

}
