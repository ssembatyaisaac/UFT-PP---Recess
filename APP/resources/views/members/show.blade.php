@extends('layouts.app',['pageSlug' => 'districts'])

@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Members Enrolled') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('First Name') }}</th>
                                <th scope="col">{{ __('Last Name') }}</th>
                                <th scope="col">{{ __('AgentID') }}</th>
                                <th scope="col">{{ __('DistrictID') }}</th>
                            </thead>
                            @foreach ($donors as $row)
                            <tbody>

                                    <tr>
                                        <td>{{ $row->fName }}</td>
                                        <td>{{ $row->lName }}</td>
                                        <td>{{ $row->agentID }}</td>
                                        <td>{{ $row->districtID }}</td>
                                    </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    {{--  <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $agents->links() }}
                    </nav>  --}}
                </div>
            </div>
        </div>
    </div>


@endsection
