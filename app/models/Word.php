<?php

class Word extends Eloquent {

	protected $fillable = ['word', 'type', 'subtype', 'kana', 'romaji', 'english'];

	public static $rules = array(
		'word' => 'required',
		'type' => 'required',
		'kana' => 'required',
		'romaji' => 'required',
		'english' => 'required'
	);

	public function conjugations()
	{
		return $this->hasMany('Conjugation');
	}

}