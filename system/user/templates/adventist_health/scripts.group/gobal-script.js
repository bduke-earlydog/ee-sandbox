 $(document).ready(function () {

      $('.js-mobile-open, .js-mobile-close').click(function () {
        $('.js-mobile').slideToggle();
        $('.js-mobile-icon').toggleClass('open');
        $('header').toggleClass('page-head--mobile');
        $('body').toggleClass('page--no-scroll');
      });
      
      // $('.js-notification-close').click(function() {
      //   Cookies.set('notificaton', 'yes');
      //   $('.js-notification').slideToggle(400, function() {
      //     updateHeaderHeight();
      //   });
      // });

      $('.link--dropdown').click(function () {
        $('.link--dropdown').not(this).removeClass('link--open');
        $(this).toggleClass('link--open');
      });

      function handleViewportResize() {
        var $listDropdownItems = $('.js-list .dropdown-nav__item');
        var $sidenavItems = $('.js-sidenav .sidenav__item');
        var listItemsToShow = 18;
        var sidenavItemsToShow = 12;

        if ($(window).width() <= 1000) {
          $listDropdownItems.add($sidenavItems).removeClass('item--hide');
        } else {
          $listDropdownItems.removeClass('item--hide');
          $listDropdownItems.slice(listItemsToShow).addClass('item--hide');
          $sidenavItems.removeClass('item--hide');
          $sidenavItems.slice(sidenavItemsToShow).addClass('item--hide');
          $('.js-sidenav-open').html('Show more services');
          $('.js-mobile').removeAttr('style');
          $('.js-mobile-icon').removeClass('open');
          $('header').removeClass('page-head--mobile');
          $('body').removeClass('page--no-scroll');
        }
      }

      handleViewportResize();
      updateHeaderHeight();
      updateSidenavVisibility();

      $(window).on('resize', function () {
        handleViewportResize();
        updateHeaderHeight();
      });

      function updateHeaderHeight() {
        var headerHeight = $(".js-header").height();
        document.documentElement.style.setProperty('--header-height', headerHeight + 'px');
      }

      function updateSidenavVisibility() {
        var $sidenavItems = $('.js-sidenav .sidenav__item');
        var itemsToShow = 12;
        var $sidenavOpenButton = $('.js-sidenav-open');
        $sidenavOpenButton.toggleClass('item--hide', $sidenavItems.length <= itemsToShow);
      }

      $('.js-sidenav-open').on('click', function () {
        var $sidenavItems = $('.js-sidenav .sidenav__item');
        var itemsToShow = 12;
        $sidenavItems.slice(itemsToShow).toggleClass('item--hide');
        updateSidenavVisibility();
        $(this).html(function (index, oldHtml) {
          return oldHtml === 'Show less services' ? 'Show more services' : 'Show less services';
        });
      });

      $('.js-accordion .js-open').on('click', function () {
        var $this = $(this),
          $next = $this.next();
        $next.slideToggle();
        $this.parent().toggleClass('open');
      });

      function debounce(func, wait, immediate) {
        var timeout;
        return function () {
          var context = this,
            args = arguments;
          var later = function () {
            timeout = null;
            if (!immediate) func.apply(context, args);
          };
          var callNow = immediate && !timeout;
          clearTimeout(timeout);
          timeout = setTimeout(later, wait);
          if (callNow) func.apply(context, args);
        };
      }

      var debouncedResize = debounce(handleViewportResize, 300);
      $(window).on('resize', debouncedResize);

    });