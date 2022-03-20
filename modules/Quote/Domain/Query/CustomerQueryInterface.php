<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPInterface.php to edit this template
 */

namespace Quote\Domain\Query;

/**
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
interface CustomerQueryInterface {

    public function existsEmail(string $email): bool;
}
