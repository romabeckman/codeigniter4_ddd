<?php

namespace App\Controllers;

use \Quote\Application\Handler\QuoteStoreHandler;

class Home extends BaseController {

    public function index(QuoteStoreHandler $quoteStoreHandler) {
        $quoteStoreHandler->handler($this->request->getBody());
    }

}
