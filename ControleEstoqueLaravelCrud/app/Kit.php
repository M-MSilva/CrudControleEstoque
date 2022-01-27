<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Kit extends Model
{

  protected $table='kits';

  public $timestamps = false;
  protected $guarded = [];
  protected $primaryKey = 'idKit';

  protected $fillable = [
    'idKit',
    'P_Nome_kit',
    'recipiente_kit',
    'unidade_medida_kit',
    'S_Nome_kit',
    'UND',
    'Preco_venda_Kit',
    'Preco_custo_kit'
  ];



  public function produtos(){
    return $this->belongsToMany("App\Produto","Kits_Produtos",'idKit','idProduto')->withPivot(['quantidade']);
  }

}
