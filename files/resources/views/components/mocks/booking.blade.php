@props([
    'host' => 'Iris Kovalenko',
    'hostAvatar' => 'https://assets.ui.sh/avatars/9.webp?size=96&grayscale',
    'eventTitle' => 'Intro call',
    'eventBody' => 'Fifteen minutes to work out whether we can help. No deck, nothing to prepare.',
    'activeDuration' => '30m',
    'locationLabel' => 'Tempo video room',
    'timezoneLabel' => 'Europe / Lisbon',
    'monthLabel' => 'June 2027',
    'openLabel' => '6 days open',
    'defaultDay' => '10',
    'defaultDayLabel' => 'Thu 10 June',
    'confirmTitle' => 'You are booked',
    'confirmBody' => 'It is in both calendars and the video link is in the invite. Reschedule from the same link any time.',
    'confirmAction' => 'Pick a different time',
    'durations',
    'weekdays',
    'days',
    'slots',
])
<!--
    Tempo's signature: a booking card that actually books.

    Two faces share one grid cell so the card never changes height — the form,
    and the confirmation it flips to when a slot is chosen. Every date with
    availability carries a pip and its own list of times; the lists all sit in
    one cell and the selected date's list is the visible one. main.js drives it
    through two data attributes, and the default day is already selected in the
    markup, so without JavaScript the card is still an honest, readable picture
    of the product.

    Content: the durations, weekdays, days and slots collections in
    resources/data/collections. A slot belongs to the day whose number matches
    its date, so adding a time is one row.
-->
<div class="stage grid rounded-3xl bg-surface p-5 shadow-raise sm:p-6" data-stage data-face="book">

    <!-- ── The booking face ──────────────────────────────────────────── -->
    <div class="stage-face stage-face-book grid gap-6 md:grid-cols-[11.5rem_1fr_8rem] md:gap-5">

        <!-- What is being booked -->
        <div class="flex flex-col gap-4 md:border-r md:border-line md:pr-5">
            <div class="flex items-center gap-2.5">
                <img src="{{ $hostAvatar }}" alt="" width="28" height="28" class="size-7 shrink-0 rounded-full object-cover">
                <p class="text-sm text-muted">{{ $host }}</p>
            </div>

            <div class="flex flex-col gap-2">
                <p class="title-card font-display font-semibold text-ink">{{ $eventTitle }}</p>
                <p class="text-sm/6 text-pretty text-muted">{{ $eventBody }}</p>
            </div>

            <ul role="list" class="flex flex-wrap gap-1.5">
                @foreach ($durations as $duration)
                <li>
                    @if ($duration->label == $activeDuration)
                    <span class="flex h-7 items-center rounded-lg bg-raised px-2.5 text-[0.8125rem] font-medium text-ink">{{ $duration->label }}</span>
                    @else
                    <span class="flex h-7 items-center rounded-lg px-2.5 text-[0.8125rem] text-faint">{{ $duration->label }}</span>
                    @endif
                </li>
                @endforeach
            </ul>

            <ul role="list" class="flex flex-col gap-2 text-[0.8125rem] text-muted">
                <li class="flex items-center gap-2">
                    <svg viewBox="0 0 16 16" class="size-4 shrink-0 fill-faint" aria-hidden="true">
                        <path fill-rule="evenodd" d="M2 4.25A1.75 1.75 0 0 1 3.75 2.5h6.5A1.75 1.75 0 0 1 12 4.25v.42l1.86-1.06a.75.75 0 0 1 1.12.65v7.48a.75.75 0 0 1-1.12.65L12 11.33v.42a1.75 1.75 0 0 1-1.75 1.75h-6.5A1.75 1.75 0 0 1 2 11.75v-7.5Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="sr-only">Where</span>
                    {{ $locationLabel }}
                </li>
                <li class="flex items-center gap-2">
                    <svg viewBox="0 0 16 16" class="size-4 shrink-0 fill-faint" aria-hidden="true">
                        <path fill-rule="evenodd" d="M8 1.5a6.5 6.5 0 1 0 0 13 6.5 6.5 0 0 0 0-13ZM8.75 4.5a.75.75 0 0 0-1.5 0V8c0 .28.156.537.404.665l2.25 1.166a.75.75 0 1 0 .69-1.332L8.75 7.545V4.5Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="sr-only">Time zone</span>
                    {{ $timezoneLabel }}
                </li>
            </ul>
        </div>

        <!-- The month -->
        <div class="flex flex-col gap-3">
            <div class="flex items-baseline justify-between gap-3">
                <p class="font-display text-[0.9375rem] font-semibold text-ink">{{ $monthLabel }}</p>
                <p class="flex items-center gap-1.5 text-[0.75rem] text-muted">
                    <span class="live-pip relative size-1.5 shrink-0 rounded-full bg-accent-bright text-accent-bright" aria-hidden="true"></span>
                    {{ $openLabel }}
                </p>
            </div>

            <ul role="list" class="grid grid-cols-7 text-center text-[0.6875rem] text-muted">
                @foreach ($weekdays as $weekday)
                <li>{{ $weekday->label }}</li>
                @endforeach
            </ul>

            <ul role="list" class="grid grid-cols-7 gap-y-1 text-center text-[0.8125rem] tabular-nums">
                @foreach ($days as $day)
                <li class="flex justify-center">
                    @if ($day->state == 'none')
                    <span class="flex size-8 items-center justify-center text-faint">{{ $day->day }}</span>
                    @endif
                    @if ($day->state == 'open')
                    @if ($day->day == $defaultDay)
                    <button type="button" data-stage-date="{{ $day->day }}" data-label="{{ $day->label }}" aria-pressed="true" class="stage-date relative flex size-8 flex-col items-center justify-center rounded-lg font-medium text-ink hover:bg-raised">
                        {{ $day->day }}
                        <span class="stage-pip mt-0.5 size-1 rounded-full bg-accent-bright" aria-hidden="true"></span>
                        <span class="sr-only">{{ $day->label }}, times available</span>
                    </button>
                    @else
                    <button type="button" data-stage-date="{{ $day->day }}" data-label="{{ $day->label }}" aria-pressed="false" class="stage-date relative flex size-8 flex-col items-center justify-center rounded-lg font-medium text-ink hover:bg-raised">
                        {{ $day->day }}
                        <span class="stage-pip mt-0.5 size-1 rounded-full bg-accent-bright" aria-hidden="true"></span>
                        <span class="sr-only">{{ $day->label }}, times available</span>
                    </button>
                    @endif
                    @endif
                </li>
                @endforeach
            </ul>
        </div>

        <!-- The times for whichever date is selected -->
        <div class="flex flex-col gap-3 md:border-l md:border-line md:pl-5">
            <p class="font-display text-[0.9375rem] font-semibold text-ink" data-stage-heading>{{ $defaultDayLabel }}</p>

            <div class="stage-slots grid max-h-64 overflow-y-auto">
                @foreach ($days as $day)
                @if ($day->state == 'open')
                @if ($day->day == $defaultDay)
                <ul role="list" class="stage-slot-list flex flex-col gap-1.5 pr-1" data-slots-for="{{ $day->day }}" data-current>
                    @foreach ($slots as $slot)
                    @if ($slot->date == $day->day)
                    <li>
                        <button type="button" data-stage-slot="{{ $slot->time }}" class="stage-slot flex h-9 w-full items-center justify-center rounded-lg text-[0.8125rem] font-medium text-ink tabular-nums">{{ $slot->time }}</button>
                    </li>
                    @endif
                    @endforeach
                </ul>
                @else
                <ul role="list" class="stage-slot-list flex flex-col gap-1.5 pr-1" data-slots-for="{{ $day->day }}">
                    @foreach ($slots as $slot)
                    @if ($slot->date == $day->day)
                    <li>
                        <button type="button" data-stage-slot="{{ $slot->time }}" class="stage-slot flex h-9 w-full items-center justify-center rounded-lg text-[0.8125rem] font-medium text-ink tabular-nums">{{ $slot->time }}</button>
                    </li>
                    @endif
                    @endforeach
                </ul>
                @endif
                @endif
                @endforeach
            </div>
        </div>

    </div>

    <!-- ── The confirmation face ─────────────────────────────────────── -->
    <div class="stage-face stage-face-done flex flex-col items-center justify-center gap-5 px-2 py-10 text-center">
        <span class="flex size-12 items-center justify-center rounded-full bg-accent-wash">
            <svg viewBox="0 0 24 24" class="size-6 stroke-accent" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path class="stage-tick" d="m5.5 12.5 4 4 9-9"/>
            </svg>
        </span>

        <div class="flex flex-col gap-2">
            <p class="title-card font-display font-semibold text-ink">{{ $confirmTitle }}</p>
            <p class="mx-auto max-w-[44ch] text-sm/6 text-pretty text-muted">{{ $confirmBody }}</p>
        </div>

        <ul role="list" class="flex flex-col gap-1 text-sm">
            <li class="font-medium text-ink">{{ $eventTitle }}</li>
            <li class="text-muted tabular-nums" data-stage-summary>{{ $defaultDayLabel }}</li>
        </ul>

        <button type="button" data-stage-reset class="btn-ghost btn-sm">{{ $confirmAction }}</button>
    </div>

</div>
