<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title', 
        'position',
        'category',
        'description', 
        'location', 
        'type', 
        'experience', 
        'vacancy', 
        'salary',
        //'experience',
        //'education',
        //'skills',
        'app_date',
        //'posted_date',
        'company_id',
        ]; 
        
    public function posted_date() {
        return $this->created_at;
    }         
    
    public function company() {
        return $this->belongsTo(Company::class);
    }
    
    
        
}