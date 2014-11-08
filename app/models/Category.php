<?php

class Category extends \Eloquent {
	protected $fillable = [];

    protected $table = 'categories';

    public function links()
    {
        return $this->hasMany('Link');
    }
}