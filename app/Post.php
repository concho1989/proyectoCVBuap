<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	protected $fillable = [
		'user_id', 'category_id', 'name', 'slug', 'excerpt', 'body', 'status', 'file',
	];

	public function user() {
		// por que un post pertenece a un usuario
		return $this->belongsTo(User::class); //belongsTo ----->> pertenece a ...

	}

	public function category() {
		// por que un post pertenece a una categoria
		return $this->belongsTo(Category::class); //belongsTo ----->> pertenece a ...

	}

	public function tags() {
		// tags por que un posts tiene muchos etiquetas
		return $this->belongsToMany(Tag::class); // belongsToMany() PERTENE Y TIENE MUCHOS

	}
}
