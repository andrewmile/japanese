@extends('layouts.master')

@section('content')

    <h1>{{ $word->word }}<span class="span18"> - {{ $word->english }}</span></h1>
    <p>{{ $word->kana }} - {{ $word->romaji }}</p>
    <p>{{ $word->subtype }} {{ $word->type }}</p>

    <br>

    @if(count($conjugations))
        <p><b>Conjugations:</b></p>
        <ul class="conjugations">
            @foreach($conjugations as $conjugation)
                <li><span class="span20w">{{ $conjugation->form }}:</span>{{ $conjugation->word }}</li>
            @endforeach
        </ul>
    @endif
    
    <br>

    @if(Auth::check())
        {{ link_to("/words/{$word->id}/edit", 'edit', ['class' => 'btn btn-default']) }}
    @endif

@endsection
