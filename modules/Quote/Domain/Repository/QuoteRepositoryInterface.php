<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPInterface.php to edit this template
 */

namespace Quote\Domain\Repository;

use \Quote\Domain\Entity\Quote;

/**
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
interface QuoteRepositoryInterface {

    public function createQuote(Quote $quote): void;
}
