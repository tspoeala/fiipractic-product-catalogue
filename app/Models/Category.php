<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * One to Many Category and Products
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        # Category has many Products
        # Define a one-to-many relationship.
        return $this->hasMany(Product::class);
    }
}
