@extends('layouts.master')

@section('content')
<div class="row">

  <div class="col-md-6 col-md-offset-3">
    {{ Form::open(['route' => 'home.post', 'id' => 'url-form', 'class' => 'form', 'role' => 'form']) }}

    <div class="form-group">
      {{ Form::text('url', '', ['class' => 'form-control', 'placeholder' => 'http://www.google.com', 'id' => 'url']) }}
    </div> <!-- form-group -->
    <div class="form-group">
      {{ Form::submit('Make me shorty', ['class' => 'btn btn-primary btn-large btn-block', 'data-loading-text' => 'Processing...']) }}
    </div> <!-- form-group -->
    {{ Form::close() }}

    <hr>
    <div class="row">
      <div class="col-md-12">
        <form action="#" class="form">
            <div class="input-group">
              <span class="input-group-addon">Short URL:</span>
              <input type="text" class="form-control col-md-10" name="short_url" id="short_url" readonly>
            </div> <!-- input-group -->
        </form>
      </div> <!-- col-md-12 -->
    </div> <!-- row -->
  </div> <!-- col-md-6 col-md-offset-3 -->

</div> <!-- row -->

@stop