<?php

namespace Tests\Unit\Quote;

use \CodeIgniter\Test\CIUnitTestCase;
use \Quote\Domain\Exception\InvalidEmailException;
use \SharedResource\Domain\ValueObject\Email;

class EmailTest extends CIUnitTestCase {

    public function testEmptyEmail() {
        $this->expectException(InvalidEmailException::class);
        new Email('');
    }

    public function testInvalidEmailCenarioA() {
        $this->expectException(InvalidEmailException::class);
        new Email(uniqid());
    }

    public function testInvalidEmailCenarioB() {
        $this->expectException(InvalidEmailException::class);
        new Email(uniqid() . "@");
    }

    public function testInvalidEmailCenarioC() {
        $this->expectException(InvalidEmailException::class);
        new Email(uniqid() . "@test");
    }

    public function testValidEmail() {
        new Email(uniqid() . "@test.com");
        new Email(uniqid() . "@test.com.br");
        $this->assertTrue(TRUE);
    }

}
