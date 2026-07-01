@if ($__is_essentials_enabled && $is_employee_allowed)


    <button type="button" data-type="clock_in" data-toggle="tooltip" data-placement="bottom" title="@lang('essentials::lang.clock_in')"
        class="premium-btn @if (!empty($clock_in)) hide @endif clock_in_btn">
        <span class="tw-sr-only">
            Clock In
        </span>
        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
            <path d="M7 11l5 5l5 -5" />
            <path d="M12 4l0 12" />
        </svg>
    </button>


    <button type="button"
        class="premium-btn @if (empty($clock_in)) hide @endif clock_out_btn"
        data-type="clock_out" data-toggle="popover" data-placement="bottom" data-html="true"
        title="@lang('essentials::lang.clock_out') @if (!empty($clock_in)) <br>
				<small>
					<b>@lang('essentials::lang.clocked_in_at'):</b> {{ @format_datetime($clock_in->clock_in_time) }}
				</small>
				<br>
				<small><b>@lang('essentials::lang.shift'):</b> {{ ucfirst($clock_in->shift_name) }}</small>
				@if (!empty($clock_in->start_time) && !empty($clock_in->end_time))
					<br>
					<small>
						<b>@lang('restaurant.start_time'):</b> {{ @format_time($clock_in->start_time) }}<br>
						<b>@lang('restaurant.end_time'):</b> {{ @format_time($clock_in->end_time) }}
					</small> @endif
			@endif">
        <span class="tw-sr-only">
            Clock In
        </span>
        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
            <path d="M7 11l5 5l5 -5" />
            <path d="M12 4l0 12" />
        </svg>
    </button>
@endif
