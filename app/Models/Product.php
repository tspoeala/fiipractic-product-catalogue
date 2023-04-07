<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * One to Many Products and Category
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        # Product belongs to Category
        # Define an inverse one-to-many relationship.
        return $this->belongsTo(Category::class);
    }
}
