<?php

namespace App\Entity\DTO\Baker;

class BakerUpdateDTO
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
     * @return BakerUpdateDTO
     */
    public function setName(string $name): BakerUpdateDTO
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
     * @return BakerUpdateDTO
     */
    public function setLastName(string $lastName): BakerUpdateDTO
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
     * @return BakerUpdateDTO
     */
    public function setAge(string $age): BakerUpdateDTO
    {
        $this->age = $age;
        return $this;
    }
    private string $name;
    private string $lastName;
    private string $age;

}
