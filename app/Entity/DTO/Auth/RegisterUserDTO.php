<?php

namespace App\Entity\DTO\Auth;

class RegisterUserDTO
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
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     * @return RegisterUserDTO
     */
    public function setUserId(string $userId): RegisterUserDTO
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserType(): string
    {
        return $this->userType;
    }

    /**
     * @param string $userType
     * @return RegisterUserDTO
     */
    public function setUserType(string $userType): RegisterUserDTO
    {
        $this->userType = $userType;
        return $this;
    }

    private string $name;
    private string $email;
    private string $password;
    private string $userId;
    private string $userType;
}
