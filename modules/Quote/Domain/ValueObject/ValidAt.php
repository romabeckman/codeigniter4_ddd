<?php

namespace Quote\Domain\ValueObject;

use \DateTime;

/**
 * Description of ValidAt
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class ValidAt {

    private DateTime $validAt;

    public function __construct(DateTime $validAt) {
        $this->validAt = $validAt;
    }

    public function getValidAt(): DateTime {
        return $this->validAt;
    }

    public function formatToYYYYMMDD(): string {
        return $this->validAt->format('Y-m-d');
    }

    static public function createInstaceFromYYYYMMDD(string $validAt): self {
        $validAt = new DateTime($validAt);
        return new ValidAt($validAt);
    }

}
