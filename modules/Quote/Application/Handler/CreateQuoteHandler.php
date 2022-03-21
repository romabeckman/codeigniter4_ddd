<?php

namespace Quote\Application\Handler;

use \Quote\Domain\Contract\Facade\CreateQuoteFacadeInterface;
use \Quote\Domain\Contract\Query\CustomerQueryInterface;
use \Quote\Domain\Contract\Repository\CustomerRepositoryInterface;
use \Quote\Domain\Contract\Repository\ItemRepositoryInterface;
use \Quote\Domain\Contract\Repository\QuoteRepositoryInterface;

/**
 * Description of StoreQuote
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class CreateQuoteHandler {

    private CreateQuoteFacadeInterface $quoteFacade;
    private CustomerRepositoryInterface $customerRepository;
    private QuoteRepositoryInterface $quoteRepository;
    private ItemRepositoryInterface $itemRepository;
    private CustomerQueryInterface $customerQueryInterface;

    public function __construct(
            CreateQuoteFacadeInterface $quoteFacade,
            CustomerRepositoryInterface $customerRepository,
            QuoteRepositoryInterface $quoteRepository,
            ItemRepositoryInterface $itemRepository,
            CustomerQueryInterface $customerQueryInterface
    ) {
        $this->quoteFacade = $quoteFacade;
        $this->customerRepository = $customerRepository;
        $this->quoteRepository = $quoteRepository;
        $this->itemRepository = $itemRepository;
        $this->customerQueryInterface = $customerQueryInterface;
    }

    public function handler(array $data) {
        $customer = $this->quoteFacade->makeCustomerFrom($data, $this->customerQueryInterface);
        $quote = $this->quoteFacade->makeQuoteFrom($data, $customer);

        $this->quoteFacade
                ->store(
                        $quote,
                        $this->customerRepository,
                        $this->quoteRepository,
                        $this->itemRepository
        );

//        $this->quoteFacade->notifyCustomer($quote);
    }

}
