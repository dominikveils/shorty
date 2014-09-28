'use strict';

define(['utils/network'], function (Network) {
  var Form = function ($form) {
    this.Network = Network;
    this.$form = $form;
  }

  Form.prototype.formData = function() {
    var data = this.$form.serialize();
    var url = this.$form.attr('action');
    var method = this.$form.attr('method');
    var $button = this.$form.find(':submit');
    
    return {
      data: data,
      url: url,
      method: method,
      $button: $button
    };
  };

  return Form;
});