<?php

namespace Quote\Application\Facade;

use \Quote\Application\Factory\CustomerFactory;
use \Quote\Application\Factory\QuoteFactory;
use \Quote\Domain\Contract\Facade\CreateQuoteFacadeInterface;
use \Quote\Domain\Contract\Notification\NotificationInterface;
use \Quote\Domain\Contract\Query\CustomerQueryInterface;
use \Quote\Domain\Contract\Repository\CustomerRepositoryInterface;
use \Quote\Domain\Contract\Repository\ItemRepositoryInterface;
use \Quote\Domain\Contract\Repository\QuoteRepositoryInterface;
use \Quote\Domain\Entity\Customer;
use \Quote\Domain\Entity\Quote;

/**
 * Description of QuoteFacade
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class CreateQuoteFacade implements CreateQuoteFacadeInterface {

    public function makeCustomerFrom(array $data, CustomerQueryInterface $customerQuery): Customer {
        $makeCustomerFromArry = new CustomerFactory();
        return $makeCustomerFromArry->createWith($data['customer'], $customerQuery);
    }

    public function makeQuoteFrom(array $data, Customer $customer): Quote {
        $makeQuoteFromArray = new QuoteFactory();
        return $makeQuoteFromArray->createWith($data, $customer);
    }

    public function store(
            Quote $quote,
            CustomerRepositoryInterface $customerRepository,
            QuoteRepositoryInterface $quoteRepository,
            ItemRepositoryInterface $itemRepository
    ): void {
        $customerRepository->createCustomer($quote);
        $quoteRepository->createQuote($quote);
        $itemRepository->createItens($quote);
    }

    public function notifyCustomer(Quote $quote, NotificationInterface $notificationInterface): void {
        $notificationInterface->notify($quote);
    }

}
