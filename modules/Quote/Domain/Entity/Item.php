<?php

namespace Quote\Domain\Entity;

use \Quote\Domain\ValueObject\Product;
use \SharedResource\Domain\Entity\EntityAbstract;
use \SharedResource\Domain\ValueObject\Amount;
use \SharedResource\Domain\ValueObject\Id;

/**
 * Description of Item
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class Item extends EntityAbstract {
    private Id $id;
    private Amount $amount;
    private Product $product;

    public function __construct(Id $id, Amount $amount, Product $product) {
        $this->id = $id;
        $this->amount = $amount;
        $this->product = $product;
    }

    public function getAmount(): Amount {
        return $this->amount;
    }

    public function getProduct(): Product {
        return $this->product;
    }

}
