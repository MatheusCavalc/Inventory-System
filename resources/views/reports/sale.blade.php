@extends('layouts.main')

@section('title', 'Sale Report')

@section('content')

<div class="row">
    <div class="col-6">
        <div class="panel-body">
            <form action="/report" method="POST" class="clearfix">
                @csrf
              <div class="form-group">
                <label class="form-label">Date Range</label>
                  <div class="input-group">
                    <input required type="date" class="datepicker form-control" name="start_date" placeholder="From">
                    <input required type="date" class="datepicker form-control" name="end_date" placeholder="To">
                  </div>
              </div>
              <div class="form-group">
                   <button type="submit" name="submit" class="btn btn-primary">Generate Report</button>
              </div>
            </form>
        </div>
    </div>
</div>

@endsection
