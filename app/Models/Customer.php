<?php

declare(strict_types=1);

namespace ErwinCRM\Models;

use ErwinCRM\Models\Note;
use ErwinCRM\Models\Interaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
  protected $table = 'customers';

  public function interactions(): HasMany
  {
    return $this->hasMany(Interaction::class);
  }

  public function notes(): HasMany
  {
    return $this->hasMany(Note::class);
  }
}
