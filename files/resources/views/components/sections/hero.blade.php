@props([
    'showChip' => '1',
    'chipTag' => 'New',
    'chipText' => 'Routing forms are out of beta',
    'chipLink' => '/changelog',
    'heading' => 'The unhurried way to agree on a time',
    'body' => 'Tempo holds your real availability behind one link. People pick a time that already works, and it lands in both calendars.',
    'ctaText' => 'Start for free',
    'ctaLink' => '#',
    'showSecondary' => '1',
    'secondaryText' => 'Book a demo',
    'secondaryLink' => '#',
    'note' => 'No credit card. Free forever for one person.',
    'showRating' => '1',
    'ratingScore' => '4.9',
    'ratingLabel' => 'from 1,240 reviews across three review sites',
    'durations',
    'weekdays',
    'days',
    'slots',
])
<!--
    The opening statement. A white panel laid on the paper canvas — a ground,
    not a card, which is why it carries no shadow and no ring: the only object
    that floats here is the booking stage on the right.

    Copy left, the working booking card right. Below lg the two stack and the
    card keeps its full width.
-->
<section class="px-4 pt-28 sm:pt-32">
    <div class="mx-auto max-w-page">
        <div class="rounded-3xl bg-surface px-6 py-14 sm:px-10 sm:py-16 lg:px-10 lg:py-16">
            <div class="grid items-center gap-12 lg:grid-cols-[minmax(0,25rem)_1fr] lg:gap-12">

                <div class="flex flex-col items-start gap-6" data-reveal>
                    @if ($showChip)
                    <a href="{{ $chipLink }}" class="text-link flex items-center gap-2 rounded-full bg-accent-wash py-1 pr-2.5 pl-1 text-sm font-medium text-accent hover:bg-accent-wash/60">
                        <span class="rounded-full bg-accent px-2 py-0.5 text-xs text-accent-ink">{{ $chipTag }}</span>
                        {{ $chipText }}
                        <svg viewBox="0 0 16 16" class="arrow size-4 shrink-0 fill-current" aria-hidden="true">
                            <path fill-rule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                    @endif

                    <h1 class="display-hero max-w-[15ch] font-display font-semibold text-balance text-ink">{{ $heading }}</h1>

                    <p class="lede max-w-[44ch] text-pretty text-muted">{{ $body }}</p>

                    <div class="flex flex-wrap items-center gap-3">
                        <a href="{{ $ctaLink }}" class="btn-solid btn-lg">
                            {{ $ctaText }}
                            <svg viewBox="0 0 16 16" class="arrow size-4 shrink-0 fill-current" aria-hidden="true">
                                <path fill-rule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                        @if ($showSecondary)
                        <a href="{{ $secondaryLink }}" class="btn-ghost btn-lg">{{ $secondaryText }}</a>
                        @endif
                    </div>

                    <p class="text-sm text-muted">{{ $note }}</p>

                    @if ($showRating)
                    <p class="flex flex-wrap items-center gap-x-2 gap-y-1 border-t border-line pt-6 text-sm text-muted">
                        <span class="flex items-center gap-0.5" aria-hidden="true">
                            <svg viewBox="0 0 20 20" class="size-4 shrink-0 fill-ink"><path d="m10 1.5 2.6 5.27 5.82.85-4.21 4.1.99 5.78L10 14.77l-5.2 2.73.99-5.78-4.21-4.1 5.82-.85L10 1.5Z"/></svg>
                            <svg viewBox="0 0 20 20" class="size-4 shrink-0 fill-ink"><path d="m10 1.5 2.6 5.27 5.82.85-4.21 4.1.99 5.78L10 14.77l-5.2 2.73.99-5.78-4.21-4.1 5.82-.85L10 1.5Z"/></svg>
                            <svg viewBox="0 0 20 20" class="size-4 shrink-0 fill-ink"><path d="m10 1.5 2.6 5.27 5.82.85-4.21 4.1.99 5.78L10 14.77l-5.2 2.73.99-5.78-4.21-4.1 5.82-.85L10 1.5Z"/></svg>
                            <svg viewBox="0 0 20 20" class="size-4 shrink-0 fill-ink"><path d="m10 1.5 2.6 5.27 5.82.85-4.21 4.1.99 5.78L10 14.77l-5.2 2.73.99-5.78-4.21-4.1 5.82-.85L10 1.5Z"/></svg>
                            <svg viewBox="0 0 20 20" class="size-4 shrink-0 fill-ink"><path d="m10 1.5 2.6 5.27 5.82.85-4.21 4.1.99 5.78L10 14.77l-5.2 2.73.99-5.78-4.21-4.1 5.82-.85L10 1.5Z"/></svg>
                        </span>
                        <span class="font-medium text-ink tabular-nums">{{ $ratingScore }}</span>
                        {{ $ratingLabel }}
                    </p>
                    @endif
                </div>

                <x-mocks.booking :durations="$durations" :weekdays="$weekdays" :days="$days" :slots="$slots" />

            </div>
        </div>
    </div>
</section>
