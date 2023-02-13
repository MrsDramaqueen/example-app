<?php

namespace App\Entity\DTO\Baker;

class BakerStoreDTO
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
    public function setName(string $name): BakerStoreDTO
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
     * @return BakerStoreDTO
     */
    public function setLastName(string $lastName): BakerStoreDTO
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
     * @return BakerStoreDTO
     */
    public function setAge(string $age): BakerStoreDTO
    {
        $this->age = $age;
        return $this;
    }
    private string $name;
    private string $lastName;
    private string $age;

}
