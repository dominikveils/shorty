'use strict';

define(['jquery'], function ($) {

  return {
    clearErrors: function ($form) {
      if ($form !== undefined) {
        $form.find('span.alert').remove();
      }
      else {
        $('body').find('span.alert').remove();
      }
    },
    showErrors: function (errors, $form) {
      var self = this;
      $.each(errors, function (key, value) {
        var $span = self.getContainer(value);

        if ($form !== undefined) {
          $('#' + key, $form).after($span);
        }
        else {
          $('#' + key).after($span); 
        }
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