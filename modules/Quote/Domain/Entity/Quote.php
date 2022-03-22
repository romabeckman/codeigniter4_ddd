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

    private Id $id;
    private Customer $customer;
    private ValidAt $validAt;
    private Status $status;
    private array $itens;

    public function __construct(Id $id, Customer $customer, ValidAt $validAt, Status $status, array $itens = []) {
        $this->id = $id;
        $this->customer = $customer;
        $this->validAt = $validAt;
        $this->status = $status;
        $this->itens = $itens;
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

    public function countItens(): int {
        return count($this->itens);
    }

}
