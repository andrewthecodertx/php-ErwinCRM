<?php

declare(strict_types=1);

namespace ErwinCRM\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
  protected $table = 'notes';

  public function notetable(): BelongsTo
  {
    return $this->belongsTo(Customer::class);
  }
}
