<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
  protected $table='produtos';
  protected $primaryKey = 'idProduto';
  public $timestamps = false;
  protected $guarded = [];
  protected $fillable = [
    'idProduto',
    'Nome_prod',
    'cor',
    'tipo',
    'recipiente_produto',
    'unidade_medida',
    'Preco_custo_prod',
    'Preco_venda_prod'
  ];



  public function kits(){
    return $this->belongsToMany("App\Kit","Kits_Produtos",'idKit','idProduto')->withPivot(['quantidade']);
  }
}
