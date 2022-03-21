<?php

namespace Quote\Domain\Contract\Factory;

use \Quote\Domain\Entity\Customer;
use \Quote\Domain\Entity\Quote;

/**
 * Description of ParseArray
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
interface QuoteFactoryInterface {

    public function createWith(array $data, Customer $customer): Quote;

}
