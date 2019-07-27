@extends('layouts.app', ['page' => __('District Management'), 'pageSlug' => 'districts'])

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ _('Edit District') }}</h5>
            </div>
            
                @foreach($districts as $district)
                    <form method="post" action="{{ route('district.update',$district->id) }}" autocomplete="off">
                <div class="card-body">
                        @csrf
                        @method('put')
                        @include('alerts.success')
                        
                        <div class="form-group{{ $errors->has('districtName') ? ' has-danger' : '' }}">
                                <label>{{ _('District Name') }}</label>
                                <input type="text" name="districtName" class="form-control{{ $errors->has('districtName') ? ' is-invalid' : '' }}" placeholder="{{ _('District Name') }}">
                                @include('alerts.feedback', ['field' => 'districtName'])
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
