<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    /*
        Devuelve los productos que se encuentran en oferta en la fecha actual
    */
    static public function Offerings()
    {
        $sNow = date('Y-m-d H:i:s');

        return Product::where('discountPercent','>', 0)
            ->where(DB::raw('date_format(discountStart_at, "%Y-%m-%d")'), '<=', date('Y-m-d', strtotime($sNow)))
            ->where(DB::raw('date_format(discountEnd_at, "%Y-%m-%d")'), '>=', date('Y-m-d', strtotime($sNow)))
            ->get();
    }

    /*
        Devuelve los productos nuevos publicados en la semana en la que se realiza la consulta
    */
    static public function NewProducts()
    {
        $sNow = date('Y-m-d H:i:s');

        $sNextWeek = date('Y-m-d H:i:s', strtotime($sNow . ' + 1 week'));

        return Product::where(DB::raw('date_format(updated_at, "%Y-%m-%d")'), '>=', date('Y-m-d', strtotime($sNow)))
            ->where('updated_at', '<=', date('Y-m-d', strtotime($sNextWeek)))
            ->get();
    }
}
