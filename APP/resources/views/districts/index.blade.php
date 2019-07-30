@extends('layouts.app',['pageSlug' => 'districts'])

@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('District') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('district.create') }}" class="btn btn-sm btn-primary">{{ __('Add District') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('District ID') }}</th>
                                <th scope="col">{{ __('District Name') }}</th>
                                <th scope='col>'>{{ __('Number Of Agents') }}</th>
                            </thead>
                            @foreach ($districts as $district)
                            <tbody>
                                
                                    <tr>
                                        <td>{{ $district->id }}</td>
                                        <td>{{ $district->districtName }}</td>
                                        <td>{{ $district->NumberOfAgents }}</td>
                                        <td class="text-right">
                                                  <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                        
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        {{--  @if (auth()->agent()->id != $agent->id)--}}
                                                            <form action="{{ route('district.destroy', $district->id) }}" method="post">
                                                                @csrf
                                                                @method('delete')

                                                                <a class="dropdown-item" href="{{ route('district.edit', $district->id) }}">{{ __('Edit') }}</a>
                                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this district?") }}') ? this.parentElement.submit() : ''">
                                                                            {{ __('Delete') }}
                                                                </button>
                                                            </form>  
                                                        {{--  @else  --}}
                                                            <a class="dropdown-item" href="/district/{{$district->id}}/edit">{{ __('Edit') }}</a>
                                                            <a class="dropdown-item" href="/Hierachy/{{$district->id}}show">{{ __('View Hierachy') }}</a>
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