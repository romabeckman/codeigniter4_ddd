<?php

namespace Quote\Domain\ValueObject;

use \SharedResource\Domain\ValueObject\ValueObjectAbstract;

/**
 * Description of Name
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class Product extends ValueObjectAbstract {

    private string $product;

    public function __construct(string $product) {
        $this->product = $product;
    }

    public function getProduct(): string {
        return $this->product;
    }

}
