<?php

namespace App\Entity\DTO\Client;

class ClientLoginDTO
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
     * @return ClientLoginDTO
     */
    public function setEmail(string $email): ClientLoginDTO
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
     * @return ClientLoginDTO
     */
    public function setPassword(string $password): ClientLoginDTO
    {
        $this->password = $password;
        return $this;
    }

    private string $email;
    private string $password;
}
