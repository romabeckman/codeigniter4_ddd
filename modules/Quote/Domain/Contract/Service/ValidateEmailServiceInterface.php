<?php

namespace Quote\Domain\Contract\Service;

use \SharedResource\Domain\ValueObject\Email;

/**
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
interface ValidateEmailServiceInterface {

    public function valid(Email $email): void;
}
