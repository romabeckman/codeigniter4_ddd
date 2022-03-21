<?php

namespace Quote\Domain\Contract\Notification;

use \Quote\Domain\Entity\Quote;

/**
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
interface NotificationInterface {

    public function notify(Quote $quote);
}
