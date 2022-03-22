<?php

namespace Tests\Unit\Quote;

use \CodeIgniter\Test\CIUnitTestCase;
use \Quote\Application\Facade\CreateQuoteFacade;
use \Quote\Application\Factory\CustomerFactory;
use \Quote\Application\Factory\QuoteFactory;
use \Quote\Application\Service\ValidateEmailService;
use \Quote\Application\UserCase\CreateQuoteUserCase;
use \Quote\Infrastructure\CI4\Query\CustomerQuery;
use \Quote\Infrastructure\CI4\Repository\CustomerRepository;
use \Quote\Infrastructure\CI4\Repository\ItemRepository;
use \Quote\Infrastructure\CI4\Repository\QuoteRepository;
use \RuntimeException;

class StoreHandlerTest extends CIUnitTestCase {

    private CreateQuoteUserCase $createQuoteUserCase;
    private CustomerRepository $customerRepository;
    private QuoteRepository $quoteRepository;
    private ItemRepository $itemRepository;
    private CustomerFactory $customerFactory;
    private QuoteFactory $quoteFactory;
    private ValidateEmailService $validateEmailService;
    private array $data;

    public function setUp(): void {
        $customerQuery = new CustomerQuery();
        $this->customerRepository = new CustomerRepository();
        $this->quoteRepository = new QuoteRepository();
        $this->itemRepository = new ItemRepository();
        $this->customerFactory = new CustomerFactory();
        $this->quoteFactory = new QuoteFactory();
        $this->validateEmailService = new ValidateEmailService($customerQuery);

        $this->createQuoteUserCase = new CreateQuoteUserCase(
                $this->customerRepository,
                $this->quoteRepository,
                $this->itemRepository,
                $this->customerFactory,
                $this->quoteFactory,
                $this->validateEmailService
        );

        $id = uniqid();

        $this->data = [
            'customer' => [
                'firstname' => 'Mark_' . $id,
                'lastname' => 'Smith_' . $id,
                'email' => $id . '@mytest.com',
            ],
            'quote' => [
                'valid_at' => date('Y-m-d'),
            ],
            'itens' => [
                0 => [
                    'product' => 'Product A - ' . $id,
                    'amount' => '10.50',
                    'quantity' => '5',
                ],
                1 => [
                    'product' => 'Product B - ' . $id,
                    'amount' => random_int(1, 1000) / random_int(1, 100),
                    'quantity' => random_int(1, 100),
                ],
            ],
        ];
    }

    public function testStore() {
        $this->createQuoteUserCase->handler($this->data);
        $this->assertTrue(TRUE);
    }

    public function testUniqueEmailStore() {
        $this->expectException(RuntimeException::class);
        $this->createQuoteUserCase->handler($this->data);
        $this->createQuoteUserCase->handler($this->data);
    }

    public function testCustomerFactory() {
        $customer = $this->customerFactory->createWith($this->data['customer'], $this->validateEmailService);
        $this->assertEquals($this->data['customer']['firstname'], $customer->getName()->getFirstname());
        $this->assertEquals($this->data['customer']['lastname'], $customer->getName()->getLastname());
        $this->assertEquals($this->data['customer']['email'], $customer->getEmail()->getEmail());
    }

    public function testQuoteFactory() {
        $customer = $this->customerFactory->createWith($this->data['customer'], $this->validateEmailService);
        $qoute = $this->quoteFactory->createWith($this->data, $customer);
        $this->assertEquals(2, $qoute->countItens());
    }
}
