<?php

namespace Quote\Domain\Entity;

use \Quote\Domain\Traits\IdTrait;
use \Quote\Domain\ValueObject\Amount;
use \Quote\Domain\ValueObject\Id;
use \Quote\Domain\ValueObject\Product;
use \Quote\Domain\ValueObject\Status;
use \Quote\Domain\ValueObject\ValidAt;

/**
 * Description of Quote
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class Quote {

    use IdTrait;

    private Customer $customer;
    private array $itens;
    private Id $id;
    private ValidAt $validAt;
    private Status $status;

    public function __construct(Id $id, ValidAt $validAt, Status $status) {
        $this->id = $id;
        $this->validAt = $validAt;
        $this->status = $status;
    }

    public function setCustomer(Customer $customer) {
        $this->customer = $customer;
        return $this;
    }

    public function getCustomer(): Customer {
        return $this->customer;
    }

    public function getItens(): array {
        return $this->itens;
    }

    public function getId(): Id {
        return $this->id;
    }

    public function getValidAt(): ValidAt {
        return $this->validAt;
    }

    public function getStatus(): Status {
        return $this->status;
    }

    public function addItem(Item $item): void {
        $this->itens[] = $item;
    }

    public static function addItensFromArray(Quote $quote, array $itens): void {
        foreach ($itens as $arrayItem) {
            $id = new Id();
            $amount = new Amount($arrayItem['amount'], $arrayItem['quantity']);
            $product = new Product($arrayItem['product']);

            $item = new Item($id, $amount, $product);
            $quote->addItem($item);
        }
    }

    public static function createInstanceFromArray(array $data): self {
        $id = new Id();
        $validAt = ValidAt::createInstaceFromYYYYMMDD($data['valid_at']);
        $status = new Status();

        return new static($id, $validAt, $status);
    }

}
