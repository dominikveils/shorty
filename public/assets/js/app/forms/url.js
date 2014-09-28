'use strict';

define(['forms/default'], function (Form) {

  var Url = function ($form) {
    Form.apply(this, arguments);
  };

  Url.prototype = Form.prototype;

  Url.prototype.execute = function() {
      var formData = this.formData(this.$form);

      this.Network.fetch(formData, this.callback);
  };

  Url.prototype.callback = function(data) {
    if (data !== undefined) {
      $('#short_url').val(data.url);
    }
  };

  return {
    init: function ($form) {
      return new Url($form).execute();
    }
  };

});