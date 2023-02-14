<?php

namespace App\Entity\DTO\BakerBun;

class BakerBunCreateOrderDTO
{
    private string $type;
    private string $name;
    private string $client_id;
    private string $baker_id;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return BakerBunCreateOrderDTO
     */
    public function setType(string $type): BakerBunCreateOrderDTO
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return BakerBunCreateOrderDTO
     */
    public function setName(string $name): BakerBunCreateOrderDTO
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->client_id;
    }

    /**
     * @param string $client_id
     * @return BakerBunCreateOrderDTO
     */
    public function setClientId(string $client_id): BakerBunCreateOrderDTO
    {
        $this->client_id = $client_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getBakerId(): string
    {
        return $this->baker_id;
    }

    /**
     * @param string $baker_id
     * @return BakerBunCreateOrderDTO
     */
    public function setBakerId(string $baker_id): BakerBunCreateOrderDTO
    {
        $this->baker_id = $baker_id;
        return $this;
    }

}
