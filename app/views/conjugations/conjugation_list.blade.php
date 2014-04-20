@if(count($conjugations))
    <h4>Conjugations:</h4>
    <ul class="conjugations">
        @foreach($conjugations as $conjugation)
            <li><span class="span20w">{{ $conjugation->form }}:</span>{{ $conjugation->word }}</li>
        @endforeach
    </ul>
@endif