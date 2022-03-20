<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPTrait.php to edit this template
 */

namespace Quote\Domain\Traits;

use \Quote\Domain\ValueObject\Id;

/**
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
trait IdTrait {

    public function replaceId(int $id) {
        $this->id = new Id($id);
    }

}
