$(document).ready(function(){
  
  /* -------------------------------------------------------------------------
    BANNER HEIGHT
  ------------------------------------------------------------------------- */
  var windowHeight = $(window).height();
  
  $('#banner, #banner .banner-bg, #banner .banner-bg-item').each(function () {
    var $this = $(this);

    $this.css('height', windowHeight);
  });

  /* -------------------------------------------------------------------------
    SELECT BOX 
  ------------------------------------------------------------------------- */
  $.fn.uouSelectBox = function() {

    var self = $(this),
      select = self.find('select');
    self.prepend('<ul class="select-clone custom-list"></ul>');

    var placeholder = select.data('placeholder') ? select.data('placeholder') : select.find('option:eq(0)').text(),
      clone = self.find('.select-clone');
    self.prepend('<input class="value-holder" type="text" disabled="disabled" placeholder="' + placeholder + '"><i class="fa fa-caret-up arrow-up"></i><i class="fa fa-caret-down arrow-down"></i>');
    var value_holder = self.find('.value-holder');

    // INPUT PLACEHOLDER FIX FOR IE
    if ($.fn.placeholder) {
      self.find('input, textarea').placeholder();
    }

    // CREATE CLONE LIST
    select.find('option').each(function() {
      if ($(this).attr('value')) {
        clone.append('<li data-value="' + $(this).val() + '">' + $(this).text() + '</li>');
      }
    });

    // TOGGLE LIST
    self.click(function() {
      var media_query_breakpoint = uouMediaQueryBreakpoint();
      if (media_query_breakpoint > 991) {
        clone.slideToggle(100);
        self.toggleClass('active');
      }
    });

    // CLICK
    clone.find('li').click(function() {

      value_holder.val($(this).text());
      select.find('option[value="' + $(this).attr('data-value') + '"]').attr('selected', 'selected');

      // IF LIST OF LINKS
      if (self.hasClass('links')) {
        window.location.href = select.val();
      }

    });

    // HIDE LIST
    self.bind('clickoutside', function(event) {
      clone.slideUp(100);
    });

    // LIST OF LINKS
    if (self.hasClass('links')) {
      select.change(function() {
        window.location.href = select.val();
      });
    }

  };

  /* -------------------------------------------------------------------------
    STYLE SWITCHER
  ------------------------------------------------------------------------- */
  var $body = $('body');
  var $head = $('head');

  (function () {

    /*!
     * jQuery Cookie Plugin v1.4.0
     * https://github.com/carhartl/jquery-cookie
     *
     * Copyright 2013 Klaus Hartl
     * Released under the MIT license
     */
    (function(a){if(typeof define==="function"&&define.amd){define(["jquery"],a)}else{if(typeof exports==="object"){a(require("jquery"))}else{a(jQuery)}}}(function(f){var a=/\+/g;function d(i){return b.raw?i:encodeURIComponent(i)}function g(i){return b.raw?i:decodeURIComponent(i)}function h(i){return d(b.json?JSON.stringify(i):String(i))}function c(i){if(i.indexOf('"')===0){i=i.slice(1,-1).replace(/\\"/g,'"').replace(/\\\\/g,"\\")}try{i=decodeURIComponent(i.replace(a," "));return b.json?JSON.parse(i):i}catch(j){}}function e(j,i){var k=b.raw?j:c(j);return f.isFunction(i)?i(k):k}var b=f.cookie=function(q,p,v){if(p!==undefined&&!f.isFunction(p)){v=f.extend({},b.defaults,v);if(typeof v.expires==="number"){var r=v.expires,u=v.expires=new Date();u.setTime(+u+r*86400000)}return(document.cookie=[d(q),"=",h(p),v.expires?"; expires="+v.expires.toUTCString():"",v.path?"; path="+v.path:"",v.domain?"; domain="+v.domain:"",v.secure?"; secure":""].join(""))}var w=q?undefined:{};var s=document.cookie?document.cookie.split("; "):[];for(var o=0,m=s.length;o<m;o++){var n=s[o].split("=");var j=g(n.shift());var k=n.join("=");if(q&&q===j){w=e(k,p);break}if(!q&&(k=e(k))!==undefined){w[j]=k}}return w};b.defaults={};f.removeCookie=function(j,i){if(f.cookie(j)===undefined){return false}f.cookie(j,"",f.extend({},i,{expires:-1}));return !f.cookie(j)}}));

    // CSS Styles
    $head.append('<link rel="stylesheet" href="css/style-switcher.css">');

    // HTML Code
    var $styleHTML = '<div id="style-switcher">';
        $styleHTML += '<a href="#" class="toggle fa fa-cog"></a>';

        $styleHTML += '<ul class="colors">';
          $styleHTML += '<li class="active"><a href="#" data-color-code="1e2e42"></a></li>';
          $styleHTML += '<li><a href="#" data-color-code="bcb49d" data-path="css/gold.css"></a></li>';
        $styleHTML += '</ul>';
      $styleHTML += '</div>';

    $body.append($styleHTML);

    var $switcher = $('#style-switcher'),
      $colors = $switcher.find('.colors > li > a'),
      has_color = false;

    // Onload Cookie Check
    var color_cookie = $.cookie('style-switcher-color');
    var toggle_cookie = $.cookie('style-switcher-toggle');

    if (color_cookie) {
      $head.append('<link id="style-switcher-css" rel="stylesheet" href="' + color_cookie + '">');
      has_color = true;
      $('a[data-path="' + color_cookie + '"]').parent('li').addClass('active').siblings('li').removeClass('active');
    }

    // if (!toggle_cookie) {
    //   $switcher.addClass('active');
    // }

    // Toggle
    $switcher.find('.toggle').on('click', function (event) {
      event.preventDefault();

      if (!$switcher.hasClass('active')) {
        $switcher.addClass('active');
        $.removeCookie('style-switcher-toggle');
      } else {
        $switcher.removeClass('active');
        $.cookie('style-switcher-toggle', 'hidden', { expires: 365 });
      }
    });

    // Buttons Colors
    $colors.each(function () {
      var $this = $(this);

      $this.css('background-color', '#' + $this.data('color-code'));
    });

    // Colors Toggle
    $colors.on('click', function (event) {
      event.preventDefault();

      var $this = $(this),
        $parent = $this.parent('li');

      if (!$parent.hasClass('active')) {
        var path = $this.data('path');

        if (!path) {
          $('#style-switcher-css').remove();
          has_color = false;
          $.removeCookie('style-switcher-color');
        } else if (has_color == false) {
          $head.append('<link id="style-switcher-css" rel="stylesheet" href="' + path + '">');
          has_color = true;
          $.cookie('style-switcher-color', path, { expires: 1 });
        } else {
          $('#style-switcher-css').attr('href', path);
          $.cookie('style-switcher-color', path, { expires: 1 });
        }

        $parent.addClass('active').siblings('li').removeClass('active');
      }
    });

  })();
  
  /* -------------------------------------------------------------------------
    RADIAL PROGRESS BAR
  ------------------------------------------------------------------------- */

  $.fn.uouRadialProgressBar = function(){

    var self = $(this),
    percentage = self.data( 'percentage' ) ? parseInt( self.data( 'percentage' ) ) : 100,
    html = '',
    media_query_breakpoint = uouMediaQueryBreakpoint();

    // CREATE HTML
    html += '<div class="loader"><div class="loader-bg"><div class="text">0%</div></div>';
    html += '<div class="spiner-holder-one animate-0-25-a"><div class="spiner-holder-two animate-0-25-b"><div class="loader-spiner" style=""></div></div></div>';
    html += '<div class="spiner-holder-one animate-25-50-a"><div class="spiner-holder-two animate-25-50-b"><div class="loader-spiner"></div></div></div>';
    html += '<div class="spiner-holder-one animate-50-75-a"><div class="spiner-holder-two animate-50-75-b"><div class="loader-spiner"></div></div></div>';
    html += '<div class="spiner-holder-one animate-75-100-a"><div class="spiner-holder-two animate-75-100-b"><div class="loader-spiner"></div></div></div>';
    html += '</div>';
    self.prepend( html );

    // SET PERCENTAGE FUNCTION
    var set_percentage = function( percentage ){
      if ( percentage < 25 ) {
        var angle = -90 + ( percentage / 100 ) * 360;
        self.find( '.animate-0-25-b' ).css( 'transform', 'rotate(' + angle + 'deg)' );
      }
      else if ( percentage >= 25 && percentage < 50 ) {
        var angle = -90 + ( ( percentage - 25 ) / 100 ) * 360;
        self.find( '.animate-0-25-b' ).css( 'transform', 'rotate(0deg)' );
        self.find( '.animate-25-50-b' ).css( 'transform', 'rotate(' + angle + 'deg)' );
      }
      else if ( percentage >= 50 && percentage < 75 ) {
        var angle = -90 + ( ( percentage-50 ) / 100 ) * 360;
        self.find( '.animate-25-50-b, .animate-0-25-b' ).css( 'transform', 'rotate(0deg)' );
        self.find( '.animate-50-75-b' ).css( 'transform' , 'rotate(' + angle + 'deg)' );
      }
      else if ( percentage >= 75 && percentage <= 100 ) {
        var angle = -90 + ( ( percentage - 75 ) / 100 ) * 360;
        self.find(' .animate-50-75-b, .animate-25-50-b, .animate-0-25-b' ).css( 'transform', 'rotate(0deg)' );
        self.find( '.animate-75-100-b' ).css( 'transform', 'rotate(' + angle + 'deg)' );
      }
      self.find( '.text' ).html( percentage + '%' );
    }

    var clearProgress = function() {
      self.find( '.animate-75-100-b, .animate-50-75-b, .animate-25-50-b, .animate-0-25-b' ).css( 'transform', 'rotate(90deg)' );
    }

    // SET PERCENTAGE
    if ( $( 'body' ).hasClass( 'enable-inview-animations' ) && media_query_breakpoint > 991 ) {
      self.one( 'inview', function(){
        for ( var i = 0; i <= percentage; i++ ) {
          (function(i) {
            setTimeout(function(){ set_percentage( i ); }, i * 20);
          })(i);
        }
      });
    }
    else {
      set_percentage( percentage );
    }

  };

  /* -------------------------------------------------------------------------
    BANNER
  ------------------------------------------------------------------------- */

  $('#banner .banner-bg').each(function() {

    var self = $(this),
      images = self.find('.banner-bg-item');

    // SET BG IMAGES
    images.each(function() {
      var img = $(this).find('img');
      if (img.length > 0) {
        $(this).css('background-image', 'url(' + img.attr('src') + ')');
        img.hide();
      }
    });

    // INIT SLIDER
    if ($.fn.owlCarousel) {
      self.owlCarousel({
        slideSpeed: 300,
        pagination: true,
        navigation: true,
        paginationSpeed: 400,
        singleItem: true,
        addClassActive: true,
        afterMove: function() {
          // ACTIVATE TAB
          var active_index = self.find('.owl-item.active').index();
          $('.banner-search-inner .tab-title:eq(' + active_index + ')').trigger('click');
        }
      });
    }

    // SET DEFAULT IF NEEDED
    var active_tab_index = $('.banner-bg-item.active, .banner-search-inner .tab-title.active').index();
    if (active_tab_index !== 0) {
      self.trigger('owl.jumpTo', active_tab_index);
    }

  });

  $('.banner-search-inner').each(function() {

    var self = $(this),
      tabs = self.find('.tab-title'),
      contents = self.find('.tab-content');

    // TAB CLICK
    tabs.click(function() {
      if (!$(this).hasClass('active')) {
        var index = $(this).index();
        tabs.filter('.active').removeClass('active');
        $(this).addClass('active');
        contents.filter('.active').hide().removeClass('active');
        contents.filter(':eq(' + index + ')').fadeToggle().addClass('active');

        // CHANGE BG
        if ($.fn.owlCarousel) {
          $('#banner .banner-bg').trigger('owl.goTo', index);
        }

      }
    });

  });

  /* -------------------------------------------------------------------------
    TABBED
  ------------------------------------------------------------------------- */

  $.fn.uouTabbed = function(){

    var self = $(this),
    tabs = self.find( '> .tab-title-list > .tab-title' ),
    contents = self.find( '> .tab-content-list > .tab-content' );

    tabs.click(function(e){
      if ( ! $(this).hasClass( 'active' ) ) {
        var index = $(this).index();
        tabs.filter( '.active' ).removeClass( 'active' );
        $(this).addClass( 'active' );
        contents.filter( '.active' ).hide().removeClass( 'active' );
        contents.filter( ':eq(' + index + ')' ).show().addClass( 'active' );

        // CHANGE LOCATION HASH IF NEEDED
        var target = $(e.target);
        if ( target.attr( 'href' ) ) {
          if ( history.pushState ) {
            history.pushState( null, null, target.attr( 'href' ) );
          }
          else {
            location.hash = target.attr( 'href' );
          }
        }
		
		// CHECK IF THE ISOTOPE IS NESTED HERE AND REFRESH LAYOUT
		if(contents.find('.isotope').length > 0){
			contents.find('.isotope').each(function(){
				$('.isotope').isotope('layout');
			});
		}
		
        return false;

      }
    });

  };
    
  /* -------------------------------------------------------------------------
    LIGHTBOX
  ------------------------------------------------------------------------- */

	// LIGHTBOX STRINGS SETUP
	$.extend( true, $.magnificPopup.defaults, {
		tClose: 'Close (Esc)',
		tLoading: 'Loading...',
		gallery: {
			tPrev: 'Previous (Left arrow key)', // Alt text on left arrow
			tNext: 'Next (Right arrow key)', // Alt text on right arrow
			tCounter: '%curr% / %total%' // Markup for "1 of 7" counter
		},
		image: {
			tError: '<a href="%url%">The image</a> could not be loaded.' // Error message when image could not be loaded
		},
		ajax: {
			tError: '<a href="%url%">The content</a> could not be loaded.' // Error message when ajax request failed
		}
	});

  // FUNCTION
	$.fn.uouInitLightboxes = function(){
		if ( $.fn.magnificPopup ) {
			$(this).find( 'a.lightbox' ).each(function(){

				var self = $(this),
				lightbox_group = self.data( 'lightbox-group' ) ? self.data( 'lightbox-group' ) : false;

				if ( lightbox_group ) {
					$( 'a.lightbox[data-lightbox-group="' + lightbox_group + '"]' ).magnificPopup({
						type: 'image',
						removalDelay: 300,
						mainClass: 'mfp-fade',
						gallery: {
							enabled: true
						}
					});
				}
				else {
					self.magnificPopup({
						type: 'image'
					});
				}

			});
		}
	};

  /* -------------------------------------------------------------------------
    RADIO INPUT
  ------------------------------------------------------------------------- */
  $.fn.uouRadioInput = function(){

    var self = $(this),
    input = self.find( 'input' ),
    group = input.attr( 'name' );

    // INITIAL STATE
    if ( input.is( ':checked' ) ) {
      self.addClass( 'active' );
    }

    // CHANGE STATE
    input.change(function(){
      if ( group ) {
        $( '.radio-input input[name="' + group + '"]' ).parent().removeClass( 'active' );
      }
      if ( input.is( ':checked' ) ) {
        self.addClass( 'active' );
      }
    });

  };

 /* -------------------------------------------------------------------------
    CHECKBOX INPUT
  ------------------------------------------------------------------------- */
  $.fn.uouCheckboxInput = function(){

    var self = $(this),
    input = self.find( 'input' );

    // INITIAL STATE
    if ( input.is( ':checked' ) ) {
      self.addClass( 'active' );
    }
    else {
      self.removeClass( 'active' );
    }

    // CHANGE STATE
    input.change(function(){
      if ( input.is( ':checked' ) ) {
        self.addClass( 'active' );
      }
      else {
        self.removeClass( 'active' );
      }
    });

  };

  /* -------------------------------------------------------------------------
    FORM VALIDATION
  ------------------------------------------------------------------------- */

  $.fn.uouFormValid = function() {

    function emailValid( email ) {
      var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    }

    var form = $(this),
    formValid = true;

    form.find( 'input.required, textarea.required, select.required' ).each(function(){

      var field = $(this),
      value = field.val(),
      valid = false;

      if ( value.trim() !== '' ) {

        // email field
        if ( field.hasClass( 'email' ) ) {
          if ( ! emailValid( value ) ) {
            field.addClass( 'error' );
          }
          else {
            field.removeClass( 'error' );
            valid = true;
          }
        }

        // select field
        else if ( field.prop( 'tagName' ).toLowerCase() === 'select' ) {

          if ( value === null || value === field.data( 'placeholder' ) ) {
            field.addClass( 'error' );
            field.parents( '.select-box' ).addClass( 'error' );
          }
          else {
            field.removeClass( 'error' );
            valid = true;
          }
        }

        // default field
        else {
          field.removeClass( 'error' );
          valid = true;
        }

      }
      else {
        field.addClass( 'error' );
      }
      formValid = ! valid ? false : formValid;

    });

    return formValid;

  };

  /* -------------------------------------------------------------------------
    PRICE FILTER
  ------------------------------------------------------------------------- */
  $( '.fleets-search-filter .slider-range-container' ).each(function(){
    if ( $.fn.slider ) {

      var self = $(this),
      slider = self.find( '.slider-range' ),
      min = slider.data( 'min' ) ? slider.data( 'min' ) : 100,
      max = slider.data( 'max' ) ? slider.data( 'max' ) : 2000,
      step = slider.data( 'step' ) ? slider.data( 'step' ) : 100,
      default_min = slider.data( 'default-min' ) ? slider.data( 'default-min' ) : 100,
      default_max = slider.data( 'default-max' ) ? slider.data( 'default-max' ) : 500,
      currency = slider.data( 'currency' ) ? slider.data( 'currency' ) : '$',
      input_from = self.find( '.range-from' ),
      input_to = self.find( '.range-to' );

      input_from.val( currency + ' ' + default_min );
      input_to.val( currency + ' ' + default_max );

      slider.slider({
        range: true,
        min: min,
        max: max,
        step: step,
        values: [ default_min, default_max ],
        slide: function( event, ui ) {
          input_from.val( currency + ' ' + ui.values[0] );
          input_to.val( currency + ' ' + ui.values[1] );
        }
      });

    }
  });

 /* -------------------------------------------------------------------------
    SUPERTABS
  ------------------------------------------------------------------------- */
  $('.tabs-navigation .tab-title-list li').each(function() {
    var self = $(this);
    $(this).click(function() {
      $('.tabs-navigation .tab-title-list li').each(function() {
        $(this).removeClass("active");
        $(this).css("border-top-color", "#e5e5e5");
      });
      self.addClass("active");
      self.next().css("border-top-color", "#f5f5f5");
      $('.tabs-content .tab-content-list li').each(function() {
        $(this).hide();
      });
      $(self.attr('data-href')).fadeToggle();
      return false;
    });
    $(self.attr('data-href')).css("background-image", "url(" + $(self.attr('data-href')).attr('data-bgimage') + ")")
  });
  $(".tabs-content .tab-content-list li").each(function(){
    $(this).css("height",  $(".tabs-navigation").height());
  });
  $(".tab-title-list li:first-child").click();

  /* -------------------------------------------------------------------------
     HEADER MENU
   ------------------------------------------------------------------------- */
  $('.navbar-nav').each(function() {

    var self = $(this);

    // HOVER SUBMENU
    self.find('li.has-submenu').hover(function() {
      if (media_query_breakpoint > 991) {
        $(this).addClass('hover');
        $(this).find('> ul').stop(true, true).fadeIn(200);
      }
    }, function() {
      if (media_query_breakpoint > 991) {
        $(this).removeClass('hover');
        $(this).find('> ul').stop(true, true).delay(10).fadeOut(200);
      }
    });

    // CREATE TOGGLE BUTTONS

    self.find('li.has-submenu>ul>li.has-submenu>a').each(function() {
      $(this).append('<button class="submenu-toggle"><i class="fa fa-caret-right"></i></button>');
    });

    self.find( 'li.has-submenu' ).each(function(){
      $(this).append( '<button class="submenu-toggle"><i class="fa fa-chevron-down"></i></button>' );
    });

    // TOGGLE SUBMENU
    self.find('.submenu-toggle').each(function() {
      $(this).click(function() {
        $(this).parent().find('> .sub-menu').slideToggle(200);
        $(this).find('.fa').toggleClass('fa-chevron-up fa-chevron-down');
      });
    });

  });

/* -------------------------------------------------------------------------
    HEADER LANGUAGE
  ------------------------------------------------------------------------- */
  $('.header-language').each(function() {

    var self = $(this);

    // HOVER
    self.hover(function() {
      if (media_query_breakpoint > 991) {
        self.find('.header-btn').addClass('hover');
        self.find('.header-form').show();
        self.find('.header-form ul').stop(true, true).slideDown(200);
      }
    }, function() {
      if (media_query_breakpoint > 991) {
        self.find('.header-btn').removeClass('hover');
        self.find('.header-form ul').stop(true, true).delay(10).slideUp(200, function() {
          self.find('.header-form').hide();
        });
      }
    });

  });

  /* -------------------------------------------------------------------------
    HEADER LOGIN
  ------------------------------------------------------------------------- */
  $('.header-login').each(function() {

    var self = $(this),
      form_holder = self.find('.header-form'),
      btn = self.find('.header-btn');

    // HOVER
    self.hover(function() {
      if (media_query_breakpoint > 991) {
        self.find('.header-btn').addClass('hover');
        form_holder.stop(true, true).slideDown(200);
      }
    }, function() {
      if (media_query_breakpoint > 991) {
        self.find('.header-btn').removeClass('hover');
        form_holder.stop(true, true).delay(10).slideUp(200);
      }
    });

    // VALIDATE FORM
    $( '.header-form' ).submit(function(){

      var form = $(this);
      if ( form.uouFormValid() ) {
        form.find( '.alert-message.warning:visible' ).slideUp(300);
      }
      else {
        form.find( '.alert-message.warning' ).slideDown(300);
        return false;
      }

    });

    // TOGGLE
    btn.click(function() {
      if (media_query_breakpoint <= 991) {
        self.find('.header-btn').toggleClass('hover');
        form_holder.stop(true, true).slideToggle(200);
      }
    });

  });

 /* -------------------------------------------------------------------------
    TOGGLE
  ------------------------------------------------------------------------- */
  $.fn.uouToggle = function(){
    var self = $(this),
    title = self.find( '.toggle-title' ),
    content = self.find( '.toggle-content' );
    title.click(function(){
      self.toggleClass( 'closed' );
      if(!self.hasClass('closed')){
        fixSidebarHeight();
      } else{
        content.css("min-height", "0");
      }
      content.slideToggle(400);
    });
  };
  
  // NAVBAR TOGGLE
  $( '#toggle' ).click(function(){
    if (!$('#toggle.toggle').hasClass("toggled")) {
        justAdded = true;
        $('#toggle.toggle').addClass("toggled");
      }else {
        $('#toggle.toggle').removeClass("toggled");
      }
    $( '.header-tool-bar, .header-nav' ).slideToggle(300, function(){
      $('.header-navbar').toggleClass("hidden");
    });
  });

  /* -------------------------------------------------------------------------
    ALERT MESSAGES
  ------------------------------------------------------------------------- */
  $.fn.uouAlertMessage = function(){

    var self = $(this),
    close = self.find( '.close' );
    close.click(function(){
      self.slideUp(300);
    });

  };

  /* -------------------------------------------------------------------------
    BACK TO TOP BUTTON
  ------------------------------------------------------------------------- */
  $('#back-to-top').each(function () {

    var $this = $(this);

    $this.on('click', function (event) {
      event.preventDefault();
      $('html, body').animate({ scrollTop: 0 }, 500);
    });

    $(window).scroll(function () {
      if ($(this).scrollTop() > 300) {
        $this.fadeIn(200);
      } else if ($(this).scrollTop() < 250) {
        $this.fadeOut(200);
      }
    });

  });

 /* -------------------------------------------------------------------------
    DATEPICKER 
  ------------------------------------------------------------------------- */
  $('.calendar').each(function() {

    var input = $(this).find('input'),
      dateformat = input.data('dateformat') ? input.data('dateformat') : 'm/d/y',
      icon = $(this).find('.fa'),
      widget = input.datepicker('widget');

    input.datepicker({
      dateFormat: dateformat,
      minDate: 0,
      beforeShow: function() {
        input.addClass('active');
      },
      onClose: function() {
        input.removeClass('active');
        // TRANSPLANT WIDGET BACK TO THE END OF BODY IF NEEDED
        widget.hide();
        if (!widget.parent().is('body')) {
          widget.detach().appendTo($('body'));
        }
      }
    });
    icon.click(function() {
      input.focus();
    });

  });
  
  /* -------------------------------------------------------------------------
    ISOTOPE
  ------------------------------------------------------------------------- */
  $('.fleet-filters').each(function() {
    var $container = $('.fleet-gallery').isotope({
      itemSelector: '.fleet-gallery li',
      layoutMode: 'fitRows'
    });
     var filterFns = {
      };

    $('.fleet-filters').on( 'click', '.btn', function() {
      var filterValue = $( this ).attr('data-filter');
      // use filterFn if matches value
      filterValue = filterFns[ filterValue ] || filterValue;
      $container.isotope({ filter: filterValue });

      $('.fleet-filters .btn').each(function(){
        $(this).removeClass("active");
      });
      $(this).addClass("active");

      return false;
    });
  });

  /* -------------------------------------------------------------------------
    MEDIA QUERY BREAKPOINT
  ------------------------------------------------------------------------- */
  var uouMediaQueryBreakpoint = function() {

    if ($('#media-query-breakpoint').length < 1) {
      $('body').append('<var id="media-query-breakpoint"><span></span></var>');
    }
    var value = $('#media-query-breakpoint').css('content');
    if (typeof value !== 'undefined') {
      value = value.replace("\"", "").replace("\"", "").replace("\'", "").replace("\'", "");
      if (isNaN(parseInt(value, 10))) {
        $('#media-query-breakpoint span').each(function() {
          value = window.getComputedStyle(this, ':before').content;
        });
        value = value.replace("\"", "").replace("\"", "").replace("\'", "").replace("\'", "");
      }
      if (isNaN(parseInt(value, 10))) {
        value = 1199;
      }
    } else {
      value = 1199;
    }
    return value;

  };

  /* -------------------------------------------------------------------------
    GENERAL
  ------------------------------------------------------------------------- */
  // GET ACTUAL MEDIA QUERY BREAKPOINT
  var media_query_breakpoint = uouMediaQueryBreakpoint();

  // VALIDATE FORM COMMENTS
  $( '.post-addcomment' ).submit(function(){

    var form = $(this);
    if ( form.uouFormValid() ) {
      form.find( '.alert-message.warning:visible' ).slideUp(300);
    }
    else {
      form.find( '.alert-message.warning' ).slideDown(300);
      return false;
    }
  });

  // VALIDATE FORM CONTACT
  $( '.contact-form' ).submit(function(){

    var form = $(this);
    if ( form.uouFormValid() ) {
      form.find( '.alert-message.warning:visible' ).slideUp(300);
    }
    else {
      form.find( '.alert-message.warning' ).slideDown(300);
      return false;
    }
  });

  // CHECKBOX INPUT
  $( '.checkbox-input' ).each(function(){
    $(this).uouCheckboxInput();
  });

  // RADIO INPUT 
  $( '.radio-input' ).each(function(){
    $(this).uouRadioInput();
  });

  // SELECT BOX
  $( '.select-box' ).each(function(){
    $(this).uouSelectBox();
  });

  // TESTIMONIALS SLIDER
  $("#owl-testimonials").owlCarousel({
    slideSpeed: 300,
    paginationSpeed: 400,
    items: 1,
    itemsDesktop : [1199,1],
    itemsDesktopSmall : [980,1],
    itemsTablet: [768,1],
    itemsMobile : [479,1],
  });

  // INPUT PLACEHOLDER FIX FOR IE
  if ( $.fn.placeholder ) {
    $( 'input, textarea' ).placeholder();
  }

  // TOGGLES
  $( '.toggle-container' ).each(function(){
    $(this).uouToggle();
  });

  // ALERT MESSAGES
  $( '.alert-message' ).each(function(){
    $(this).uouAlertMessage();
  });

  // PROGRESS BARS
  $( '.radial-progress-bar' ).each(function(){
    $(this).uouRadialProgressBar();
  });

  // TABS
  $( '.tabs-container' ).each(function(){
    $(this).uouTabbed();
  });
    
  // LIGHTBOXES
  $( 'body' ).uouInitLightboxes();

  // FIX FILTER SIDEBAR HEIGHT
  var fixSidebarHeight = function(){
    if(media_query_breakpoint > 1199){
      $('.toggle-content').css("min-height", ($('.fleet-listing').height()) + 10);
      } else{
      $('.toggle-content').css("min-height", "0");
      }
      $(window).resize(function(){
      if(media_query_breakpoint > 1199){
      $('.toggle-content').css("min-height", ($('.fleet-listing').height()) + 10);
      } else{
      $('.toggle-content').css("min-height", "0");
      }
    });
  }

  fixSidebarHeight();

  // FIX FILTER SIDEBAR CLOSED
   $('.fleets-filters-title').click(function(){
    if($(this).parent().hasClass('closed')){
      setTimeout(function(){
        $('.fleet-listing').parent().removeClass('col-lg-9', 400, "swing");
        $('.fleet-listing').parent().addClass('col-lg-12', 400, "swing");
      }, 400);
    } else{
      $('.fleet-listing').parent().removeClass('col-lg-12', 400, "swing");
      $('.fleet-listing').parent().addClass('col-lg-9', 400, "swing");
    }
  });
    
  $(window).resize(function(){
    if ( uouMediaQueryBreakpoint() !== media_query_breakpoint ) {
      media_query_breakpoint = uouMediaQueryBreakpoint();

      /* RESET HEADER ELEMENTS */
      $( '.header-navbar, .header-language ul, .header-form, .header-nav, .header-nav ul, .has-submenu .sub-menu, .toggle-content, .header-tool-bar, .sub-menu' ).removeAttr( 'style' );
      $( '.submenu-toggle .fa' ).removeClass( 'fa-chevron-up' ).addClass( 'fa-chevron-down' );
      $( '.header-btn' ).removeClass( 'hover' );
      $( '#toggle' ).removeClass( 'toggled' );
      if(media_query_breakpoint > 1199){
        $( '.fleets-filters-title').parent().removeClass('closed');
        $(' .fleet-listing').parent().removeClass('col-lg-12');
        $(' .fleet-listing').parent().addClass('col-lg-9');
      } else{
        $( '.fleets-filters-title').parent().addClass('closed');
      }
    }
  });

  if(media_query_breakpoint <= 1199){
    $( '.fleets-filters-title').parent().addClass('closed');
  }
  
  /* -------------------------------------------------------------------------
    MAPS
  ------------------------------------------------------------------------- */
  var gmapOptions = {
    zoom:12,
    mapTypeId: "subtle",
    mapTypeControl: false,
    mapTypeControlOptions: {
      mapTypeIds: ["subtle"]
    },
    navigationControl: false,
    scrollwheel: false,
    draggable: false,
    streetViewControl: false,
    disableDefaultUI: true,
  };

  var subtleOptions = {
    id: "subtle",
    options:{
      name: "Subtle Grayscale"
    },
    styles: [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}]
  };

  // OUR LOCATION MAP SETTINGS
  $('#map-our_location').width("100%").height("468px").gmap3({
    map:{
      options: gmapOptions,
    },
    styledmaptype: subtleOptions,
  marker:{
    values: [
    {
      latLng:[44.28952958093682, 6.152559438984804],
      options:{
        icon: "img/marker.png"
      }
    },
    {
      latLng:[44.28952958093682, -1.1501188139848408],
      options:{
        icon: "img/marker.png"
      }
    }
    ],
  }
  },"autofit");

  // LOCATIONS MAP SETTINGS
  $('#map-locations').width("100%").height("500px").gmap3({
    map:{
      options: gmapOptions,
    },
    styledmaptype: subtleOptions,
  marker:{
    values: [
    {
      latLng:[45.6626514, -95.6528297],
      options:{
        icon: "img/marker.png"
      }
    },
    {
      latLng:[44.28952958093682, -1.1501188139848408],
      options:{
        icon: "img/marker.png"
      }
    }
    ],
  }
  },"autofit");
  
  // CONTACT1 MAP SETTINGS
  $('#map-contact1').width("100%").height($('section.contact-map').height()).gmap3({
    map:{
      address: "Victoria 3000, Australia",
      options: gmapOptions,
    },
    styledmaptype: subtleOptions,
  });

  // CONTACT2 MAP SETTINGS
  $('#map-contact2').width("100%").height('560px').gmap3({
    map:{
      address: "Warsaw, Poland",
      options: gmapOptions,
    },
    styledmaptype: subtleOptions,
	marker:{
		latLng: [52.2409067,20.9113297],
		options:{
			icon: 'img/marker2.png',
		}
	}
  });
});