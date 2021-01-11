<?php declare(strict_types=1);

namespace MMBakker\SolidDesignPrinciples\OpenClosed;

use PizzaInterface;

class PizzaRestaurant extends Pizza
{
    public function orderPizza(string $type): Pizza
    {
        return $this->makePizza($type);
    }
}
