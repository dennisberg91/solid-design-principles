<?php declare(strict_types=1);

use MMBakker\SolidDesignPrinciples\OpenClosed\Pizza;

interface PizzaInterface
{
    public function makePizza(string $type): Pizza;
}
