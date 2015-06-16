(function ($) {

  Drupal.behaviors.captcha = {
    attach: function (context) {

      // Turn off autocompletion for the CAPTCHA response field.
      // We do it here with Javascript (instead of directly in the markup)
      // because this autocomplete attribute is not standard and
      // it would break (X)HTML compliance.
      $("#edit-captcha-response").attr("autocomplete", "off");

    }
  };

  Drupal.behaviors.captchaAdmin = {
    attach: function (context) {
      // Add onclick handler to checkbox for adding a CAPTCHA description
      // so that the textfields for the CAPTCHA description are hidden
      // when no description should be added.
      // @todo: div.form-item-captcha-description depends on theming, maybe
      // it's better to add our own wrapper with id (instead of a class).
      $("#edit-captcha-add-captcha-description").click(function() {
        if ($("#edit-captcha-add-captcha-description").is(":checked")) {
          // Show the CAPTCHA description textfield(s).
          $("div.form-item-captcha-description").show('slow');
        }
        else {
          // Hide the CAPTCHA description textfield(s).
          $("div.form-item-captcha-description").hide('slow');
        }
      });
      // Hide the CAPTCHA description textfields if option is disabled on page load.
      if (!$("#edit-captcha-add-captcha-description").is(":checked")) {
        $("div.form-item-captcha-description").hide();
      }
    }

  };

})(jQuery);
;
(function($) {

  Drupal.behaviors.captchaAdmin = {
    attach : function(context) {

      // Helper function to show/hide noise level widget.
      var noise_level_shower = function(speed) {
        speed = (typeof speed == 'undefined') ? 'slow' : speed;
        if ($("#edit-image-captcha-dot-noise").is(":checked") || $("#edit-image-captcha-line-noise").is(":checked")) {
          $(".form-item-image-captcha-noise-level").show(speed);
        } else {
          $(".form-item-image-captcha-noise-level").hide(speed);
        }
      };
      // Add onclick handler to the dot and line noise check boxes.
      $("#edit-image-captcha-dot-noise").click(noise_level_shower);
      $("#edit-image-captcha-line-noise").click(noise_level_shower);
      // Show or hide appropriately on page load.
      noise_level_shower(0);

      // Helper function to show/hide smooth distortion widget.
      var smooth_distortion_shower = function(speed) {
        speed = (typeof speed == 'undefined') ? 'slow' : speed;
        if ($("#edit-image-captcha-distortion-amplitude").val() > 0) {
          $(".form-item-image-captcha-bilinear-interpolation").show(speed);
        } else {
          $(".form-item-image-captcha-bilinear-interpolation").hide(speed);
        }
      };
      // Add onchange handler to the distortion level select widget.
      $("#edit-image-captcha-distortion-amplitude").change(
          smooth_distortion_shower);
      // Show or hide appropriately on page load.
      smooth_distortion_shower(0);

    }
  };

})(jQuery);
;
