<select name="tags-widget[]" class="inline_block selectpicker" multiple>
    <option>выбрать метку</option>
    @if(isset($tags) && !empty($tags))
        @foreach($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
        @endforeach
    @endif
</select>
<script>
    $('select').selectpicker('refresh');
</script>
