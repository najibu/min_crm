<?php

namespace App;

use Illuminate\Database\Eloquent\Concerns\belongsTo;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @var array
     */
    protected $with = ['client'];

    /**
     * @return belongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
