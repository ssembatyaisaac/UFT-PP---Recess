@extends('layouts.app', ['page' => __('Agent Management'), 'pageSlug' => 'agents'])

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ _('Edit Agent') }}</h5>
            </div>
            
                @foreach($agents as $agent)
                    <form method="post" action="{{ route('agent.update',$agent->id) }}" autocomplete="off">
                <div class="card-body">
                        @csrf
                        @method('put')
                        @include('alerts.success')
                        
                        <div class="form-group{{ $errors->has('fName') ? ' has-danger' : '' }}">
                                <label>{{ _('First Name') }}</label>
                                <input type="text" name="fName" class="form-control{{ $errors->has('fName') ? ' is-invalid' : '' }}" placeholder="{{ _('First Name') }}">
                                @include('alerts.feedback', ['field' => 'fName'])
                        </div>

                        <div class="form-group{{ $errors->has('lName') ? ' has-danger' : '' }}">
                                <label>{{ _('Last Name') }}</label>
                                <input type="text" name="lName" class="form-control{{ $errors->has('lName') ? ' is-invalid' : '' }}" placeholder="{{ _('Last Name') }}">
                                @include('alerts.feedback', ['field' => 'lName'])
                        </div>
                    
                        <div class="form-group{{ $errors->has('gender') ? ' has-danger' : '' }}">
                            <label>{{ _('Gender') }}</label>
                            <input type="text" name="gender" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" placeholder="{{ _('Gender') }}">
                            @include('alerts.feedback', ['field' => 'gender'])
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
