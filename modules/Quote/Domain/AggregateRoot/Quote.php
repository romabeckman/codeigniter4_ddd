<?php

namespace Quote\Domain\AggregateRoot;

use \Quote\Domain\Entity\Customer;
use \Quote\Domain\Entity\Item;
use \Quote\Domain\ValueObject\Status;
use \Quote\Domain\ValueObject\ValidAt;
use \SharedResource\Domain\AggregateRoot\AggregateRootAbstract;
use \SharedResource\Domain\ValueObject\Id;

/**
 * Description of Quote
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class Quote extends AggregateRootAbstract {

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
