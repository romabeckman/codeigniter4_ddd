<?php

namespace Quote\Application\UserCase;

use \Quote\Domain\Contract\Factory\CustomerFactoryInterface;
use \Quote\Domain\Contract\Factory\QuoteFactoryInterface;
use \Quote\Domain\Contract\Repository\CustomerRepositoryInterface;
use \Quote\Domain\Contract\Repository\ItemRepositoryInterface;
use \Quote\Domain\Contract\Repository\QuoteRepositoryInterface;
use \Quote\Domain\Contract\Service\ValidateEmailServiceInterface;

/**
 * Description of StoreQuote
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class CreateQuoteUserCase {

    public function __construct(
            private CustomerRepositoryInterface $customerRepository,
            private QuoteRepositoryInterface $quoteRepository,
            private ItemRepositoryInterface $itemRepository,
            private CustomerFactoryInterface $customerFactory,
            private QuoteFactoryInterface $quoteFactory,
            private ValidateEmailServiceInterface $validateEmailService
    ) {}

    public function handler(array $data): void {
        $customer = $this->customerFactory->createWith($data['customer']);
        $quote = $this->quoteFactory->createWith($data, $customer);

        $this->validateEmailService->valid($customer->getEmail());

        $this->customerRepository->createCustomer($quote);
        $this->quoteRepository->createQuote($quote);
        $this->itemRepository->createItens($quote);
    }

}
