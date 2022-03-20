<?php

namespace Quote\Domain\Entity;

use \Quote\Domain\Traits\IdTrait;
use \Quote\Domain\ValueObject\Amount;
use \Quote\Domain\ValueObject\Id;
use \Quote\Domain\ValueObject\Product;

/**
 * Description of Item
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class Item {

    use IdTrait;

    private Id $id;
    private Amount $amount;
    private Product $product;

    public function __construct(Id $id, Amount $amount, Product $product) {
        $this->id = $id;
        $this->amount = $amount;
        $this->product = $product;
    }

    public function getId(): Id {
        return $this->id;
    }

    public function getAmount(): Amount {
        return $this->amount;
    }

    public function getProduct(): Product {
        return $this->product;
    }



}
