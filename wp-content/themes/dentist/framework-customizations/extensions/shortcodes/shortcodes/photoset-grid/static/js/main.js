/*! ===================================
 *  Author: BBDesign & WPHunters
 *  -----------------------------------
 *  Email(support):
 * 	bbdesign_sp@yahoo.com
 *  ===================================
 */

jQuery(document).ready(function () {

    var $ = jQuery;
    $('.photoset-grid').each(function () {

        var $this = $(this),
            layout = $this.attr('data-layout'),
            magnificEnabled = $this.hasClass('with-lightbox') && typeof $.fn.magnificPopup != 'undefined';

        // start building the grid
        $this.photosetGrid({
            gutter      : '5px',
            layout      : layout,
            highresLinks: true,
            rel         : 'nofade',

            onComplete: function () {
                if (!magnificEnabled) return;

                // init lightbox
                $this.magnificPopup({
                    delegate: 'a',
                    type    : 'image',
                    gallery : {
                        enabled: true
                    }
                });
            }
        });

    });

});