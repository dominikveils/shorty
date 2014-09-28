'use strict';

define(['jquery'], function ($) {
  return {
    bind: function (events) {

      $.each (events, function () {
        var $elem = $($(this)[0]);
        var event = $(this)[1];
        var callback = $(this)[2];
        var self = this;

        $elem.on(event, function (event) {
          event.preventDefault();
          callback($(this));
        });
      });
    }
  }
});