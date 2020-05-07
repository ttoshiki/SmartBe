jQuery(document).ready(function($){

  $('a').bind('focus',function(){if(this.blur)this.blur();});

  // header search select
  $('.header_search_inputs select').chosen({width:'100%', disable_search:true});
  $('.header_search_inputs select').on('chosen:showing_dropdown', function(event, obj){
    obj.chosen.dropdown.stop().css({opacity:0, height:'auto', clip:'auto'})
    var h = obj.chosen.dropdown.outerHeight();
    obj.chosen.dropdown.css({height:0}).animate({opacity:1, height:h}, 300);
  });
  $('.header_search_inputs select').on('chosen:hiding_dropdown', function(event, obj){
    obj.chosen.dropdown.stop().animate({opacity:0, height:0}, 300, function(){ obj.chosen.dropdown.find('.chosen-results').html(''); });
  });

  // header search and/or
  $('.header_search_keywords ul.search_keywords_operator').show();
  $('.header_search_keywords ul.search_keywords_operator li').click(function(){
    $(this).blur();
    var operator = $(this).text();
    if (operator != 'and' && operator != 'or') return;
    $(this).siblings('li').removeClass('active');
    $(this).addClass('active');
    $(this).closest('.header_search_keywords').find('input[name=search_keywords_operator]').val(operator);
  });

  // toggle tags for search results
  if ($('.archive_filter.is-open, .archive_filter.is-close').length) {
    if ($('.archive_filter').hasClass('is-open')) {
      document.cookie = 'gensen_archive_filter_toggle=open; path=/';
    } else {
      document.cookie = 'gensen_archive_filter_toggle=close; path=/';
    }
    $('.archive_filter .archive_filter_headline').click(function(){
      var $closest = $(this).closest('.archive_filter');
      if ($closest.hasClass('is-open')) {
        $closest.removeClass('is-open').addClass('is-close');
        $closest.find('.archive_filter_toggle').slideUp('fast');
        $closest.find('[name="filter_toggle"]').val('close');
        document.cookie = 'gensen_archive_filter_toggle=close; path=/';
      } else {
        $closest.removeClass('is-close').addClass('is-open');
        $closest.find('.archive_filter_toggle').slideDown('fast');
        $closest.find('[name="filter_toggle"]').val('open');
        document.cookie = 'gensen_archive_filter_toggle=open; path=/';
      }
    });
  }

  // click return top
  $('#return_top a').click(function() {
    $('html,body').animate({scrollTop : 0}, 1000, 'easeOutExpo');
    return false;
  });

  // show return top button
  var topBtn = $('#return_top');
  $(window).scroll(function () {
    var scrTop = $(this).scrollTop();
    if (scrTop > 100) {
      topBtn.stop().fadeIn('slow');
    } else {
      topBtn.stop().fadeOut();
    }
  });

  // mobile toggle global nav
  $('.menu_button').on('click', function(){
    if($('#header_search').is(':visible')) {
      $('#header_search').hide();
    }
    if($(this).hasClass('active')) {
      $(this).removeClass('active');
      $('#header').removeClass('active');
      $('#global_menu').hide();
      return false;
    } else {
      $(this).addClass('active');
      $('#header').addClass('active');
      $('#global_menu').show();
      return false;
    }
  });

  // mobile global nav toggle children
  $('#global_menu li > ul').parent().prepend('<span class="child_menu_button"><span class="icon"></span></span>');
  $('#global_menu .child_menu_button').on('click', function() {
    if($(this).parent().hasClass('open')) {
      $(this).parent().removeClass('open');
      $(this).siblings('.sub-menu').slideUp(300);
      return false;
    } else {
      $(this).parent().addClass('open');
      $(this).siblings('.sub-menu').slideDown(300);
      return false;
    }
  });

  // mobile toggle header search
  $('#header_top .search_button').on('click', function(){
    if($('.menu_button').hasClass('active')) {
      $('.menu_button').removeClass('active');
      $('#global_menu').hide();
    }
    if($('#header_search').is(':visible')) {
      $('#header').removeClass('active');
      $('#header_search').hide();
    } else {
      $('#header').addClass('active');
      $('#header_search').show();
    }
    return false;
  });

  // blog archive category hover
  $('a span[data-href]').hover(
    function() {
      var $a = $(this).closest('a');
      $a.attr('data-href', $a.attr('href'));
      if ($(this).attr('data-href')) {
        $a.attr('href', $(this).attr('data-href'));
      }
    },
    function() {
      var $a = $(this).closest('a');
      $a.attr('href', $a.attr('data-href'));
    }
  );

  init_introduce_list_col();
  $(window).resize(init_introduce_list_col);

  // introduce archive hover
  $(document).on('mouseenter', '.introduce_list_row .introduce_list_col', function() {
      if ($(this).hasClass('show_info') || $('body').width() <= 767) return;
      var $row = $(this).closest('.introduce_list_row');
      $row.find('.introduce_list_col.show_info').removeClass('show_info');
      $(this).addClass('show_info');
    }
  );

  // category widget
  $('.collapse_category_list li').hover(
    function(){
      $('>ul:not(:animated)',this).slideDown('fast');
      $(this).addClass('active');
    },
    function(){
       $('>ul',this).slideUp('fast');
       $(this).removeClass('active');
    }
  );

  // comment tab
  $('#trackback_switch').click(function(){
    $('#comment_switch').removeClass('comment_switch_active');
    $(this).addClass('comment_switch_active');
    $('#comment_area').animate({opacity: 'hide'}, 0);
    $('#trackback_area').animate({opacity: 'show'}, 1000);
    return false;
  });
  $('#comment_switch').click(function(){
    $('#trackback_switch').removeClass('comment_switch_active');
    $(this).addClass('comment_switch_active');
    $('#trackback_area').animate({opacity: 'hide'}, 0);
    $('#comment_area').animate({opacity: 'show'}, 1000);
    return false;
  });

});

// introduce archive col set width and height
function init_introduce_list_col(){
  var $cols = jQuery('.introduce_list_row .introduce_list_col');

  // remove added css
  $cols.find('a, .image, .image img, .info').removeAttr('style');

  // box size
  if (jQuery('body').width() > 767) {
    var w1 = $cols.not('.show_info').width();
    var w2 = $cols.filter('.show_info').width();
    $cols.find('.image').width(w1).height(w1);
    $cols.find('.image img').height(w1);
    $cols.find('.info').width(w1).height(w1).css('display', 'block');
    $cols.find('a').height(w1).width(w2);
  }

  // text max height
  $cols.each(function(){
    jQuery(this).find('.title, .excerpt').removeAttr('style');
    var remain_height = jQuery(this).height() - jQuery(this).find('.meta').outerHeight(true) - jQuery(this).find('.more').outerHeight(true);
    var $title = jQuery(this).find('.title');
    var $excerpt = jQuery(this).find('.excerpt');

    if ($title.innerHeight() > remain_height) {
      $excerpt.hide();
      var title_font_size = parseFloat($title.css('fontSize'));
      var title_line_height = parseFloat($title.css('lineHeight'));
      for (var i=2; i<=10; i++) {
        if (i * title_line_height  > remain_height || i == 10) {
          $title.css({
            maxHeight: (i-1) * title_line_height + 'px',
            overflow: 'hidden',
          });
          break;
        }
      }
    } else {
      remain_height -= $title.outerHeight(true);
      var excerpt_font_size = parseFloat($excerpt.css('fontSize'));
      var excerpt_line_height = parseFloat($excerpt.css('lineHeight'));
      var excerpt_line_height_offset = 0;
      if (excerpt_line_height > excerpt_font_size) {
        excerpt_line_height_offset = (excerpt_line_height - excerpt_font_size) / 2;
      }

      for (var i=1; i<=10; i++) {
        if (i * excerpt_line_height - excerpt_line_height_offset > remain_height || i == 10) {
          $excerpt.css({
            maxHeight: (i-1) * excerpt_line_height + 'px',
            overflow: 'hidden',
          });
          break;
        }
      }
    }
  });
};

// モーダルが複数ある場合
jQuery(function(){
  // モーダルのボタンをクリックした時
  jQuery('.modal_trigger .modal_btn').on('click',function(){
    var btnIndex = jQuery(this).index(); // 何番目のモーダルボタンかを取得
    jQuery('.modal_area .modal_box').eq(btnIndex).fadeIn(); // クリックしたモーダルボタンと同じ番目のモーダルを表示する
  });

  // ×やモーダルの背景をクリックした時
  jQuery('.modal_close,.modal_bg').click(function(){
    jQuery('.modal_box').fadeOut(); // モーダルを非表示にする
  });
});

// アコーディオン
jQuery(function(){
  jQuery(".openbtn").on("click", function() {
    jQuery(this).prev().slideToggle();
    jQuery(this).toggleClass("active");
    });
});

// セミナーイベント一覧 タブ
jQuery(function(){
  $(".seminar-event__tabButton").on("click", function() {
    $('.article').show();
    var index = $(".seminar-event__tabButton").index(this);
    $(".seminar-event__tabButton").removeClass("-show");
    $(this).addClass("-show");
    $(".seminar-event__item").removeClass("-show").eq(index).addClass('-show');
    $(".seminar-event__tagItem").removeClass("-active").eq(index).addClass('-active');

    if(index == 0) {
      $(".seminar-event__calendar").addClass("-show");
      $(".seminar-event__calendarCategories").css('display', 'none');
      $(".seminar-event__taxonomyButton").removeClass("-active");
    }
    if(index == 1) {
      $(".seminar-event__item.-show").css('height', 'auto');
    }

    // スマホのとき初期値に戻す
    $('.seminar-event__selector').val('all')
    $('.seminar-event__eventSelector').val('all');
  });

  $(".seminar-event__taxonomyButton").on("click", function() {
    $(".seminar-event__calendar").removeClass("-show");
    $(".seminar-event__calendarCategory").css('height', 'auto');
    $(".seminar-event__calendarCategories").css('display', 'block');
    $(".seminar-event__item.-show").css('height', 'auto');
    var taxonomyIndex = $(".seminar-event__taxonomyButton").index(this);
    $(".seminar-event__taxonomyButton").removeClass("-active");
    $(this).addClass("-active");
    $(".seminar-event__calendarCategory").removeClass("-show").eq(taxonomyIndex).addClass('-show');
    $('.seminar-event__calendarCategory').css('display', 'none');
    $('.seminar-event__calendarCategory.-show').css('display', 'block');

    // カテゴリで絞り込み表示
    $('.article').show();
    var classNames = $(this).attr('class');
    var className = classNames.split(' ').filter(function(className) {
      return className !== "seminar-event__taxonomyButton" && className !== "-active" && className !== "pc"
    });
    var categorySlug = className[0]
    console.log(categorySlug)
    $(".article").each( function() {
        if(!$(this).hasClass(categorySlug)) {
          $(this).hide();
        }
    });
  });

  $('.seminar-event__selector').change(function() {
    $(".seminar-event__calendar").removeClass("-show");
    $(".seminar-event__calendarCategory").css('height', 'auto');
    $(".seminar-event__calendarCategories").css('display', 'block');

    var val = Number($('.seminar-event__selector').val());
    if (isNaN(val)) {
      $(".seminar-event__calendarCategory").removeClass("-show");
      $(".seminar-event__calendarCategories").css('display', 'none');
      $(".seminar-event__calendar").addClass("-show");
    } else {
      $(".seminar-event__calendarCategory").removeClass("-show").eq(val).addClass('-show');
      $('.seminar-event__calendarCategory').css('display', 'none');
      $('.seminar-event__calendarCategory.-show').css('display', 'block');
    }
  })


  // スマホのセレクトボックスの操作
  $('.seminar-event__eventSelector').change(function() {
    $(".article").hide();
    var categorySlug = $('.seminar-event__eventSelector').val();

    if (categorySlug === 'all') {
      $(".article").show();
    } else {
      $(".article").each( function() {
          if($(this).hasClass(categorySlug)) {
            $(this).show();
          }
      });
    }
  })
});
