@props([
    'heading' => 'Notice and buffers',
    'noticeLabel' => 'Minimum notice',
    'noticeValue' => '4 hours',
    'beforeLabel' => 'Buffer before',
    'beforeValue' => '10 mins',
    'afterLabel' => 'Buffer after',
    'afterValue' => '10 mins',
    'capLabel' => 'Most bookings in a day',
    'capValue' => '4',
])
<!--
    The rules that stop a calendar filling up, drawn as the form that sets
    them. Every value is a field, so a site owner can show their own numbers.
-->
<div class="flex flex-col gap-4 rounded-xl bg-surface p-4 shadow-card">
    <p class="text-[0.8125rem] font-medium text-ink">{{ $heading }}</p>

    <div class="flex flex-col gap-1.5">
        <p class="text-xs font-medium text-muted">{{ $noticeLabel }}</p>
        <p class="flex h-9 items-center justify-between rounded-lg bg-canvas px-3 text-[0.8125rem] text-ink">
            {{ $noticeValue }}
            <svg viewBox="0 0 16 16" class="size-4 shrink-0 fill-faint" aria-hidden="true">
                <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
            </svg>
        </p>
    </div>

    <div class="grid grid-cols-2 gap-3">
        <div class="flex flex-col gap-1.5">
            <p class="text-xs font-medium text-muted">{{ $beforeLabel }}</p>
            <p class="flex h-9 items-center rounded-lg bg-canvas px-3 text-[0.8125rem] text-ink tabular-nums">{{ $beforeValue }}</p>
        </div>
        <div class="flex flex-col gap-1.5">
            <p class="text-xs font-medium text-muted">{{ $afterLabel }}</p>
            <p class="flex h-9 items-center rounded-lg bg-canvas px-3 text-[0.8125rem] text-ink tabular-nums">{{ $afterValue }}</p>
        </div>
    </div>

    <div class="flex items-center justify-between border-t border-line pt-3">
        <p class="text-xs font-medium text-muted">{{ $capLabel }}</p>
        <p class="flex size-8 items-center justify-center rounded-lg bg-canvas text-[0.8125rem] font-medium text-ink tabular-nums">{{ $capValue }}</p>
    </div>
</div>
