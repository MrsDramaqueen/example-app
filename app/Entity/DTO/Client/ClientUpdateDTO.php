<?php

namespace App\Entity\DTO\Client;

class ClientUpdateDTO
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
     * @return ClientUpdateDTO
     */
    public function setName(string $name): ClientUpdateDTO
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
     * @return ClientUpdateDTO
     */
    public function setLastName(string $lastName): ClientUpdateDTO
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
     * @return ClientUpdateDTO
     */
    public function setAge(string $age): ClientUpdateDTO
    {
        $this->age = $age;
        return $this;
    }

    private string $name;
    private string $lastName;
    private string $age;

}
