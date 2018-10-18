/**
 * Dave Rothfarb
 * 11-3-15
 *
 * This is a lame hack to allow all columns to be the same height regardless of
 * the amount of content in each. Normally flexbox would handle this but it is
 * not supported in IE8 which many users still have. Because this uses
 * Bootstrap and anchor links, this hack was the quickest way to achieve
 * results without having to modify css and layout structure
 */
(function($) {
  $(document).ready(function() {
    var sidebar = $('#sidebar');
    var content = $('#main-content');
    if ( $(sidebar).height() > $(content).height() ) {
      $(content).height( $(sidebar).height() );
    }
    else {
      $(sidebar).height( $(content).height() );
    }
  });
})(jQuery);
