'use strict';

define(['jquery', 'utils/error'], function ($, Error) {

  return {
    fetch: function (options, callback) {
      $.ajax({
        url: options.url,
        method: options.method,
        data: options.data,
        dataType: "json",
        beforeSend: function () {
          Error.clearErrors();

          if (options.$button !== undefined) {
            options.$button.button('loading');
          }
        },
        success: function (response) {
          if (response.success) {
            callback(response.data);
          }
          else {
            if (response.messages !== undefined) {
              Error.showErrors(response.messages);
            }
            else if (response.message !== undefined) {
              // Show message
              alert(response.message);
            }
          }
        },
        statusCode: {
          404: function () {
            alert('Page not found');
          },
          400: function () {
            alert('Fatal system error. Please try later');
          }
        }
      })
      .complete(function () {
        if (options.$button !== undefined) {
          options.$button.button('reset');
        }
        
        if (options.recaptcha) {
          Recaptcha.reload();
        }
      });
    }
  };

});