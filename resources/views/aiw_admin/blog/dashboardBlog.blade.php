@extends('guest_layouts.admin.default')

@section('content')

    <div class="page_blog">
        <div class="contentTopInfoSection">
            <h1>Блог</h1>

            <div class="col-right-grid">
               <button type="button" class="btn-add btn-def-admin nonBgCl marg_l_r_15 open_right_menu" onclick="rightMenuCollapse(this);"><i class="fa fa-tags" aria-hidden="true"></i> <span>Метки</span></button>
               <button type="button" class="btn-add btn-def-admin nonBgCl marg_l_r_15 open_right_menu" onclick="rightMenuCollapse(this);"><i class="fa fa-list-ul" aria-hidden="true"></i> <span>Категории</span></button>
               <button type="button" class="btn-add btn-def-admin marg_l_r_15 open_right_menu" onclick="rightMenuCollapse(this);"><i class="fa fa-plus-circle" aria-hidden="true"></i> <span>Добавить пост</span></button>
            </div>
        </div>
        <div class="contentTopInfoSection padding-left-none padding-top-none">
            <div class="adminBlockFilters">
                <section class="inline_block">
                    <span>Категории</span>
                    <select>
                        <option value="Все">Все</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </section>
                <section class="inline_block">
                    <span>Дата создания:</span>
                    <select>
                        <option value="Любая">Любая</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </section>
            </div>
            <div class="inline_block search-parent">
                <input type="text" placeholder="Поиск"> <i class="fa fa-search" aria-hidden="true"></i>
            </div>
        </div>

        <div class="scrollTable">
            <table style="width: 100%">
                <thead>
                <tr>
                    <td>Публикация</td>
                    <td>Анонс</td>
                    <td>Категория</td>
                    <td>Метки</td>
                    <td>Дата создания</td>
                    <td>Управление</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="flex">
                        <img src="/{!! config('constant.upload_path_custom.logo').config('constant.custom_images.test_photo_3') !!}">
                        <span>Представляем новый способ, чтобы построить свой интернет магазин 22</span>
                    </td>
                    <td>
                        <span>Brochure Pitching</span>
                    </td>
                    <td>
                        <span>Электронная коммерция; Партнерская программа </span>
                    </td>
                    <td>
                        <span class="blue">Электронная коммерция;</span>
                        <span class="blue">Партнерская программа</span>
                    </td>
                    <td>
                        <span>02.10.2016</span>
                        <span class="block">12:22</span>
                    </td>
                    <td>
                        <button type="button" onclick="rightMenuCollapse(this);" class="inline_block td_admin_change open_right_menu">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </button>
                        <div class="dropdown inline_block">
                            <button id="changeInput_control_label-2" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" type="button"
                                    class="removeLabel td_admin_change red"><i class="fa fa-times" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu UL-removeLabel"
                                aria-labelledby="changeInput_control_label-2">
                                <li>
                                    <p class="grid">
                                        <img src="/{!! config('constant.upload_path_custom.logo').config('constant.custom_images.AlertAdmin') !!}">
                                        <span>Вы действительно хотите удалить запись блога ?</span>
                                    </p>
                                    <p class="grey">Это действие не обратимо</p>
                                    <div>
                                        <button type="button" class="cancel">ОТМЕНИТЬ</button>
                                        <button type="button" class="delete">УДАЛИТЬ</button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>



                </tbody>
            </table>
        </div>



    </div>
@stop