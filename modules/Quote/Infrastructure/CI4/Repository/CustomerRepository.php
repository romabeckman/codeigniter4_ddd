<?php

namespace Quote\Infrastructure\CI4\Repository;

use \Quote\Domain\Contract\Repository\CustomerRepositoryInterface;
use \Quote\Domain\Entity\Quote;
use \Quote\Infrastructure\CI4\Model\CustomerModel;

/**
 * Description of CustomerRepository
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class CustomerRepository implements CustomerRepositoryInterface {

    public function createCustomer(Quote $quote): void {
        $customer = $quote->getCustomer();

        $customerModel = new CustomerModel();
        $customerModel->insert([
            'firstname' => $customer->getName()->getFirstname(),
            'lastname' => $customer->getName()->getLastname(),
            'email' => $customer->getEmail()->getEmail(),
        ]);

        $customer->replaceId($customerModel->insertID);
    }

}
