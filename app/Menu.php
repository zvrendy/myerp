<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $fillable = ['menu_judul', 'menu_parent_id', 'menu_link', 'menu_icon'];
    public $timestamps = false;

    public function childs(){
        return $this->hasMany('App\Menu', 'menu_parent_id', 'id');
    }
    public function parents(){
        return $this->belongsTo('App\Menu', 'menu_parent_id', 'id')->withDefault();
    }
}
