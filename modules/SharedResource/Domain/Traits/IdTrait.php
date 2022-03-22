<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPTrait.php to edit this template
 */

namespace SharedResource\Domain\Traits;

use \SharedResource\Domain\ValueObject\Id;

/**
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
trait IdTrait {

    private Id $id;

    public function getId(): Id {
        return $this->id;
    }

    public function replaceId(mixed $id): self {
        $this->id = new Id($id);
        return $this;
    }

}
