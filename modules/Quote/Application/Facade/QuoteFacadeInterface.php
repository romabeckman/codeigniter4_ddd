<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPInterface.php to edit this template
 */

namespace Quote\Application\Facade;

use \Quote\Domain\Entity\Customer;
use \Quote\Domain\Entity\Quote;
use \Quote\Domain\Query\CustomerQueryInterface;
use \Quote\Domain\Repository\CustomerRepositoryInterface;
use \Quote\Domain\Repository\ItemRepositoryInterface;
use \Quote\Domain\Repository\QuoteRepositoryInterface;

/**
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
interface QuoteFacadeInterface {

    public function newCustomer(array $data, CustomerQueryInterface $customerQuery): Customer;

    public function newQuote(array $data): Quote;

    public function addItens(Quote $quote, array $data): void;

    public function createNew(
            Quote $quote,
            CustomerRepositoryInterface $customerRepository,
            QuoteRepositoryInterface $quoteRepository,
            ItemRepositoryInterface $itemRepository
    ): void;
}
