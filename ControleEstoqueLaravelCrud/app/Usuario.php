<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
  public $timestamps = false;

  protected $fillable = [
      'idUsuario','Nome_User','idade_User'
  ];

  protected $primaryKey = 'idUsuario';
  
}
