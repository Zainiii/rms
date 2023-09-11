<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateSection extends Model
{
    use HasFactory;

    public function template(): HasOne
    {
        return $this->hasOne(Template::class, 'template_id', 'id');
    }


    public function section(): HasOne
    {
        return $this->hasOne(Section::class, 'section_id', 'id');
    }


}
