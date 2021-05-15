@if(isset($series) && !empty($series))
    @foreach($series as $serie)
        <li>
            <input name="serie_id_post" value="{{$serie->id}}" type="radio" @if(isset($post->serie_id) && $serie->id == $post->serie_id) checked
                   @endif class="" id="thisID-{{$serie->id}}">
            <label for="thisID-{{$serie->id}}">{{$serie->title}}</label>
        </li>
    @endforeach
@endif
