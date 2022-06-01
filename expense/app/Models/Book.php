<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;




class Book extends Model
{
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public static $categories = ['趣味', '食費', '光熱費', '家賃', 'ローン', '交際費', '教育費', '給料', '副業', '臨時収入'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
