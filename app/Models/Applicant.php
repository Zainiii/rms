<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    public function resume()
    {
        return $this->hasMany(AplResume::class, 'applicant_id', 'id');
    }

    public function tags()
    {
        return $this->hasManyThrough(Tag::class, ApplicantTag::class, 'applicant_id', 'id', 'id', 'tag_id');
    }


}
