<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $appends = ['company_name'];

    public function scopeFilter($query, array $filters){
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%'.request('tag').'%');
        }
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }


    // accessor -> bazadan ma`lumotni qanday ko`rinishda olishi

    /* public function getCompanyAttribute($value){
        return strtolower($value);
    } */


    // mutator -> bazaga ma`lumotni qanday ko`rinishda qo`yishi

    /* public function setCompanyAttribute($value){
        $this->attributes['company'] = strtoupper($value) . ' company';
    } */
    

    public function getCompanyNameAttribute($value){
        return ucwords($this->company) . ' Company';
    }
}
