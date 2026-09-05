@props([
    'heading' => 'Overlay my calendar',
    'yoursLabel' => 'Yours',
    'theirsLabel' => 'Theirs',
    'freeLabel' => 'Free',
    'columns',
    'events',
])
<!--
    The booker's week laid over yours, drawn as five stacked columns. A block
    belongs to the column whose day matches, and its kind decides whether it
    reads as your meeting, theirs, or an hour that is open to both.
-->
<div class="flex flex-col gap-3 rounded-xl bg-surface p-4 shadow-card">
    <div class="flex items-center justify-between gap-3">
        <p class="text-[0.8125rem] font-medium text-ink">{{ $heading }}</p>
        <ul role="list" class="flex items-center gap-3 text-xs text-muted">
            <li class="flex items-center gap-1.5">
                <span class="size-2 shrink-0 rounded-sm bg-raised" aria-hidden="true"></span>
                {{ $yoursLabel }}
            </li>
            <li class="flex items-center gap-1.5">
                <span class="size-2 shrink-0 rounded-sm bg-accent-wash" aria-hidden="true"></span>
                {{ $theirsLabel }}
            </li>
        </ul>
    </div>

    <div class="grid grid-cols-5 gap-1.5">
        @foreach ($columns as $column)
        <div class="flex flex-col gap-1.5">
            <p class="text-center text-[0.6875rem] text-muted tabular-nums">{{ $column->day }} {{ $column->date }}</p>
            @foreach ($events as $event)
            @if ($event->column == $column->day)
            @if ($event->kind == 'free')
            <p class="flex items-center justify-center rounded-md border border-dashed border-line-strong px-1 text-center text-[0.6875rem] text-muted data-[size=sm]:h-6 data-[size=md]:h-9 data-[size=lg]:h-14" data-size="{{ $event->size }}">{{ $freeLabel }}</p>
            @endif
            @if ($event->kind == 'yours')
            <p class="flex items-center justify-center rounded-md bg-raised px-1 text-center text-[0.6875rem] text-ink data-[size=sm]:h-6 data-[size=md]:h-9 data-[size=lg]:h-14" data-size="{{ $event->size }}">{{ $event->label }}</p>
            @endif
            @if ($event->kind == 'theirs')
            <p class="flex items-center justify-center rounded-md bg-accent-wash px-1 text-center text-[0.6875rem] text-accent data-[size=sm]:h-6 data-[size=md]:h-9 data-[size=lg]:h-14" data-size="{{ $event->size }}">{{ $event->label }}</p>
            @endif
            @endif
            @endforeach
        </div>
        @endforeach
    </div>
</div>
