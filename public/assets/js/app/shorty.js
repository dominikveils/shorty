'use strict';

define(['utils/events', 'forms/url', 'jquery'], function (Events, UrlForm, $) {

  return {
    init: function () {
      this.bindEvents();
    },
    bindEvents: function () {
      Events.bind(this.events);
    },
    events: [
      ['.click-me', 'click', function ($elem) {
        $elem.select();
      }],
      ['#url-form', 'submit', UrlForm.init ]
    ]
  }

});