<?php

namespace Quote\Domain\Contract\Facade;

use \Quote\Domain\Contract\Notification\NotificationInterface;
use \Quote\Domain\Contract\Query\CustomerQueryInterface;
use \Quote\Domain\Contract\Repository\CustomerRepositoryInterface;
use \Quote\Domain\Contract\Repository\ItemRepositoryInterface;
use \Quote\Domain\Contract\Repository\QuoteRepositoryInterface;
use \Quote\Domain\Entity\Customer;
use \Quote\Domain\Entity\Quote;


/**
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
interface CreateQuoteFacadeInterface {

    public function makeCustomerFrom(array $data, CustomerQueryInterface $customerQuery): Customer;

    public function makeQuoteFrom(array $data, Customer $customer): Quote;

    public function store(
            Quote $quote,
            CustomerRepositoryInterface $customerRepository,
            QuoteRepositoryInterface $quoteRepository,
            ItemRepositoryInterface $itemRepository
    ): void;

    public function notifyCustomer(Quote $quote, NotificationInterface $notificationInterface): void;
}
