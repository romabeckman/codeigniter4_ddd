<?php

namespace Quote\Domain\Contract\Repository;

use \Quote\Domain\AggregateRoot\Quote;

/**
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
interface ItemRepositoryInterface {

    public function createItens(Quote $item): void;
}
