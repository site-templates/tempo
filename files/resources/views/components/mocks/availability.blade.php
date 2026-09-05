@props([
    'heading' => 'Working hours',
    'note' => 'Applies to every event type unless one overrides it.',
    'offLabel' => 'Unavailable',
    'hours',
])
<!--
    The availability editor, drawn. A row that is on shows its two times; a row
    that is off shows the unavailable label. Rows come from the hours collection
    and the switch is CSS — data-on slides the knob.
-->
<div class="flex flex-col gap-3 rounded-xl bg-surface p-4 shadow-card">
    <p class="text-[0.8125rem] font-medium text-ink">{{ $heading }}</p>

    <ul role="list" class="flex flex-col">
        @foreach ($hours as $row)
        @if ($row->on)
        <li class="flex items-center gap-3 border-t border-line py-2 first:border-t-0 first:pt-0" data-on>
            <span class="flex h-4 w-7 shrink-0 items-center rounded-full bg-accent p-0.5">
                <span class="switch-knob size-3 rounded-full bg-surface"></span>
            </span>
            <span class="w-8 shrink-0 text-[0.8125rem] font-medium text-ink">{{ $row->day }}</span>
            <span class="flex flex-1 items-center justify-end gap-1.5 text-[0.8125rem] text-ink tabular-nums">
                <span class="rounded-md bg-canvas px-2 py-1">{{ $row->from }}</span>
                <span class="text-faint">to</span>
                <span class="rounded-md bg-canvas px-2 py-1">{{ $row->to }}</span>
            </span>
        </li>
        @else
        <li class="flex items-center gap-3 border-t border-line py-2 first:border-t-0 first:pt-0">
            <span class="flex h-4 w-7 shrink-0 items-center rounded-full bg-well p-0.5">
                <span class="switch-knob size-3 rounded-full bg-surface"></span>
            </span>
            <span class="w-8 shrink-0 text-[0.8125rem] font-medium text-faint">{{ $row->day }}</span>
            <span class="flex-1 text-right text-[0.8125rem] text-faint">{{ $offLabel }}</span>
        </li>
        @endif
        @endforeach
    </ul>

    <p class="border-t border-line pt-3 text-xs/5 text-pretty text-muted">{{ $note }}</p>
</div>
