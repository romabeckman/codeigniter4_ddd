<?php

namespace Quote\Application\Handler;

use \Quote\Application\Facade\QuoteFacadeInterface;
use \Quote\Domain\Query\CustomerQueryInterface;
use \Quote\Domain\Repository\CustomerRepositoryInterface;
use \Quote\Domain\Repository\ItemRepositoryInterface;
use \Quote\Domain\Repository\QuoteRepositoryInterface;

/**
 * Description of StoreQuote
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class QuoteStoreHandler {

    private QuoteFacadeInterface $quoteFacade;
    private CustomerRepositoryInterface $customerRepository;
    private QuoteRepositoryInterface $quoteRepository;
    private ItemRepositoryInterface $itemRepository;
    private CustomerQueryInterface $customerQueryInterface;

    public function __construct(QuoteFacadeInterface $quoteFacade, CustomerRepositoryInterface $customerRepository, QuoteRepositoryInterface $quoteRepository, ItemRepositoryInterface $itemRepository, CustomerQueryInterface $customerQueryInterface) {
        $this->quoteFacade = $quoteFacade;
        $this->customerRepository = $customerRepository;
        $this->quoteRepository = $quoteRepository;
        $this->itemRepository = $itemRepository;
        $this->customerQueryInterface = $customerQueryInterface;
    }

    public function handler(array $data) {
        $customer = $this->quoteFacade->newCustomer($data, $this->customerQueryInterface);
        $quote = $this->quoteFacade->newQuote($data);

        $quote->setCustomer($customer);
        $this->quoteFacade->addItens($quote, $data);

        $this->quoteFacade->createNew(
                $quote,
                $this->customerRepository,
                $this->quoteRepository,
                $this->itemRepository
        );
    }

}
