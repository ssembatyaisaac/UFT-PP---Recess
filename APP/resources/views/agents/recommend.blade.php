


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

                            <h6 class="heading-small text-muted mb-4">{{ __('Members Recommended') }}</h6>
                            <div class="pl-lg-4">
                                <table class="table tablesorter " id="">
                                    <thead class=" text-primary">
                                        <th scope="col">{{ __('First Name') }}</th>
                                        <th scope="col">{{ __('Last Name') }}</th>
                                        <th scope="col">{{ __('Members Introduced') }}</th>
                                        <th scope="col"></th>
                                    </thead>
                                    @foreach ($recommend as $agent)
                                    <tbody>

                                            <tr>
                                                <td><input type='checkbox' name='recommended' value={{$row->memberID}}></td>
                                                <td>{{$row->fName}}</td>
                                                <td>{{$row->lName}}</td>
                                                <td>{{$row->total}}</td>
                                                <td class="text-right">
                                                          <div class="dropdown">
                                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                  {{--@if (auth()->agent()->id != $agent->id)
                                                                    <form action="{{ route('agent.destroy', $agent) }}" method="post">
                                                                        @csrf
                                                                        @method('delete')

                                                                        <a class="dropdown-item" href="{{ route('agent.edit', $agent) }}">{{ __('Edit') }}</a>
                                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this agent?") }}') ? this.parentElement.submit() : ''">
                                                                                    {{ __('Delete') }}
                                                                        </button>
                                                                    </form>
                                                                @else
                                                                    <a class="dropdown-item" href="/agent/{{$agent->id}}/edit">{{ __('Edit') }}</a>
                                                                @endif--}}
                                                            </div>
                                                        </div>
                                                </td>
                                            </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Make Agent') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
