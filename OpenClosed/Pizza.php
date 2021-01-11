<?php declare(strict_types=1);

namespace MMBakker\SolidDesignPrinciples\OpenClosed;

use PizzaInterface;

class Pizza implements PizzaInterface
{
    private int $gramsOfSalt = 5;

    private ?ArtichokeHeart $artichokeHeart = null;
    private ?BellPepper $bellPepper = null;
    private ?Cheese $cheese = null;
    private ?Mushroom $mushroom = null;
    private ?Olive $olive = null;
    private ?Onion $onion = null;
    private ?Tomato $tomato = null;

    public function getGramsOfSalt(): int
    {
        $gramsOfSaltFromToppings = 0;

        if ($this->artichokeHeart !== null && method_exists($this->artichokeHeart, 'getGramsOfSalt')) {
            $gramsOfSaltFromToppings += $this->artichokeHeart->getGramsOfSalt();
        }

        if ($this->bellPepper !== null && method_exists($this->bellPepper, 'getGramsOfSalt')) {
            $gramsOfSaltFromToppings += $this->bellPepper->getGramsOfSalt();
        }

        if ($this->cheese !== null && method_exists($this->cheese, 'getGramsOfSalt')) {
            $gramsOfSaltFromToppings += $this->cheese->getGramsOfSalt();
        }

        if ($this->mushroom !== null && method_exists($this->mushroom, 'getGramsOfSalt')) {
            $gramsOfSaltFromToppings += $this->mushroom->getGramsOfSalt();
        }

        if ($this->olive !== null && method_exists($this->olive, 'getGramsOfSalt')) {
            $gramsOfSaltFromToppings += $this->olive->getGramsOfSalt();
        }

        if ($this->onion !== null && method_exists($this->onion, 'getGramsOfSalt')) {
            $gramsOfSaltFromToppings += $this->onion->getGramsOfSalt();
        }

        if ($this->tomato !== null && method_exists($this->tomato, 'getGramsOfSalt')) {
            $gramsOfSaltFromToppings += $this->tomato->getGramsOfSalt();
        }

        return $this->gramsOfSalt + $gramsOfSaltFromToppings;
    }

    public function addArtichokeHeart(ArtichokeHeart $artichokeHeart): void
    {
        $this->artichokeHeart = $artichokeHeart;
    }

    public function addBellPepper(BellPepper $bellPepper): void
    {
        $this->bellPepper = $bellPepper;
    }

    public function addCheese(Cheese $cheese): void
    {
        $this->cheese = $cheese;
    }

    public function addMushroom(Mushroom $mushroom): void
    {
        $this->mushroom = $mushroom;
    }

    public function addOlive(Olive $olive): void
    {
        $this->olive = $olive;
    }

    public function addOnion(Onion $onion): void
    {
        $this->onion = $onion;
    }

    public function addTomato(Tomato $tomato): void
    {
        $this->tomato = $tomato;
    }

    public function makePizza(string $type): Pizza
    {
        $pizza = new Pizza();

        switch ($type) {
            case 'vegetariana':
                $pizza->addTomato(new Tomato());
                $pizza->addMushroom(new Mushroom());
                $pizza->addArtichokeHeart(new ArtichokeHeart());
                $pizza->addOlive(new Olive());
                $pizza->addBellPepper(new BellPepper());
                $pizza->addCheese(new Cheese());
                $pizza->addOnion(new Onion());
                break;

            case 'funghi':
                $pizza->addTomato(new Tomato());
                $pizza->addMushroom(new Mushroom());
                $pizza->addCheese(new Cheese());
                break;

            case 'cipolla':
                $pizza->addTomato(new Tomato());
                $pizza->addOnion(new Onion());
                $pizza->addCheese(new Cheese());
                break;

            default:
                throw new \InvalidArgumentException('I need to know what type of pizza you want me to bake.');
        }

        printf("I created a pizza %s, which has %d grams of salt in it. Enjoy!\n", $type, $pizza->getGramsOfSalt());

        return $pizza;
    }
}
