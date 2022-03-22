<?php

namespace SharedResource\Domain\ValueObject;

/**
 * Description of Name
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class Name extends ValueObjectAbstract {

    private string $firstname;
    private string $lastname;

    public function __construct(string $firstname, string $lastname) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    public function getFirstname(): string {
        return $this->firstname;
    }

    public function getLastname(): string {
        return $this->lastname;
    }

}
