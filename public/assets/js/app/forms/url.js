'use strict';

define(['forms/default'], function (Form) {

  var Url = function ($form) {
    Form.apply(this, arguments);
  };

  Url.prototype = Form.prototype;

  Url.prototype.execute = function() {
      var formData = this.formData(this.$form);

      formData.recaptcha = true;

      this.Network.fetch(formData, this.callback);
  };

  Url.prototype.callback = function(data) {
    if (data !== undefined) {
      $('#short_url').val(data.url);
      $('#statistic_url').val(data.statistic);
      $('#short-url-created').fadeIn('slow').animate({opacity:1.0},3000).fadeOut('slow', function () {
        $(this).css({'display': 'none'})
      }).css({'display': 'inline-block'});
    }
  };

  return {
    init: function ($form) {
      return new Url($form).execute();
    }
  };

});