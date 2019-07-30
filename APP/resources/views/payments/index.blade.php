@extends('layouts.app',['pageSlug' => 'members'])

@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Donors') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('Donor First Name') }}</th>
                                <th scope="col">{{ __('Donor Last Name') }}</th>
                                <th scope="col">{{ __('Amount Paid') }}</th>
                                <th scope="col">{{ __('Date Of Payment') }}</th>
                            </thead>
                            @foreach ($funds as $row)
                            <tbody>

                                    <tr>
                                        <td>{{ $row->fName }}</td>
                                        <td>{{ $row->lName }}</td>
                                        <td>{{ $row->amountPaid }}</td>
                                        <td>{{ $row->dateOfPayment }}</td>
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
                                                            <a class="dropdown-item" href="/pay/{{$row->id}}/edit">{{ __('Edit') }}</a>
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
