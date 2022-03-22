<?php

namespace Quote\Application\Factory;

use \Quote\Domain\Contract\Factory\CustomerFactoryInterface;
use \Quote\Domain\Entity\Customer;
use \SharedResource\Domain\ValueObject\Email;
use \SharedResource\Domain\ValueObject\Id;
use \SharedResource\Domain\ValueObject\Name;

/**
 * Description of MakeCustomerFromArryService
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class CustomerFactory implements CustomerFactoryInterface {

    public function createWith(array $data): Customer {
        $id = new Id();
        $name = new Name($data['firstname'], $data['lastname']);
        $email = new Email($data['email']);
        return new Customer($id, $name, $email);
    }

}
