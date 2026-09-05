@props([
    'heading' => 'Connected calendars',
    'note' => 'Bookings are written to Studio. All three are checked for conflicts.',
    'readsLabel' => 'Checked',
    'writesLabel' => 'Receives bookings',
    'calendars',
])
<!--
    Drawn, not screenshotted: the calendar list a new account sees after
    connecting. Rows come from the calendars collection; the state key decides
    which label a row carries.
-->
<div class="flex flex-col gap-3 rounded-xl bg-surface p-4 shadow-card">
    <p class="text-[0.8125rem] font-medium text-ink">{{ $heading }}</p>

    <ul role="list" class="flex flex-col">
        @foreach ($calendars as $calendar)
        <li class="flex items-center gap-3 border-t border-line py-2.5 first:border-t-0 first:pt-0">
            <span class="flex size-7 shrink-0 items-center justify-center rounded-lg bg-canvas">
                <svg viewBox="0 0 16 16" class="size-4 fill-faint" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.25 1.5a.75.75 0 0 1 .75.75V3h4v-.75a.75.75 0 0 1 1.5 0V3h.25A1.75 1.75 0 0 1 13.5 4.75v7A1.75 1.75 0 0 1 11.75 13.5h-7.5A1.75 1.75 0 0 1 2.5 11.75v-7A1.75 1.75 0 0 1 4.25 3h.25v-.75a.75.75 0 0 1 .75-.75ZM4 6.5v5.25c0 .138.112.25.25.25h7.5a.25.25 0 0 0 .25-.25V6.5H4Z" clip-rule="evenodd"/>
                </svg>
            </span>
            <span class="min-w-0 flex-1">
                <span class="block truncate text-[0.8125rem] font-medium text-ink">{{ $calendar->name }}</span>
                <span class="block truncate text-xs text-muted">{{ $calendar->detail }}</span>
            </span>
            @if ($calendar->state == 'writes')
            <span class="shrink-0 rounded-full bg-accent-wash px-2 py-0.5 text-xs font-medium text-accent">{{ $writesLabel }}</span>
            @else
            <span class="shrink-0 text-xs text-muted">{{ $readsLabel }}</span>
            @endif
        </li>
        @endforeach
    </ul>

    <p class="border-t border-line pt-3 text-xs/5 text-pretty text-muted">{{ $note }}</p>
</div>
