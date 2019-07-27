@extends('layouts.app', ['page' => __('Agent Management'), 'pageSlug' => 'agents'])

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ _('Edit Agent') }}</h5>
            </div>
            {{--  <form method="post" ,'action'=>['AgentsController@update',$agent->id] ,autocomplete="off">  --}}
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
<<<<<<< HEAD

                        <div class="form-group{{ $errors->has('gender') ? ' has-danger' : '' }}">
                            <label>{{ _('Gender') }}</label>
                            <input type="text" name="gender" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" placeholder="{{ _('Gender') }}">
                            @include('alerts.feedback', ['field' => 'gender'])
                        </div>


=======
                
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Gender') }}</label>
                                <select class="form-control" name="gender" required="required" id="input-gender" >
                                   <option value="M">Male</option>
                                   <option value="F">Female</option>
                               </select>
                               @include('alerts.feedback', ['field' => 'gender'])
                           </div>
                        
                       
>>>>>>> 8dcc7381ee94e949b5cab0421ba37c1083536ae6
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
