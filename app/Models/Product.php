<?php

namespace App\Models;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description'];

    public static function rules(){
        return [
          'name' => 'required',
          'price' => 'required',
          'description' => 'required|max:100'
        ];
    }

    public static function feedback(){
        return [
          'required' => 'Preencha o campo!',
          'max' => 'A descrição deve conter menos de 100 caracteres!'
        ];
    }

    public function sales(){
        return $this->belongsToMany(SaleController::class);
    }
}
