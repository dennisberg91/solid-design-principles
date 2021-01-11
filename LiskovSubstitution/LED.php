<?php declare(strict_types=1);

namespace MMBakker\SolidDesignPrinciples\LiskovSubstitution;

use LightInterface;

/**
 * "LED"
 */
class LED implements LightInterface
{
    public function printName(): void
    {
        echo 'I am an LED light, known as "LED-lamp" in Dutch.';
    }

    public function switchOn(): void
    {
        echo 'LED is now on.';
    }

    public function switchOff(): void
    {
        echo 'LED is now off.';
    }
}
