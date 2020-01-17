<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'description',
    ];

    protected $table = 'expense_categories';

    public function expense()
    {
        return $this->hasMany('App\Expense');
    }

}
