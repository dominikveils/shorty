@extends('layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-2 col-md-offset-5">
      <h1>Statistic <span class="asterix">*</span></h1>
    </div> <!-- col-md-2 col-md-offset-5 -->
  </div> <!-- row -->
  <hr>
  <div class="row">
    <div class="col-md-4">
      <label for="">Short URL:</label>
      <span>{{{ route('home.hash', ['hash' => $url->short]) }}}</span>
    </div> <!-- col-md-4 -->
    <div class="col-md-4">
      <label for="">Original URL:</label>
      <span>{{{ $url->url }}}</span>
    </div> <!-- col-md-4 -->
    <div class="col-md-4">
      <label for="">Created:</label>
      <span>{{{ $url->created_at->format('Y-m-d') }}}</span>
    </div> <!-- col-md-4 -->
  </div><!-- row -->
  <hr>
  <div class="row">
    
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th><i class="fa fa-calendar"></i> Date</th>
          <th><i class="fa fa-users"></i> Visitors</th>
          <th><i class="fa fa-user"></i> Uniqs</th>
        </tr>
      </thead>
      <tbody>
        @forelse($url->getFullStatistic() as $date => $row)
          <tr>
            <td>{{{ $date }}}</td>
            <td>{{{ $row['visitors'] }}}</td>
            <td>{{{ $row['uniq'] }}}</td>
          </tr>
        @empty
        <tr>
          <td colspan=3>No information available</td>
        </tr>
        @endforelse
      </tbody>
      <tfoot>
        <tr>
          <td colspan="3"><span class="notice"><span class="asterix">*</span>Statistic is only shown for last month</span></td>
        </tr>
      </tfoot>
    </table>

  </div> <!-- row -->
@stop

@section('css')
@parent
<link rel="stylesheet" href="/assets/css/statistic/statistic.css">
@stop