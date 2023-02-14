<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $name
 * @property string $last_name
 * @property int $age
 */

class Baker extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'last_name', 'age'];

    protected $hidden = ['created_at', 'updated_at'];

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Baker
     */
    public function setName(string $name): Baker
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     * @return Baker
     */
    public function setLastName(string $last_name): Baker
    {
        $this->last_name = $last_name;
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
     * @return Baker
     */
    public function setAge(string $age): Baker
    {
        $this->age = $age;
        return $this;
    }

    private string $name;
    private string $last_name;
    private string $age;

    public function buns(): HasMany
    {
        return $this->hasMany(BakerBun::class);
    }

    public function clients(): BelongsToMany
    {
        return $this->belongsToMany(Client::class);
    }

}
