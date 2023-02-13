<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property $type
 * @property $name
 */
class Bun extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'name'];

    protected $hidden = ['created_at', 'updated_ad'];

    private string $type;
    private string $name;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Bun
     */
    public function setType(string $type): Bun
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
     * @return Bun
     */
    public function setName(string $name): Bun
    {
        $this->name = $name;
        return $this;
    }
}
