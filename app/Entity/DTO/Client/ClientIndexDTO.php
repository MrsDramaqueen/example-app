<?php

namespace App\Entity\DTO\Client;

class ClientIndexDTO
{
    private string $name;
    private string $lastName;
    private string $age;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ClientIndexDTO
     */
    public function setName(string $name): ClientIndexDTO
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
     * @return ClientIndexDTO
     */
    public function setLastName(string $lastName): ClientIndexDTO
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
     * @return ClientIndexDTO
     */
    public function setAge(string $age): ClientIndexDTO
    {
        $this->age = $age;
        return $this;
    }

}
