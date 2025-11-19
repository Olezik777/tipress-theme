jQuery(function ($) {
    var $wrap = $('#doctors-grid-wrapper');
    if (!$wrap.length || typeof TipressDoctors === 'undefined') return;
  
    function loadDoctors(term, page) {
      term = term || 'all';
      page = page || 1;
  
      $wrap.addClass('is-loading');
  
      $.post(TipressDoctors.ajax_url, {
        action: 'tipress_doctors_filter',
        nonce: TipressDoctors.nonce,
        term: term,
        page: page,
        lang: TipressDoctors.lang
      })
        .done(function (response) {
          if (response && response.success && response.data && response.data.html) {
            $wrap
              .attr('data-term', term)
              .attr('data-page', page)
              .html(response.data.html)
              .removeClass('is-loading')
              .addClass('is-loaded');
  
            // лёгкая анимация появления
            setTimeout(function () {
              $wrap.removeClass('is-loaded');
            }, 200);
          } else {
            $wrap.removeClass('is-loading');
          }
        })
        .fail(function () {
          $wrap.removeClass('is-loading');
        });
    }
  
    // Клик по фильтру
    $('.doctors-filter-nav').on('click', 'button', function (e) {
      e.preventDefault();
      var $btn = $(this);
      if ($btn.hasClass('is-active')) return;
  
      $('.doctors-filter-nav button').removeClass('is-active');
      $btn.addClass('is-active');
  
      loadDoctors($btn.data('term'), 1);
    });
  
    // Пагинация
    $wrap.on('click', '.doctors-pagination a', function (e) {
      e.preventDefault();
      var page = $(this).data('page');
      if (!page) return;
  
      var term = $wrap.attr('data-term') || 'all';
      loadDoctors(term, page);
    });
  });
  