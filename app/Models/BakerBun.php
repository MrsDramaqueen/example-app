<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $clientId
 * @property int $bakerId
 * @property string $type
 * @property string $name
 * @property-read Baker $baker
 * @property-read Client $client
 */
class BakerBun extends Model
{

    use HasFactory;

    private int $clientId;
    private int $bakerId;
    private string $type;
    private string $name;

    protected $fillable = ['client_id', 'baker_id', 'type', 'name'];

    protected $hidden = ['created_at', 'updated_at'];

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->clientId;
    }

    /**
     * @param int $clientId
     * @return BakerBun
     */
    public function setClientId(int $clientId): BakerBun
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * @return int
     */
    public function getBakerId(): int
    {
        return $this->bakerId;
    }

    /**
     * @param int $bakerId
     * @return BakerBun
     */
    public function setBakerId(int $bakerId): BakerBun
    {
        $this->bakerId = $bakerId;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return BakerBun
     */
    public function setType(string $type): BakerBun
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
     * @return BakerBun
     */
    public function setName(string $name): BakerBun
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Baker
     */
    public function getBaker(): Baker
    {
        return $this->baker;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @return BelongsTo
     */
    public function baker(): BelongsTo
    {
        return $this->belongsTo(Baker::class);
    }

    /**
     * @return BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

}
