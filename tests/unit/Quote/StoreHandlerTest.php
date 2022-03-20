<?php

namespace Tests\Unit\Quote;

use \CodeIgniter\Test\CIUnitTestCase;
use \Quote\Application\Facade\QuoteFacade;
use \Quote\Application\Handler\QuoteStoreHandler;
use \Quote\Infrastructure\CI4\Query\CustomerQuery;
use \Quote\Infrastructure\CI4\Repository\CustomerRepository;
use \Quote\Infrastructure\CI4\Repository\ItemRepository;
use \Quote\Infrastructure\CI4\Repository\QuoteRepository;
use \RuntimeException;

class StoreHandlerTest extends CIUnitTestCase {

    private QuoteStoreHandler $quoteStoreHandler;
    private array $data;

    public function setUp(): void {
        $this->quoteStoreHandler = new QuoteStoreHandler(
                new QuoteFacade(),
                new CustomerRepository(),
                new QuoteRepository(),
                new ItemRepository(),
                new CustomerQuery()
        );

        $this->data = [
            'customer' => [
                'firstname' => 'Mark',
                'lastname' => 'Smith',
                'email' => uniqid() . '@mytest.com',
            ],
            'quote' => [
                'valid_at' => date('Y-m-d'),
            ],
            'itens' => [
                0 => [
                    'product' => 'Product A - ' . uniqid(),
                    'amount' => '10.50',
                    'quantity' => '5',
                ],
                1 => [
                    'product' => 'Product B - ' . uniqid(),
                    'amount' => 5.33,
                    'quantity' => 3,
                ],
            ],
        ];
    }

    public function testStore() {
        $this->quoteStoreHandler->handler($this->data);
        $this->assertTrue(TRUE);
    }

    public function testUniqueEmailStore() {
        $this->expectException(RuntimeException::class);
        $this->quoteStoreHandler->handler($this->data);
        $this->quoteStoreHandler->handler($this->data);
    }

}
