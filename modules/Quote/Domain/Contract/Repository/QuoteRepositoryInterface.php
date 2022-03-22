<?php

namespace Quote\Domain\Contract\Repository;

use \Quote\Domain\AggregateRoot\Quote;

/**
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
interface QuoteRepositoryInterface {

    public function createQuote(Quote $quote): void;
}
