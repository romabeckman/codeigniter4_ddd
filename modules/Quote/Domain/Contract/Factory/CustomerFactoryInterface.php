<?php

namespace Quote\Domain\Contract\Factory;

use \Quote\Domain\Entity\Customer;

/**
 * Description of MakeCustomerFromArryService
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
interface CustomerFactoryInterface {

    public function createWith(array $data): Customer;

}
