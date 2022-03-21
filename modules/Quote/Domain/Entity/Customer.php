<?php

namespace Quote\Domain\Entity;

use \Quote\Domain\Contract\Query\CustomerQueryInterface;
use \Quote\Domain\Traits\IdTrait;
use \Quote\Domain\ValueObject\Email;
use \Quote\Domain\ValueObject\Id;
use \Quote\Domain\ValueObject\Name;

/**
 * Description of Customer
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class Customer {

    use IdTrait;

    private Id $id;
    private Name $name;
    private Email $email;

    public function __construct(Id $id, Name $name, Email $email) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function getId(): Id {
        return $this->id;
    }

    public function getName(): Name {
        return $this->name;
    }

    public function getEmail(): Email {
        return $this->email;
    }

}
