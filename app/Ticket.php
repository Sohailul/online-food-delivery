<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function customers(){
        //$customer_id = (int) $id;
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
}
