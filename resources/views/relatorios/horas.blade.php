@extends('layouts.master')

@section('title') Funcionario: {{ $funcionario->nome }} @endsection
@section('sidebar') @endsection
@section('content')
    @foreach($grupos as $grupo)
        <h2>{{ ucfirst($grupo['data']->format('F')) }}/{{ $grupo['data']->year }}</h2>
        <table width="100%" class="short-table">
            <thead>
                <tr>
                    <th>O.S.</th>
                    <th>Peças</th>
                    <th>Horas</th>
                    <th>Peça/h</th>
                </tr>
            </thead>
            <tbody>
                @foreach($horas as $hora)
                    @if($hora->data->month == $grupo['data']->month && $hora->data->year == $grupo['data']->year)
                        <tr>
                            <th class="features">{{ $hora->cliente }} (dia {{ $hora->data->format('j') }})</th>
                            <td>{{ number_format($hora->quantidade, 2, ',', '') }}</td>
                            <td>{{ number_format($hora->horas, 2, ',', '') }}</td>
                            <td>{{ number_format(($hora->quantidade / $hora->horas), 2, ',', '') }}</td>
                        </tr>
                    @endif
                @endforeach

                <tr>
                    <th class="features">Total</th>
                    <td><b>{{ number_format($grupo['quantidade'], 2, ',', '') }}</b></td>
                    <td><b>{{ number_format($grupo['horas'], 2, ',', '') }}</b></td>
                    <td><b>{{ number_format($grupo['media'], 2, ',', '') }}</b></td>
                </tr>
            </tbody>
        </table>
    @endforeach
@endsection