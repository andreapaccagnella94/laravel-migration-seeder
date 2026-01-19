@extends('layout.master')

@section('title', "Laravel-Migration-Seeder") {{-- sintassa contratta, conviene per semplici frasi --}}

@section('content') 


    <div class="container py-5">
    <h1 class="mb-4 text-center">Elenco Treni (date > {{($today)->format('d-m-Y H:i')}})</h1>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-sm align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID Treno</th>
                    <th scope="col">Compagnia</th>
                    <th scope="col">Partenza</th>
                    <th scope="col">Arrivo</th>
                    <th scope="col">Stazione di Partenza</th>
                    <th scope="col">Stazione di Arrivo</th>
                    <th scope="col">Carrozze</th>
                    <th scope="col">In Orario</th>
                    <th scope="col">Cancellato</th>
                </tr>
            </thead>
            <tbody>
                @if($trains->isEmpty())
                    <tr>
                        <td colspan="9" class="text-center text-muted">
                            Nessun treno trovato.
                        </td>
                    </tr>
                @else
                    @foreach($trains as $train)
                        <tr>
                            <td>{{ $train->id_train }}</td>
                            <td>{{ $train->company }}</td>

                            {{-- Formattazione data con Carbon (già incluso in Laravel) trovato online non ho fatto ancora ricerca --}}
                            <td class="time-format">
                                {{ \Carbon\Carbon::parse($train->departure_time)->format('d-m-Y H:i') }}
                            </td>
                            <td class="time-format">
                                {{ \Carbon\Carbon::parse($train->arrival_time)->format('d-m-Y H:i') }}
                            </td>

                            <td>{{ $train->departure_station }}</td>
                            <td>{{ $train->arrival_station }}</td>
                            <td>{{ $train->carriages }}</td>

                            <td>
                                @if($train->on_time)
                                    <span class="badge bg-success">Sì</span>
                                @else
                                    <span class="badge bg-secondary">No</span>
                                @endif
                            </td>

                            <td>
                                @if($train->is_cancelled)
                                    <span class="badge bg-danger">Sì</span>
                                @else
                                    <span class="badge bg-light">No</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
    
@endsection