<?php

namespace Quote\Domain\ValueObject;

/**
 * Description of Id
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class Id {

    private int $id;

    public function __construct(?int $id = NULL) {
        $this->id = $id ?? hexdec(uniqid());
    }

    public function getId(): int {
        return $this->id;
    }

}
