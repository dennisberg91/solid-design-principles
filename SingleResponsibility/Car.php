<?php declare(strict_types=1);

namespace MMBakker\SolidDesignPrinciples\SingleResponsibility;

abstract class Car implements SteeringWheelInterface, WheelInterface
{
    private int $roll = 0;
    private int $left = 0;
    private int $center = 0;
    private int $right = 0;

    public function roll(int $amount): void {
        $this->roll = $amount;
    }

    public function getWearAndTear(): int
    {
        $wear = 0;
        switch ($this->roll) {
            case 120:
                $wear = 20;
                break;
            case 80:
                $wear = 10;
                break;
            case 50:
                $wear = 5;
                break;
            case 30:
                $wear = 4;
                break;
        }

        return $wear;
    }

    public function left(int $amount): void
    {
        $this->left = $amount;
    }

    public function center(): void
    {
        if ($this->left > 0) {
            $this->center -= $this->left;
        }
        elseif ($this->right > 0) {
            $this->center += $this->right;
        }
        else {
            return;
        }
    }

    public function right(int $amount): void
    {
        $this->right = $amount;
    }
}
