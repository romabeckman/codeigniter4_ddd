<?php

namespace Quote\Application\Factory;

use \Quote\Domain\Contract\Factory\CustomerFactoryInterface;
use \Quote\Domain\Contract\Query\CustomerQueryInterface;
use \Quote\Domain\Entity\Customer;
use \Quote\Domain\ValueObject\Email;
use \Quote\Domain\ValueObject\Id;
use \Quote\Domain\ValueObject\Name;

/**
 * Description of MakeCustomerFromArryService
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class CustomerFactory implements CustomerFactoryInterface {

    public function createWith(array $data, CustomerQueryInterface $customerQuery): Customer {
        $id = new Id();
        $name = new Name($data['firstname'], $data['lastname']);
        $email = new Email($data['email'], $customerQuery);
        return new Customer($id, $name, $email);
    }

}
