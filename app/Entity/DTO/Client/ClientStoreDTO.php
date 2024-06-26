<?php

namespace App\Entity\DTO\Client;

class ClientStoreDTO
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
     * @return ClientStoreDTO
     */
    public function setName(string $name): ClientStoreDTO
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
     * @return ClientStoreDTO
     */
    public function setLastName(string $lastName): ClientStoreDTO
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
     * @return ClientStoreDTO
     */
    public function setAge(string $age): ClientStoreDTO
    {
        $this->age = $age;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return ClientStoreDTO
     */
    public function setEmail(string $email): ClientStoreDTO
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return ClientStoreDTO
     */
    public function setPassword(string $password): ClientStoreDTO
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getPersonalToken(): string
    {
        return $this->personalToken;
    }

    /**
     * @param string $personalToken
     * @return ClientStoreDTO
     */
    public function setPersonalToken(string $personalToken): ClientStoreDTO
    {
        $this->personalToken = $personalToken;
        return $this;
    }

    private string $name;
    private string $lastName;
    private string $age;
    private string $email;
    private string $password;
    private string $personalToken;
}
