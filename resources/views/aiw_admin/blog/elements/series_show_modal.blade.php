<section class="relative control_categories">
    <form>
        <button type="button" class="rightMenuRemoveCollapse" onclick="rightMenuRemoveCollapse(this);">
            <img src="/{!! config('constant.upload_path_custom.logo').config('constant.custom_images.closeIcoAdmin') !!}">
        </button>
        <p class="title">Управление Категориями</p>
        <div class="scrollBlock">
            <div class="blocks">
                <div class="column full relative">
                    <input id="new-serie-name-input" name="name" type="text" placeholder="Добавить категорию ">
                    <button type="button" onclick="add_series(this);" class="addLabel"><i class="fa fa-plus-circle"
                                                                                          aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="blocks">
                @if(isset($series) && !empty($series))
                    @foreach($series as $seria)
                        <div class="column full relative div-label">
                            <input type="text" name="title" placeholder="Название категории" value="{{$seria->title}}">
                            <button type="button" class="changeLabel"
                                    onclick="changeInput_control_label(this);"><i class="fa fa-pencil-square-o"
                                                                                  aria-hidden="true"></i>
                            </button>
                            <button type="button" class="saveLabel hidden" data-serie-id="{{$seria->id}}"
                                    onclick="saveInput_control_label_category(this);"><i class="fa fa-floppy-o"
                                                                                         aria-hidden="true"></i>
                            </button>
                            <div class="dropdown inline_block width100">
                                <button id="changeInput_control_label-2" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" type="button"
                                        class="removeLabel"><i class="fa fa-times" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu UL-removeLabel"
                                    aria-labelledby="changeInput_control_label-2">
                                    <li>
                                        <p class="grid">
                                            <img src="/{!! config('constant.upload_path_custom.logo').config('constant.custom_images.AlertAdmin') !!}">
                                            <span>Вы действительно хотите удалить категорию ?</span>
                                        </p>
                                        <p class="grey">Это действие не обратимо</p>
                                        <div>
                                            <button type="button" class="cancel">ОТМЕНИТЬ</button>
                                            <button type="button" class="delete"
                                                    data-serie-id="{{$seria->id}}" onclick="delete_series(this);">
                                                УДАЛИТЬ
                                            </button>
                                            <div class="dropdownCategory">
                                                <p>При удалении категории:</p>
                                                <div class="radioGroup">
                                                    <ul>
                                                        <li class="relative">
                                                            <input id="inp_category-1" type="radio"
                                                                   name="category" class="hidden">
                                                            <label for="inp_category-1">Переместить в
                                                                категорию</label>

                                                            <button type="button" class="show_checkCategory"
                                                                    onclick="show_checkCategory(this);">Выбрать
                                                                <i class="fa fa-angle-down"
                                                                   aria-hidden="true"></i></button>
                                                            <ul class="checkCategory">
                                                                <li>
                                                                    <input id="checkCategory-1" type="checkbox"
                                                                           class="hidden">
                                                                    <label for="checkCategory-1">Новости
                                                                        рынка</label>
                                                                </li>
                                                                <li>
                                                                    <input id="checkCategory-2" type="checkbox"
                                                                           class="hidden">
                                                                    <label for="checkCategory-2">Новости
                                                                        фонда</label>
                                                                </li>
                                                                <li>
                                                                    <input id="checkCategory-3" type="checkbox"
                                                                           class="hidden">
                                                                    <label for="checkCategory-3">Криптопедия</label>
                                                                </li>
                                                                <li>
                                                                    <input id="checkCategory-4" type="checkbox"
                                                                           class="hidden">
                                                                    <label for="checkCategory-4">Статьи</label>
                                                                </li>
                                                                <li>
                                                                    <input id="checkCategory-5" type="checkbox"
                                                                           class="hidden">
                                                                    <label for="checkCategory-5">Кейсы</label>
                                                                </li>
                                                                <li>
                                                                    <input id="checkCategory-6" type="checkbox"
                                                                           class="hidden">
                                                                    <label for="checkCategory-6">Инструкции</label>
                                                                </li>
                                                                <li>
                                                                    <div class="text-center">
                                                                        <button type="button"
                                                                                class="btn-def-admin">Сохранить
                                                                        </button>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="relative">
                                                            <input id="inp_category-2" type="radio"
                                                                   name="category" class="hidden">
                                                            <label for="inp_category-2">Удалить категорию вместе
                                                                со статьями (5) </label>
                                                        </li>
                                                    </ul>
                                                    <div class="text-center">
                                                        <button type="button" class="btn-def-admin">Применить
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
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
    function delete_series(_this) {
        var data = {
            id: $(_this).data('serie-id'),
            ajax_submit: true
        };

        $.ajax({
            method: "POST",
            url: '{{urlloc('/admin/blog/series/delete')}}',
            dataType: 'json',
            data: data
        }).done(function (data) {

        });

        $('#rightMenuCollapse').find('.rightMenuCollapse_content').html('');
    }

    function add_series(_this) {
        $.ajax({
            method: "POST",
            url: '{{urlloc('/admin/blog/series/save')}}',
            dataType: 'json',
            data: {
                title: $('#new-serie-name-input').val(),
                ajax_submit: true
            }
        }).done(function (data) {

        });

        $('#rightMenuCollapse').find('.rightMenuCollapse_content').html('');

    }

    function show_dropdownCategory(_this) {
        $(_this).siblings('.dropdownCategory').addClass('on');
    }

    function saveInput_control_label_category(_this) {
        $(_this).closest('.column').removeClass('change');
        $(_this).addClass('hidden');
        $(_this).siblings('.changeLabel').removeClass('hidden');
        $(_this).siblings('.dropdown').find('.removeLabel').removeClass('hidden');

        var data = {
            id: $(_this).data('serie-id'),
            name: $(_this).closest('div').find('input[name="title"]').val(),
            ajax_submit: true
        };

        $.ajax({
            method: "POST",
            url: '{{urlloc('/admin/blog/series/edit')}}',
            dataType: 'json',
            data: data
        }).done(function (data) {

        });
    }

</script>