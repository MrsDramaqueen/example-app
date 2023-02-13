<?php

namespace App\Entity\DTO\Baker;

class BakerIndexDTO
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return BakerStoreDTO
     */
    public function setName(string $name): BakerIndexDTO
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return BakerIndexDTO
     */
    public function setLastName(string $lastName): BakerIndexDTO
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getAge(): string
    {
        return $this->age;
    }

    /**
     * @param string $age
     * @return BakerIndexDTO
     */
    public function setAge(string $age): BakerIndexDTO
    {
        $this->age = $age;
        return $this;
    }
    private string $name;
    private string $lastName;
    private string $age;


}
