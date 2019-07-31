@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category">Wellwishers Per Month</h5>
                            <h2 class="card-title">Line Graph</h2>
                        </div>

                    </div>
                </div>
            <form method="POST" action="{{route('members.store')}}">
                @csrf
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-name">{{ __('Month Of Enrollment') }}</label>
                    <input type="text" name="month" id="input-month" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('XX') }}" value="{{ old('Month') }}" required autofocus>
                    @include('alerts.feedback', ['field' => 'month'])
                </div>
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-name">{{ __('Year Of Enrollment') }}</label>
                    <input type="text" name="year" id="input-year" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('XXXX') }}" value="{{ old('Year') }}" required autofocus>
                    @include('alerts.feedback', ['field' => 'year'])
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ _('Submit') }}</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection

