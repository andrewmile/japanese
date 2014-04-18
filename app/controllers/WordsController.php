<?php

class WordsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($type = null, $subtype = null, $uverbtype = null)
	{
		if($type && $subtype && $uverbtype) {
			$words = Word::where('type', $type)->where('subtype', $subtype)->where('romaji', 'like', '%'.$uverbtype);
			if($uverbtype == 'u') {
				$words = $words->where('romaji', 'not like', '%tsu')
							   ->where('romaji', 'not like', '%ru')
							   ->where('romaji', 'not like', '%mu')
							   ->where('romaji', 'not like', '%bu')
							   ->where('romaji', 'not like', '%nu')
							   ->where('romaji', 'not like', '%ku')
							   ->where('romaji', 'not like', '%gu')
							   ->where('romaji', 'not like', '%su');
			} elseif($uverbtype == 'su') {
				$words = $words->where('romaji', 'not like', '%tsu');
			}
			$words = $words->orderBy('kana')->get();
		
		} elseif($type && $subtype) {
			$words = Word::where('type', $type)->where('subtype', $subtype)->orderBy('kana')->get();
		
		} elseif($type) {
			$words = Word::where('type', $type)->orderBy('kana')->get();
		
		} else {
			$words = Word::orderBy('kana')->get();
		}

		return View::make('words.word_list')->with(['words' => $words, 'type' => $type, 'subtype' => $subtype]);
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

		return View::make('words.create_word');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(Auth::guest()) {
			return Redirect::to('login');
		}

		$validation = Validator::make(Input::all(), Word::$rules);

		if($validation->fails()) {
			return Redirect::back()->withInput()->withErrors($validation->messages());
		}

		Word::create(
			array(
				'word' => Input::get('word'),
				'type' => Input::get('type'),
				'subtype' => Input::get('subtype'),
				'kana' => Input::get('kana'),
				'romaji' => Input::get('romaji'),
				'english' => Input::get('english')
			)
		);
		if(Input::get('add_new')) {
			return Redirect::route('words.create');
		}
		$words = Word::all();
		return View::make('words.word_list')->with('words', $words);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$word = Word::with('conjugations')->find($id);
		$conjugations = $word->conjugations;
		return View::make('words.view_word')->with(['word' => $word, 'conjugations' => $conjugations]);
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

		$word = Word::findOrFail($id);
		return View::make('words.edit_word')->with('word', $word);
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

		$validation = Validator::make(Input::all(), Word::$rules);

		if($validation->fails()) {
			return Redirect::back()->withInput()->withErrors($validation->messages());
		}

		$word = Word::find($id);
		$word->word = Input::get('word');
		$word->type = Input::get('type');
		$word->subtype = Input::get('subtype');
		$word->kana = Input::get('kana');
		$word->romaji = Input::get('romaji');
		$word->english = Input::get('english');
		$word->save();
		return Redirect::route('words.index');
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
		
		// Word::destroy($id);
		// return Redirect::route('words.index');
	}

	/**
	 * Display a list of queries the user can run
	 *
	 * @return Array
	 */
	public function lists()
	{
		$lists = [
			       'All Verbs' => 'vb', 
			        'Ru Verbs' => 'vb/ru', 
			         'U Verbs' => 'vb/u',
			     'U Verbs - u' => 'vb/u/u',
			   'U Verbs - tsu' => 'vb/u/tsu',
			    'U Verbs - ru' => 'vb/u/ru',
			    'U Verbs - mu' => 'vb/u/mu',
			    'U Verbs - bu' => 'vb/u/bu',
			    'U Verbs - nu' => 'vb/u/nu',
			    'U Verbs - ku' => 'vb/u/ku',
			    'U Verbs - gu' => 'vb/u/gu',
			    'U Verbs - su' => 'vb/u/su'
		];
		return View::make('/words/query_list')->with('lists', $lists);
	}

}