@extends('layouts.app', ['page' => __('Funds'), 'pageSlug' => 'Funds'])

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ _('Edit Fund') }}</h5>
            </div>

                @foreach($funds as $fund)
                    <form method="post" action="{{ route('pay.update',$fund->id) }}" autocomplete="off">
                <div class="card-body">
                        @csrf
                        @method('put')
                        @include('alerts.success')

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

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                </div>
            </form>
            @endforeach
        </div>


        </div>
    </div>
@endsection
