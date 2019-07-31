@extends('layouts.app ')


@section('content')

<h1>Agent Hierachy</h1>  
<div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                            @foreach($aghead as $head)
                                <th scope="col">{{ __('Agent Head') }}</th>
                                <tr><td>{{ $head->fName ."   ".$head->lName  }}</td></tr>
                                @endforeach
                            </thead>
                         
                            <thead class=" text-primary">
                                <th scope="col">{{ __('Agents') }}</th>
                                @foreach($agents as $agents)
                                <tr>
                                <td>{{ $agents->fName . "  ".$agents->lName  }}</td></tr>
                                
                            @endforeach
                            </thead>
                            <tbody>
                                
                                   
                              
                            </tbody>
                        </table>
                    </div>
@endsection