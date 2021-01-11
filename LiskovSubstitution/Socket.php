<?php declare(strict_types=1);

namespace MMBakker\SolidDesignPrinciples\LiskovSubstitution;

use LightInterface;
use SocketInterface;

class Socket implements SocketInterface
{
    private LightInterface $light;
    private bool $state;

    public function powerOn(): void
    {
        $this->state = true;
    }

    public function powerOff(): void
    {
        $this->state = false;
    }

    /**
     * @param LightInterface $light
     */
    public function setLight(LightInterface $light): void
    {
        $this->light = $light;
    }
}
