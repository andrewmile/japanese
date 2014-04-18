<?php

class ConjugationsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Auth::guest()) {
			return Redirect::to('login');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($word_id)
	{
		if(Auth::guest()) {
			return Redirect::to('login');
		}

		$data = Input::all();
		$data['word_id'] = $word_id;

		$validation = Validator::make($data, Conjugation::$rules);

		if($validation->fails()) {
			return Redirect::back()->withInput()->withErrors($validation->messages());
		}

		Conjugation::create(
			array(
				'word_id' => $word_id, 
				'form' => Input::get('form'),
				'word' => Input::get('word'),
				'kana' => Input::get('kana'),
				'romaji' => Input::get('romaji'),
			)
		);
		return Redirect::to('words/'.$word_id.'/edit');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if(Auth::guest()) {
			return Redirect::to('login');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if(Auth::guest()) {
			return Redirect::to('login');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if(Auth::guest()) {
			return Redirect::to('login');
		}
	}

}