<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Donatur extends Model
{

    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    public function users(){
        return $this->belongsTo(User::class,'id_users','id');
    }

    public function getTanggalIndoAttribute(){
        return Carbon::parse($this->attributes['tanggal_indo'])
                    ->translatedFormat('d F Y');
    }
    
    
}
