<?php

namespace SharedResource\Domain\ValueObject;

/**
 * Description of Amount
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class Amount extends ValueObjectAbstract {

    private float $amount;
    private int $quantity;

    public function __construct(float $amount, int $quantity = 1) {
        $this->amount = $amount;
        $this->quantity = $quantity;
    }

    public function getAmount(): float {
        return $this->amount;
    }

    public function getQuantity(): int {
        return $this->quantity;
    }

    public function getTotal(int $precision = 2): float {
        return round($this->quantity * $this->amount, $precision);
    }

}
