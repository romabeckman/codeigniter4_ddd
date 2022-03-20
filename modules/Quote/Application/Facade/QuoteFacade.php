<?php

namespace Quote\Application\Facade;

use \Quote\Domain\Entity\Customer;
use \Quote\Domain\Entity\Quote;
use \Quote\Domain\Facade\QuoteFacadeInterface;
use \Quote\Domain\Query\CustomerQueryInterface;
use \Quote\Domain\Repository\CustomerRepositoryInterface;
use \Quote\Domain\Repository\ItemRepositoryInterface;
use \Quote\Domain\Repository\QuoteRepositoryInterface;

/**
 * Description of QuoteFacade
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class QuoteFacade implements QuoteFacadeInterface {

    public function addItens(Quote $quote, array $data): void {
        Quote::addItensFromArray($quote, $data['itens']);
    }

    public function newCustomer(array $data, CustomerQueryInterface $customerQuery): Customer {
        return Customer::createInstanceFromArray($data['customer'], $customerQuery);
    }

    public function newQuote(array $data): Quote {
        return Quote::createInstanceFromArray($data['quote']);
    }

    public function createNew(Quote $quote, CustomerRepositoryInterface $customerRepository, QuoteRepositoryInterface $quoteRepository, ItemRepositoryInterface $itemRepository): void {
        $customerRepository->createCustomer($quote);
        $quoteRepository->createQuote($quote);
        $itemRepository->createItens($quote);
    }


}
