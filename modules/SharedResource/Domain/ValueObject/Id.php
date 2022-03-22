<?php

namespace SharedResource\Domain\ValueObject;

/**
 * Description of Id
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class Id extends ValueObjectAbstract {

    private mixed $id;

    public function __construct(mixed $id = null) {
        $this->id = $id ?? hexdec(uniqid());
    }

    public function getId(): mixed {
        return $this->id;
    }

}
