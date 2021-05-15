<section class="relative control_label">
    <form>
        <button type="button" class="rightMenuRemoveCollapse" onclick="rightMenuRemoveCollapse(this);">
            <img src="/{!! config('constant.upload_path_custom.logo').config('constant.custom_images.closeIcoAdmin') !!}">
        </button>
        <p class="title">Управление Метками</p>
        <div class="scrollBlock">
            <div class="blocks">
                <div class="column full relative">
                    <input id="new-tag-name-input" name="name" type="text" placeholder="Добавить метку">
                    <button type="button" onclick="add_tag(this);" class="addLabel"><i class="fa fa-plus-circle"
                                                                                       aria-hidden="true"></i></button>
                </div>
            </div>
            <div class="blocks">
                @if(isset($tags) && !empty($tags))
                    @foreach($tags as $tag)
                        <div class="column full relative div-label">
                            <input type="text" name="name" placeholder="Название метки" value="{{$tag->name}}">
                            <button type="button" class="changeLabel"
                                    onclick="changeInput_control_label(this);"><i class="fa fa-pencil-square-o"
                                                                                  aria-hidden="true"></i>
                            </button>
                            <button type="button" class="saveLabel hidden" data-tag-id="{{$tag->id}}"
                                    onclick="saveInput_control_label_tag(this);"><i class="fa fa-floppy-o"
                                                                                aria-hidden="true"></i></button>
                            <div class="dropdown inline_block width100">
                                <button id="changeInput_control_label-{{$tag->id}}" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" type="button"
                                        class="removeLabel"><i class="fa fa-times" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu UL-removeLabel"
                                    aria-labelledby="changeInput_control_label-{{$tag->id}}">
                                    <li>
                                        <p class="grid">
                                            <img src="/{!! config('constant.upload_path_custom.logo').config('constant.custom_images.AlertAdmin') !!}">
                                            <span>Вы действительно хотите удалить метку ?</span>
                                        </p>
                                        <p class="grey">Это действие не обратимо</p>
                                        <div>
                                            <button type="button" class="cancel">ОТМЕНИТЬ</button>
                                            <button type="button" data-tag-id="{{$tag->id}}" onclick="delete_tag(this);"
                                                    class="delete">УДАЛИТЬ
                                            </button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </form>
</section>

<script>
    function delete_tag(_this) {
        var data = {
            id: $(_this).data('tag-id'),
            ajax_submit: true
        };

        $.ajax({
            method: "POST",
            url: '{{urlloc('/admin/blog/tag/delete')}}',
            dataType: 'json',
            data: data
        }).done(function (data) {

        });

        $('#rightMenuCollapse').find('.rightMenuCollapse_content').html('');
    }

    function add_tag(_this) {
        $.ajax({
            method: "POST",
            url: '{{urlloc('/admin/blog/tag/add')}}',
            dataType: 'json',
            data: {
                name: $('#new-tag-name-input').val(),
                ajax_submit: true
            }
        }).done(function (data) {

        });

        $('#rightMenuCollapse').find('.rightMenuCollapse_content').html('');

    }

    function saveInput_control_label_tag(_this) {
        $(_this).closest('.column').removeClass('change');
        $(_this).addClass('hidden');
        $(_this).siblings('.changeLabel').removeClass('hidden');
        $(_this).siblings('.dropdown').find('.removeLabel').removeClass('hidden');

        var data = {
            id: $(_this).data('tag-id'),
            name: $(_this).closest('div').find('input[name="name"]').val(),
            ajax_submit: true
        };

        $.ajax({
            method: "POST",
            url: '{{urlloc('/admin/blog/tag/edit')}}',
            dataType: 'json',
            data: data
        }).done(function (data) {

        });
    }

</script>