<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    use HasFactory;

    protected $fillable = ['id',
                            'cliente_id',
                            'data_da_venda',
                            'vendedor_id'];

    protected $table = 'Vendas';

    public function cliente() {
        return $this->belongsTo(Clientes::class, 'cliente_id', 'id');
    }

    public function produto() {
        return $this->hasMany(ProdutosVenda::class, 'venda_id', 'id');
    }

    public function notaFiscal() {
        return $this->hasOne(NotasFiscais::class, 'venda_id', 'id');
    }

}


