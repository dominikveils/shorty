'use strict';

requirejs.config({
    baseUrl: 'assets/js/app',
    paths: {
        jquery: '../vendor/jquery',
        bootstrap: '../vendor/bootstrap'
    },
    shim: {
      'bootstrap': ['jquery']
    }
});

requirejs(['shorty', 'jquery', 'bootstrap'], function (Shorty, $, bootstrap) {
  $(function () {

    Shorty.init();
  });
});

