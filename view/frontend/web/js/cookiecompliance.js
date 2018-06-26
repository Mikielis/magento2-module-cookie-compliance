
define([
    "jquery",
    "jquery/jquery.cookie"
], function($) {
    "use strict";

    $.widget('mikielis.cookieCompliance', {
        _create: function() {
            var params = this.options;

            /**
             * Approve button, click event
             */
            $(this.options.approveButton).click(function() {
                var now = new Date().getTime(),
                    expiryDate = now + (params.cookieLifetime * 1000);

                $.cookie(params.cookieName, 1, {path: '/', expires: expiryDate});
                $(params.container).hide('slow');
            });

            /**
             * Read more button, click event
             */
            $(this.options.readMoreButton).click(function() {
                window.document.location.href = params.readMoreUrl;
            });

            /**
             * Close button, click event
             */
            $(this.options.closeButton).click(function() {
               /** Allow cookie and close information - an equals functionality to allow button */
               if (params.closeButtonBehaviour == 'allowAndClose') {
                   $(params.approveButton).trigger('click');
                   
               /** Only hide div with cookie compliance content */
               } else if (params.closeButtonBehaviour == 'close') {
                   $(params.container).hide('slow');
               }
            });

            /**
             * Approve button, hover event
             */
            $(this.options.approveButton).hover(function() {
                $(this).css({'color': '#' + params.approveButtonHoverColor, 'background': '#' + params.approveButtonHoverBackground});
            }, function() {
                $(this).css({'color': '#' + params.approveButtonColor, 'background': '#' + params.approveButtonBackground});
            });

            /**
             * Read more button, hover event
             */
            $(this.options.readMoreButton).hover(function() {
                $(this).css({'color': '#' + params.readMoreButtonHoverColor, 'background': '#' + params.readMoreButtonHoverBackground});
            }, function() {
                $(this).css({'color': '#' + params.readMoreButtonColor, 'background': '#' + params.readMoreButtonBackground});
            });

            /**
             * Show container when cookie doesn't exist
             */
            if ($.cookie(this.options.cookieName) != 1) {
                $(this.options.container).show('slow');
            }
        },
    });

    return $.mikielis.cookieCompliance;
});
