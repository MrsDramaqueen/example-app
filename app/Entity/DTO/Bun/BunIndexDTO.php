<?php

namespace App\Entity\DTO\Bun;

class BunIndexDTO
{
    private string $type;
    private string $name;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return BunIndexDTO
     */
    public function setType(string $type): BunIndexDTO
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return BunIndexDTO
     */
    public function setName(string $name): BunIndexDTO
    {
        $this->name = $name;
        return $this;
    }
}
