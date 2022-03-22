<?php

namespace Quote\Domain\Entity;

use \SharedResource\Domain\Entity\EntityAbstract;
use \SharedResource\Domain\ValueObject\Email;
use \SharedResource\Domain\ValueObject\Id;
use \SharedResource\Domain\ValueObject\Name;

/**
 * Description of Customer
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class Customer extends EntityAbstract {

    private Id $id;
    private Name $name;
    private Email $email;

    public function __construct(Id $id, Name $name, Email $email) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function getName(): Name {
        return $this->name;
    }

    public function getEmail(): Email {
        return $this->email;
    }

}
