<?php

namespace Quote\Domain\Contract\Query;

/**
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
interface CustomerQueryInterface {

    public function existsEmail(string $email): bool;
}
