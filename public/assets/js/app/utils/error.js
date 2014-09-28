'use strict';

define(['jquery'], function ($) {

  return {
    clearErrors: function () {
      
      $('body').find('span.alert.alert-danger').remove();
    },
    showErrors: function (errors) {
      var self = this;
      $.each(errors, function (key, value) {
        var $span = self.getContainer(value);
        $('#' + key).closest('.form-group').append($span); 
      })
    },
    getContainer: function (message) {
      var $span = $('<span/>');
      $span.addClass('alert alert-danger');
      $span.html(message);

      return $span;
    }
  };

});