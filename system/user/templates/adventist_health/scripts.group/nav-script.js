 $(document).ready(function(){
      $('.link--dropdown').click(function() {
        $('.link--dropdown').not(this).removeClass('link--open')
        $(this).toggleClass('link--open')
      });
    });
	