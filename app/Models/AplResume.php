<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AplResume extends Model
{
    use HasFactory;

    public function section()
    {
        return $this->belongsTos(Section::class, 'section_id', 'id');
    }

    public function applicant()
    {
        return $this->belongsTos(applicant::class, 'applicant_id', 'id');
    }

    public function subSections()
    {
        return $this->hasMany(ResSubSection::class, 'resume_id', 'id');
    }

}
