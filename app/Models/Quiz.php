<?php

namespace App\Models;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = ['name','description', 'minutes'];
    public function questions(){
        return $this->hasMany(Question::class);
    }
}
