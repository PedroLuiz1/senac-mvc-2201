<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotasFiscais extends Model
{
    use HasFactory;

    protected $fillable = ['id',
                            'venda_id',
                            'valor',
                            'imposto'];

    protected $table = 'NotasFiscais';

    public function venda() {
        return $this->hasOne(Vendas::class, 'id', 'venda_id');
    }
}
