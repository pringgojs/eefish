<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'links';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function getParent()
    {
        $link = Link::where('id', $this->link_parent_id)->first();
        if (!$link) return '-';
        
        return $link->link_name;
    }
}