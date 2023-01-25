@extends('layouts.site')

@section('title')
    reserva: {{ $reserva->data_saida }} -
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>reserva para o dia: {{ $reserva->data_saida }}</h2>
            <p>
                o destino desta viagem será: {{ $reserva->cidade_destino }}
            </p>
            <p>
                responsavel pela reserva: {{ $reserva->owner_nome }}
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">


            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about-tab-pane"
                        type="button" role="tab" aria-controls="about-tab-pane" aria-selected="true">observações da
                        viagem</button>
                </li>


            </ul>
            <div class="tab-content pt-5" id="myTabContent">
                <div class="tab-pane fade show active" id="about-tab-pane" role="tabpanel" aria-labelledby="about-tab"
                    tabindex="0">{{ $reserva->observacoes }}</div>


            </div>
        </div>
    </div>
@endsection
