@props([
    'url' => 'tempo.co/iris',
    'copyLabel' => 'Copy',
    'eventTitle' => 'Intro call',
    'eventMeta' => '30 minutes · Video',
    'eventBody' => 'Fifteen minutes to work out whether we can help.',
    'footnote' => 'Change the handle whenever you like. Old links keep working.',
])
<!--
    The booking link, drawn: the address on its own chip above the card it
    opens. The copy button is a picture of a control, not a control — nothing
    here claims to do something it cannot.
-->
<div class="flex flex-col items-start gap-4">
    <div class="flex items-center gap-1 rounded-full bg-surface p-1 pl-4 shadow-card">
        <span class="font-display text-[0.9375rem] font-semibold text-ink">{{ $url }}</span>
        <span class="flex h-7 items-center gap-1 rounded-full bg-canvas px-2.5 text-xs font-medium text-muted">
            <svg viewBox="0 0 16 16" class="size-3.5 shrink-0 fill-current" aria-hidden="true">
                <path d="M5.5 3.5A1.5 1.5 0 0 1 7 2h4.5A2.5 2.5 0 0 1 14 4.5V10a1.5 1.5 0 0 1-1.5 1.5V4.5a1 1 0 0 0-1-1H5.5Z"/>
                <path d="M2 6.5A1.5 1.5 0 0 1 3.5 5h7A1.5 1.5 0 0 1 12 6.5v6A1.5 1.5 0 0 1 10.5 14h-7A1.5 1.5 0 0 1 2 12.5v-6Z"/>
            </svg>
            {{ $copyLabel }}
        </span>
    </div>

    <div class="w-full rounded-xl bg-surface p-4 shadow-card">
        <p class="title-card font-display font-semibold text-ink">{{ $eventTitle }}</p>
        <p class="mt-1 text-xs text-muted tabular-nums">{{ $eventMeta }}</p>
        <p class="mt-3 border-t border-line pt-3 text-[0.8125rem]/6 text-pretty text-muted">{{ $eventBody }}</p>
    </div>

    <p class="text-xs/5 text-pretty text-muted">{{ $footnote }}</p>
</div>
