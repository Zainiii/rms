<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateSection extends Model
{
    use HasFactory;


    public function getHeaderStyleAttribute($value)
    {
        return trim($value, '"'); 
    }

    public function getBodyStyleAttribute($value)
    {
        return trim($value, '"'); 
    }

    public function getSubHeaderStyleAttribute($value)
    {
        return trim($value, '"'); 
    }
    
    public function getSubBodyStyleAttribute($value)
    {
        return trim($value, '"'); 
    }

    public function template()
    {
        return $this->belongsTos(Template::class, 'template_id', 'id');
    }


    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }


    public function resume()
    {
        return $this->belongsTo(AplResume::class, 'section_id', 'section_id');
    }


}
