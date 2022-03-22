<?php

namespace Quote\Domain\Contract\Factory;

use \Quote\Domain\Entity\Customer;
use \Quote\Domain\AggregateRoot\Quote;

/**
 * Description of ParseArray
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
interface QuoteFactoryInterface {

    public function createWith(array $data, Customer $customer): Quote;

}
