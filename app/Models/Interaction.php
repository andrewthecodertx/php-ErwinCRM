<?php

declare(strict_types=1);

namespace ErwinCRM\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Interaction extends Model
{
  protected $table = 'interactions';

  public function interactiontable(): BelongsTo
  {
    return $this->belongsTo(Customer::class);
  }
}
