@props([
    'title' => 'Booking confirmed',
    'body' => 'Priya Raghavan booked a 30-minute intro call for Thursday at 9:30 am.',
    'timeLabel' => 'just now',
    'followTitle' => 'Reminder scheduled',
    'followBody' => 'A text goes out one hour before, and a follow-up the morning after.',
])
<!--
    What arrives after a booking: the confirmation, and the reminder that
    schedules itself. Two stacked cards, the second slightly recessed so the
    first reads as the one that just landed.
-->
<div class="flex flex-col gap-2">
    <div class="flex items-start gap-3 rounded-xl bg-surface p-4 shadow-card">
        <span class="flex size-8 shrink-0 items-center justify-center rounded-full bg-carbon text-carbon-ink">
            <svg viewBox="0 0 24 24" class="size-4 stroke-current" fill="none" stroke-width="3" stroke-linecap="round" aria-hidden="true">
                <path d="M5 5h14"/>
                <path d="M8 9v3"/>
                <path d="M12 9v10"/>
                <path d="M16 9v6.5"/>
            </svg>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-baseline justify-between gap-3">
                <span class="text-[0.8125rem] font-medium text-ink">{{ $title }}</span>
                <span class="shrink-0 text-xs text-muted">{{ $timeLabel }}</span>
            </span>
            <span class="mt-1 block text-[0.8125rem]/6 text-pretty text-muted">{{ $body }}</span>
        </span>
    </div>

    <div class="mx-3 flex items-start gap-3 rounded-xl bg-canvas p-4">
        <span class="flex size-8 shrink-0 items-center justify-center rounded-full bg-surface">
            <svg viewBox="0 0 16 16" class="size-4 fill-faint" aria-hidden="true">
                <path fill-rule="evenodd" d="M8 1.5a4.5 4.5 0 0 0-4.5 4.5v2.19l-.97 1.94A.75.75 0 0 0 3.2 11.25h9.6a.75.75 0 0 0 .67-1.12l-.97-1.94V6A4.5 4.5 0 0 0 8 1.5ZM6.25 12.5a1.75 1.75 0 0 0 3.5 0h-3.5Z" clip-rule="evenodd"/>
            </svg>
        </span>
        <span class="min-w-0 flex-1">
            <span class="block text-[0.8125rem] font-medium text-ink">{{ $followTitle }}</span>
            <span class="mt-1 block text-[0.8125rem]/6 text-pretty text-muted">{{ $followBody }}</span>
        </span>
    </div>
</div>
