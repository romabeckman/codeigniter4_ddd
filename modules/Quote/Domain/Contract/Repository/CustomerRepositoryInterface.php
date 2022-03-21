<?php

namespace Quote\Domain\Contract\Repository;

use \Quote\Domain\Entity\Quote;

/**
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
interface CustomerRepositoryInterface {

    public function createCustomer(Quote $customer): void;
}
