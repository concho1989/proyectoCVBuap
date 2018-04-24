<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {
	protected $fillable = [
		'name', 'slug',
	];

	public function posts() {
		// tags por que un posts tiene muchos etiquetas
		return $this->belongsToMany(Post::class); // belongsToMany() PERTENE Y TIENE MUCHOS

	}
}
