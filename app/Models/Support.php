<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false;
    protected $keyType =  'uuid';

    protected $fillable = ['description', 'status',];

    public $statusOptions = [
        'P' => 'Pendente, aguardando professor',
        'A' => 'Aguardando aluno',
        'c' => 'Finalizado',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
