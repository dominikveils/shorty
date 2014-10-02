@extends('layouts.master')

@section('content')
<div class="row">

  <div class="col-md-6 col-md-offset-3">
    {{ Form::open(['route' => 'home.post', 'id' => 'url-form', 'class' => 'form', 'role' => 'form']) }}

    <div class="form-group">
      {{ Form::text('url', '', ['class' => 'form-control input-lg', 'placeholder' => 'http://www.google.com', 'id' => 'url']) }}
    </div> <!-- form-group -->

    <div class="form-group">
      {{ Form::captcha() }}
    </div>

    <div class="form-group">
      {{ Form::submit('Make me shorty', ['class' => 'btn btn-primary btn-large btn-block', 'data-loading-text' => 'Processing...']) }}
    </div> <!-- form-group -->
    {{ Form::close() }}

    <hr>
    <div class="row">
      <div class="col-md-12" id="result-container">
        <div class="input-group">
          <span class="input-group-addon">Short URL:</span>
          <input type="text" class="form-control col-md-10 click-me" name="short_url" id="short_url" readonly>
        </div> <!-- input-group -->
        <div class="input-group">
          <span class="input-group-addon">Statistic URL:</span>
          <input type="text" class="form-control col-md-10 click-me" name="statistic_url" id="statistic_url" readonly>
        </div> <!-- input-group -->
        <div class="form-group">
          <span class="alert alert-success" id="short-url-created">
            Short url was successful created!
          </span>
        </div>
      </div> <!-- col-md-12 -->
    </div> <!-- row -->
  </div> <!-- col-md-6 col-md-offset-3 -->

</div> <!-- row -->

@stop

@section('css')
@parent
<link rel="stylesheet" href="/assets/css/home/home.css">
@stop