<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * Get the company of the employee.
     */
    public function post()
    {
        return $this->belongsTo(Company::class);
    }
}
