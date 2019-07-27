@extends('layouts.app',['pageSlug' => 'agents'])

@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Agents') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('agent.create') }}" class="btn btn-sm btn-primary">{{ __('Add agent') }}</a>
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
                                <th scope="col">{{ __('Gender') }}</th>
                                <th scope="col">{{ __('district ID') }}</th>
                                <th scope="col">{{ __('Agent Head ID') }}</th>
                            
                            </thead>
                            @foreach ($agents as $agent)
                            <tbody>
                                    <tr>
                                        <td>{{ $agent->fName }}</td>
                                        <td>{{ $agent->lName }}</td>
                                        <td>{{ $agent->gender }}</td>
                                        <td>{{ $agent->districtID}}</td>
                                        <td>{{ $agent->agentHeadID}}</td>
                                        <td class="text-right">
                                                  <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        {{--  @if (auth()->agent()->id != $agent->id)
                                                            <form action="{{ route('agent.destroy', $agent) }}" method="post">
                                                                @csrf
                                                                @method('delete')

                                                                <a class="dropdown-item" href="{{ route('agent.edit', $agent) }}">{{ __('Edit') }}</a>
                                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this agent?") }}') ? this.parentElement.submit() : ''">
                                                                            {{ __('Delete') }}
                                                                </button>
                                                            </form>
                                                        @else--}}
                                                            <a class="dropdown-item" href="/agent/{{$agent->id}}/edit">{{ __('Edit') }}</a>
                                                       {{--  @endif  --}}
                                                    </div>
                                                </div>
                                        </td>
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
