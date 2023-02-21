<?php

namespace App\Entity\DTO\Auth;

use App\Entity\DTO\Baker\BakerStoreDTO;
use App\Entity\DTO\Client\ClientStoreDTO;

class RegisterUserDTO extends BakerStoreDTO
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
     * @return RegisterUserDTO
     */
    public function setName(string $name): RegisterUserDTO
    {
        $this->name = $name;
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
     * @return RegisterUserDTO
     */
    public function setEmail(string $email): RegisterUserDTO
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
     * @return RegisterUserDTO
     */
    public function setPassword(string $password): RegisterUserDTO
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getClassType(): string
    {
        return $this->classType;
    }

    /**
     * @param string $classType
     * @return RegisterUserDTO
     */
    public function setClassType(string $classType): RegisterUserDTO
    {
        $this->classType = $classType;
        return $this;
    }

    private string $name;
    private string $email;
    private string $password;
    private string $classType;
}
