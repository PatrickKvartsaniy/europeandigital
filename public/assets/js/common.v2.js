$(function () {
    $('.nav__btn').click(function () {
        $('.nav').toggleClass('nav-mini');
        $('.time_circles > div').toggleClass('padd');
    });

    $('.report__time-circle').TimeCircles({
        "animation": "smooth",
        "bg_width": 0.3,
        "fg_width": 0.04,
        "circle_bg_color": "#90989F",
        "time": {
            "Days": {
                "text": "Дней",
                "color": "#00529D",
                "show": true
            },
            "Hours": {
                "text": "Часов",
                "color": "#00529D",
                "show": true
            },
            "Minutes": {
                "text": "Минут",
                "color": "#00529D",
                "show": true

            },
            "Seconds": {
                "show": false
            }
        }
    });

    $(window).resize(function () {
        $(".report__time-circle").TimeCircles().rebuild();
    });
    $('.report__time-circle').resize(function () {
        $(".this").TimeCircles().rebuild();
    });

    $('.report__btn').click(function () {
        $('.report__ask-block').addClass('active');
    });

    $('.report__ask-block').find('.close').click(function () {
        $(this).parent().removeClass('active');
    });

    $('.report__ask-block').find('.enter').click(function () {
        $(this).parent().removeClass('active');
    })

    $('.input').focus(function () {
        $(this).siblings('.input__placeholder').addClass('focus');
    });

    $('.input').focusout(function () {
        if (!$(this).val()) {
            $(this).siblings('.input__placeholder').removeClass('focus');
        }
    });

    $('.log-in-form').change(function () {
        $(this).find('.input').each(function () {
            if ($(this).val()) {
                $('.log-in-form__btn').removeAttr('disabled');
            } else {
                $('.log-in-form__btn').attr('disabled', 'true');
            }
        })
    });

    $('.input__wrapper--email').find('.input').change(function () {
        if ($(this).val()) {
            $('.input__icon--email').addClass('focus');
        } else {
            $('.input__icon--email').removeClass('focus');
        }
    });

    $('.input__icon--password').click(function () {
        $(this).toggleClass('shown');
        var pass = $(this).siblings('.input');
        var type = pass.attr('type');
        (type == "password") ? pass.attr('type', 'text'): pass.attr('type', 'password');
    });

    $('.autorize-2fx__input-wrapper').find('.autorize-2fx__input').keyup(function () {
        var input = $(this);
        var wrapper = input.parent('.autorize-2fx__input-wrapper');
        var value = input.val();
        if (value && value.length < 2) {
            $(this).focusout();
            wrapper.next().find('.input').focus();
        }
    });

    $(".rules-modal__info").mCustomScrollbar({
        theme: 'scrollbar-theme',
    });

    $('.tab').click(function () {
        var id_click = $(this).data('tab-btn-id');
        $('.tab').not($(this)).removeClass('active');
        $(this).addClass('active');
        $('.tab-item').removeClass('active');
        $('.tab-item[data-tab-id=' + id_click + ']').addClass('active');
    });

    //    $('.ban').click(function(){
    //        $(this).toggleClass('disable');
    //    })
    //    
    //    $('.apply').click(function(){
    //        $(this).toggleClass('disable');
    //    })
    //    
    function SlideBlock(btn, block) {
        var wrapper = $('.page-content__wrapper');
        $(btn).click(function () {
            wrapper.addClass('ov-visible');
            $(block).addClass('active');

            CloseSlideBlock(wrapper, block, '.close');
            CloseSlideBlock(wrapper, block, '.btn--cancel');
        })
    }

    function CloseSlideBlock(wrapper, block, close_btn) {
        $(block).find(close_btn).click(function () {
            wrapper.removeClass('ov-visible');
            $(this).closest(block).removeClass('active');
        })
    }

//    SlideBlock('.functional-btns__add-person-btn', '.add-person--admin');
    SlideBlock('.control__function-btn--edit', '.edit-person-info');
    SlideBlock('.advertisers__btn', '.edit-advertisers');
    SlideBlock('.view-invited__bnt', '.view-invited');
    SlideBlock('.users-hint', '.users-menu');
    SlideBlock('.partners-info', '.partnership-menu');
    //functional-btns__add-fond-btn
    function ShowBlock(btn, block) {

        $(btn).click(function () {
            $(this).siblings(block).show();
            $(document).mouseup(function (e) {
                var div = $(block);
                if (!div.is(e.target) &&
                    div.has(e.target).length === 0) {
                    div.hide();
                }
            });
        });
    }

    ShowBlock(".control__open-btn", '.control__window');
    ShowBlock('.finances__table .reject', '.finances__cancel-reason');
    ShowBlock('.partnership__table .ban:not(.disable)', '.partnership__cancel-reason');
    ShowBlock('.partnership__table .ban.disable', '.partnership__reject-date');

    $('.finances__cancel-reason__block').find('.cancel').click(function () {
        $('.finances__cancel-reason').hide();
    })

    function ShowBlock_2(btn, block) {

        $(btn).click(function () {
            $(this).find(block).show();
            $(document).mouseup(function (e) {
                var div = $(block);
                if (!div.is(e.target) &&
                    div.has(e.target).length === 0) {
                    div.hide();
                }
            });

            filterSelect();
        });
    }

    function filterSelect() {
        var option = $('.filter__option');

        $(option).click(function () {
            var option_val = $(this).text(),
                filter = $(this).closest('.filter'),
                cell = $(filter).find('.filter__current-option');

            $(filter).find(cell).html(option_val);
            $(filter).find(option).not(this).removeClass('current');
            $(this).addClass('current');
        })

    }

    ShowBlock_2('.filter', '.filter__select');
    ShowBlock_2('.input__wrapper--select', '.select__list')
    
    function checkCells(ckeck_id, table) {

        $(ckeck_id).parent('.checkbox').click(function () {

            if ($(ckeck_id).prop("checked")) {
                $(table).find('.cells-check').show();
                $(table).find('.number').hide();
                $('.action-selection').show();
            } else {
                $(table).find('.cells-check').hide();
                $(table).find('.number').show();
                $('.action-selection').hide();
            }

            checkAll(table);
        })

    }

    checkCells('#cells-main-check1', '#finances-table')

    function checkAll(table) {
        $(table).find('.cells-check--t-head').click(function () {
            if ($(this).find('input').prop("checked")) {
                $(table).find('.cells-check--t-cell').find('input').attr("checked", true);
            } else {
                $(table).find('.table__body').find('input').removeAttr("checked");
            }
        })
    }

    //advertiser-list

    function addAdvItem() {
        var btn = $('.advertisers-list__add-btn'),
            block = $('.advertisers-list__content'),
            input = $('.advertisers-list__input'),
            list = $('.advertisers-list__list');

        btn.click(function () {
            var input_val = $(this).siblings(input).val();
            if ((input_val)) {
                $(this).closest(block).find(list).append('<div class="advertisers-list__item"><div class="advertisers-list__close"></div><span class="advertisers-list__name">' + input_val + '</span></div>');
                $(this).siblings(input).val('');
                input.focus();
                clearAdvItem()
            }
        });
    }

    function clearAdvItem() {
        var block = $('.advertisers-list__content'),
            close_btn = $('.advertisers-list__close'),
            item = $('.advertisers-list__item'),
            reject = $('.reject');

        close_btn.click(function () {
            $(this).parent(item).remove();
        })

        block.find(reject).click(function () {
            $(this).closest(block).find(item).remove();
        })
    }

    function advertiser() {
        ShowBlock('.advertisers-list__open-list', '.advertisers-list__block');
        addAdvItem();
        clearAdvItem();
    }
    advertiser();

    function modalWindow(btn, block) {
        $(block).prepend('<div class="modal-close"><div class="modal-close__line"></div><div class="modal-close__line"></div></div>');

        $(btn).click(function (e) {
            e.preventDefault();
            var block_w = $(block).css('width'),
                block_h = $(block).css('height'),
                v_h = $(window).height();

            console.log(v_h);
            console.log($(block).height());

            if ($(block).height() > v_h) {
                $(block).css('overflow-y', 'scroll').css('max-height', '90vh');
                $(block).css('top', '10vh');
            } else {
                $(block).css('top', 'calc(50% - ' + block_h + ' / 2)');
            }

            $(block).css('left', 'calc(50% - ' + block_w + ' / 2)');

            $('.overlay').show().fadeIn(200);
            $(block).show(300);

            $(block).find('.modal-close').click(function () {
                $('.overlay').fadeOut(100).hide(50);
                $(block).hide(100);
            });

            // $('.overlay').click(function () {
            //     $(this).fadeOut(100).hide(50);
            //     $(block).hide(100);
            // })
        })
    }

    modalWindow('.add-fond__open-btn', '.add-fond-modal');
    modalWindow('.fond-item__balance-btn', '.fond-item-balance');
   // modalWindow('.add-transaction-btn', '.add-transaction-modal');
    modalWindow('.perfomence-modal-btn', '.perfomence-modal');
    modalWindow('.report-table .hint-btn', '.report-modal');
    modalWindow('.users-coin', '.modal');
    modalWindow('.functional-btns__add-person-btn', '#admin-modal-1');
    modalWindow('.admin-edit', '#admin-modal-2');
    modalWindow('.admin-hint', '#admin-modal-3');
    
    
});

$(document).ready(function() {
    $('.users-menu__close').on('click', function() {
        $('.users-menu').removeClass('active');
    });

    $('.status-offline').on('click', function() {
        $('.users-menu__last-seen').fadeToggle();
        setTimeout(function() {
            $('.users-menu__last-seen').fadeOut('slow');
        },3000);
    });

    $('.users__tab-btn').on('click', function(e) {
        e.preventDefault();
            var block_w = $('.users-modal').css('width'),
                block_h = $('.users-modal').css('height'),
                v_h = $(window).height();

            console.log(v_h);
            console.log($('.users-modal').height());

            if ($('.users-modal').height() > v_h) {
                $('.users-modal').css('overflow-y', 'scroll').css('max-height', '90vh');
                $('.users-modal').css('top', '5vh');
            } else {
                $('.users-modal').css('top', 'calc(50% - ' + block_h + ' / 2)');
            }

            $('.users-modal').css('left', 'calc(50% - ' + block_w + ' / 2)');
    });
    $('.add-invest-btn').on('click', function() {
        $('.inmodal-overlay').fadeIn();
        $('.inmodal-modal').fadeIn();
    });
    $('.inmodal-cancel').on('click', function() {
       $('.inmodal-overlay').fadeOut();
        $('.inmodal-modal').fadeOut(); 
    });
    $('.inmodal-close').on('click', function() {
       $('.inmodal-overlay').fadeOut();
        $('.inmodal-modal').fadeOut(); 
    });
    $('.partnership-menu__close').on('click', function() {
        $('.partnership-menu').removeClass('active');
    });
});

