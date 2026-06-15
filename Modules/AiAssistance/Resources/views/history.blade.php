@extends('layouts.app')

@section('title', __('aiassistance::lang.aiassistance'))

@section('content')

@include('aiassistance::layouts.nav')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black">@lang('aiassistance::lang.history')
        <small class="tw-text-sm md:tw-text-base tw-text-gray-700 tw-font-semibold">@lang('aiassistance::lang.history_generation')</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">


    <div class="row">

        <div class="col-md-12">
            @component('components.filters', ['title' => __('report.filters')])
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('tool_type', __('aiassistance::lang.tool') . ':') !!}
                    {!! Form::select('tool_type', $tools, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('date_range', __('report.date_range') . ':') !!}
                    {!! Form::text('date_range', null, ['class' => 'form-control', 'readonly', 'id' => 'date_range', 'placeholder' => __('lang_v1.select_a_date_range')]) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('keyword', __('lang_v1.search') . ':') !!}
                    {!! Form::text('keyword', null, ['class' => 'form-control', 'id' => 'keyword', 'placeholder' => __('lang_v1.search')]) !!}
                </div>
            </div>
            @endcomponent
        </div>

        <div class="col-sm-12">
            @component('components.widget', ['class' => 'box-primary'])
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="ai_history">
                    <thead>
                        <tr>
                            <th class="col-md-3">@lang( 'aiassistance::lang.input' )</th>
                            <th class="col-md-5">@lang( 'aiassistance::lang.output' )</th>
                            <th class="col-md-2">@lang( 'aiassistance::lang.tool' )</th>
                            <th>@lang( 'lang_v1.added_by' )</th>
                            <th class="col-md-2">@lang('lang_v1.created_at')</th>
                        </tr>
                    </thead>
                </table>
            </div>
            @endcomponent
        </div>
    </div>
</section>
<!-- /.content -->

@endsection

@section('javascript')
<script>
    $(document).ready(function() {

        // Date range picker for filtering (single initialization, Sell module style)
        $('#date_range').daterangepicker(
            dateRangeSettings,
            function(start, end) {
                $('#date_range').val(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
                ai_history.ajax.reload();
            }
        );
        $('#date_range').on('cancel.daterangepicker', function(ev, picker) {
            $('#date_range').val('');
            ai_history.ajax.reload();
        });
        ai_history = $('#ai_history').DataTable({
            processing: true,
            serverSide: true,
            fixedHeader:false,

            ajax: {
                url: '/aiassistance/history',
                data: function(d) {
                    d.tool_type = $('#tool_type').val();
                    if ($('#date_range').val()) {
                        var start = $('#date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
                        var end = $('#date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');
                        d.start_date = start;
                        d.end_date = end;
                    }
                    d.keyword = $('#keyword').val();
                },
            },
            order: [[4, 'desc']],
            columns: [{
                    data: 'input_data',
                    name: 'input_data'
                },
                {
                    data: 'output_data',
                    name: 'output_data'
                },
                {
                    data: 'tool_type',
                    name: 'tool_type'
                },
                {
                    data: 'added_by',
                    name: 'u.first_name',
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                }
            ],

        });

        $(document).on('change', '#tool_type', function(e) {
            ai_history.ajax.reload();
        });
        $(document).on('change', '#date_range', function(e) {
            ai_history.ajax.reload();
        });
        $(document).on('keyup', '#keyword', function(e) {
            ai_history.ajax.reload();
        });

    });
</script>
@endsection