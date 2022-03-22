<?php

namespace Quote\Application\Factory;

use \Quote\Domain\AggregateRoot\Quote;
use \Quote\Domain\Contract\Factory\QuoteFactoryInterface;
use \Quote\Domain\Entity\Customer;
use \Quote\Domain\Entity\Item;
use \Quote\Domain\ValueObject\Product;
use \Quote\Domain\ValueObject\Status;
use \Quote\Domain\ValueObject\ValidAt;
use \SharedResource\Domain\ValueObject\Amount;
use \SharedResource\Domain\ValueObject\Id;

/**
 * Description of ParseArray
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class QuoteFactory implements QuoteFactoryInterface {

    private function addItensFromArray(array $itens): array {
        $itensEntity = [];

        foreach ($itens as $arrayItem) {
            $id = new Id();
            $amount = new Amount($arrayItem['amount'], $arrayItem['quantity']);
            $product = new Product($arrayItem['product']);

            $item = new Item($id, $amount, $product);
            $itensEntity[] = $item;
        }

        return $itensEntity;
    }

    public function createWith(array $data, Customer $customer): Quote {
        $id = new Id();
        $validAt = ValidAt::createInstaceFromYYYYMMDD($data['quote']['valid_at']);
        $status = new Status();
        $itens = $this->addItensFromArray($data['itens']);
        return new Quote($id, $customer, $validAt, $status, $itens);
    }

}
