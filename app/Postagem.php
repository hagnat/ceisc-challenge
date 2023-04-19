<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Postagem extends Model
{
    use SoftDeletes;

    const PUBLICADO = 'S';
    const NAO_PUBLICADO = 'N';

    protected $table = 'postagem';
    protected $primaryKey = "id";

    /**
     * @see https://stackoverflow.com/questions/40641973/php-to-convert-string-to-slug
     */
    public function slug($delimiter = '-'): string
    {
        return strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $this->titulo))))), $delimiter));
    }

    public function publish(): self
    {
        $this->ativa = static::PUBLICADO;

        return $this;
    }

    public function unpublish(): self
    {
        $this->ativa = static::NAO_PUBLICADO;

        return $this;
    }

    public function published(): bool
    {
        return $this->ativa == static::PUBLICADO;
    }
}
