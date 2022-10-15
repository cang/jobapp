<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    
    //use SoftDeletes;
    //protected $table = 'companies';
    //public $timestamps = false; 
    
    protected $fillable = [
        'name', 
        'logo', 
        'web', 
        'email', 
        'address', 
        'phone',
        'info', 
        'note',
        ]; 
        
    public function jobs() {
        return $this->hasMany(Job::class, 'company_id', 'id');
    }        

}
