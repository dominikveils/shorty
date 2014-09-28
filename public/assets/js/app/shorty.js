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
      ['#short_url', 'click', function ($elem) {
        $elem.select();
      }],
      ['#url-form', 'submit', UrlForm.init ]
    ]
  }

});