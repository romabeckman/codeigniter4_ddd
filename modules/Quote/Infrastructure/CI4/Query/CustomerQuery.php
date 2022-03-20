<?php

namespace Quote\Infrastructure\CI4\Query;

use \Quote\Domain\Query\CustomerQueryInterface;
use \Quote\Infrastructure\CI4\Model\CustomerModel;

/**
 * Description of CustomerQuery
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class CustomerQuery implements CustomerQueryInterface {

    public function existsEmail(string $email): bool {
        $customerModel = new CustomerModel();
        $customer = $customerModel
                ->where('email', $email)
                ->first();

        return !empty($customer);
    }

}
