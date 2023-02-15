<?php

namespace App\Entity\DTO\Auth;

class LoginUserDTO
{
    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return LoginUserDTO
     */
    public function setEmail(string $email): LoginUserDTO
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
     * @return LoginUserDTO
     */
    public function setPassword(string $password): LoginUserDTO
    {
        $this->password = $password;
        return $this;
    }

    private string $email;
    private string $password;
}
