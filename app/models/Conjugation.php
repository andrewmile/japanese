<?php

class Conjugation extends Eloquent {

	protected $fillable = ['word_id', 'form', 'word', 'kana', 'romaji'];

	public static $rules = array(
		'word_id' => 'required',
		'form' => 'required',
		'word' => 'required',
		'kana' => 'required',
		'romaji' => 'required',
	);

	public function word()
	{
		return $this->belongsTo('Word');
	}

}