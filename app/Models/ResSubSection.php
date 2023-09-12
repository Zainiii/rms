<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResSubSection extends Model
{
    use HasFactory;

    public function resume()
    {
        return $this->belongsTos(AplResume::class, 'resume_id', 'id');
    }

}
