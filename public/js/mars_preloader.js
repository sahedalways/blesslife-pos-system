/**
 * Mars Station Global Pre-loader Handler
 * Show/Hide pre-loader on AJAX requests and page load
 */

(function() {
    'use strict';

    // Pre-loader element
    const preloader = document.getElementById('mars_station_preloader');

    // Show pre-loader
    window.showMarsPreloader = function() {
        if (preloader) {
            preloader.style.display = 'flex';
        }
    };

    // Hide pre-loader
    window.hideMarsPreloader = function() {
        if (preloader) {
            setTimeout(() => {
                preloader.style.display = 'none';
            }, 300); // Small delay for smooth transition
        }
    };

    // Hide pre-loader on page load
    window.addEventListener('load', function() {
        hideMarsPreloader();
    });

    // Show pre-loader on unload (page transition)
    window.addEventListener('beforeunload', function() {
        showMarsPreloader();
    });

    // Handle AJAX requests (for jQuery)
    if (typeof jQuery !== 'undefined') {
        jQuery(document).on('ajaxStart', function() {
            showMarsPreloader();
        }).on('ajaxStop', function() {
            hideMarsPreloader();
        });

        // For DataTables
        jQuery(document).on('processing.dt', function(e, settings, processing) {
            if (processing) {
                showMarsPreloader();
            } else {
                hideMarsPreloader();
            }
        });
    }

    // Handle fetch API requests
    const originalFetch = window.fetch;
    window.fetch = function(...args) {
        showMarsPreloader();
        return originalFetch.apply(this, args)
            .then(response => {
                hideMarsPreloader();
                return response;
            })
            .catch(error => {
                hideMarsPreloader();
                throw error;
            });
    };

    // Expose functions globally for manual control
    window.MarsStation = {
        show: showMarsPreloader,
        hide: hideMarsPreloader,
        toggle: function() {
            if (preloader && preloader.style.display === 'none') {
                showMarsPreloader();
            } else {
                hideMarsPreloader();
            }
        }
    };

})();
