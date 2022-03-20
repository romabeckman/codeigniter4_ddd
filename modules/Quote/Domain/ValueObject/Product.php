<?php

namespace Quote\Domain\ValueObject;

/**
 * Description of Name
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class Product {

    private string $product;

    public function __construct(string $product) {
        $this->product = $product;
    }

    public function getProduct(): string {
        return $this->product;
    }

}
