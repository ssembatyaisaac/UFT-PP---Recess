@extends('layouts.app',['page' => __('Funds'),'pageSlug' => 'funds'])

@section('content')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Funds') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('pay.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('pay.store') }}" autocomplete="off">
                        @csrf

                        <h6 class="heading-small text-muted mb-4">{{ __('Donor information') }}</h6>
                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Donor Name') }}</label>
                                <input type="text" name="donorName" id="input-donorName" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Donor Name') }}" value="{{ old('donorName') }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'fName'])
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Gender') }}</label>
                                <select name="gender">
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                <select>
                                @include('alerts.feedback', ['field' => 'gender'])
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Amount Paid') }}</label>
                                <input type="number" name="amountPaid" id="input-amountPaid" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Amount Paid') }}" value="{{ old('amountPaid') }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'amountPaid'])
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Date Of Payment') }}</label>
                                <input type="date" name="dateOfPayment" id="input-dateOfPayment" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Date Of Payment') }}" value="{{ old('dateOfPayment') }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'dateOfPayment'])
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
