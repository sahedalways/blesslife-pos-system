@extends('layouts.app')

@section('title', __('aiassistance::lang.aiassistance'))

@section('content')

    @include('aiassistance::layouts.nav')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black">@lang('aiassistance::lang.aiassistance')</h1>
        @if ($token_remaining_display)
            <p class="text-info">{{ $token_remaining_display }}</p>
        @endif
    </section>

    <section class="content no-print">
        <div class="row">

            @foreach ($tools as $k => $tool)
                <div class="col-12 col-sm-6 col-md-4 tw-mb-5">
                    <div class="tw-dw-card tw-w-100 tw-bg-base-100 tw-shadow-xl hover:tw-shadow-2xl hover:tw-scale-105 tw-transition-all tw-duration-300">
                        <figure class="tw-px-10 tw-pt-10">
                            <i class="{{ $tool['icon'] }} font-30"></i>
                        </figure>
                        <div class="tw-dw-card-body tw-items-center tw-text-center">
                            <h2 class="tw-dw-card-title" style="margin-top: 0px">{{ $tool['label'] }}</h2>
                            <p>{{ $tool['description'] }}</p>
                            <div class="tw-dw-card-actions">
                                <a href="{{ action([\Modules\AiAssistance\Http\Controllers\AiAssistanceController::class, 'create'], ['tool' => $k]) }}"
                                    class="tw-dw-btn tw-dw-btn-primary">@lang('aiassistance::lang.create')</a>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach


        </div>
    </section>

@stop

@section('javascript')

@endsection
