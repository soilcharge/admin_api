<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class FrontProduct extends Model
{
    protected $table='front_product';
    protected $primeryKey='id';
    public $timestamps=false;
    protected $fillable=[];
}