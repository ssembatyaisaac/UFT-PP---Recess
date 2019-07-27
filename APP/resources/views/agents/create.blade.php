@extends('layouts.app',['page' => __('Agent Management'),'pageSlug' => 'agents'])

@section('content')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Agent Management') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('agent.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('agent.store') }}" autocomplete="off">
                        @csrf

                        <h6 class="heading-small text-muted mb-4">{{ __('Agent information') }}</h6>
                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('First Name') }}</label>
                                <input type="text" name="fName" id="input-fName" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('First Name') }}" value="{{ old('fName') }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'fName'])
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Last Name') }}</label>
                                <input type="text" name="lName" id="input-lName" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Last Name') }}" value="{{ old('lName') }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'lName'])
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Gender') }}</label>
                                <input type="text" name="gender" id="input-gender" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Gender') }}" value="{{ old('gender') }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'gender'])
                            </div>
                           
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection