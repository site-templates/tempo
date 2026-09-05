@props([
    'showHeading' => '1',
    'heading' => 'One price, whichever way you count',
    'body' => 'Free for one person forever. Everything paid is charged per person, per month, and you can leave in one click.',
    'monthlyLabel' => 'Monthly',
    'yearlyLabel' => 'Yearly',
    'saveLabel' => 'Save 15%',
    'perLabel' => 'per person, per month',
    'featuredLabel' => 'Most popular',
    'tiers',
    'points',
])
<!--
    Three plans as grid siblings, emphasised through the button and one word of
    text rather than a different background — a coloured card would break the
    monochrome rule and make the middle plan look like an advertisement. Both
    prices ship in the markup; data-period on the section decides which shows,
    so the toggle needs no re-render.
-->
<section class="pb-20 md:pb-28" data-pricing data-period="monthly">
    <div class="mx-auto max-w-page px-6">

        <div class="flex flex-col items-start gap-6" data-reveal>
            @if ($showHeading)
            <h2 class="display-section max-w-[20ch] font-display font-semibold text-balance text-ink">{{ $heading }}</h2>
            <p class="lede max-w-[52ch] text-pretty text-muted">{{ $body }}</p>
            @endif

            <div class="flex items-center gap-3">
                <div class="relative flex h-10 items-center rounded-full bg-surface p-1 shadow-card">
                    <span class="toggle-thumb absolute top-1 bottom-1 left-1 w-[calc(50%-0.25rem)] rounded-full bg-raised" aria-hidden="true"></span>
                    <button type="button" data-period-choice="monthly" aria-pressed="true" class="relative flex h-8 w-24 items-center justify-center rounded-full text-sm font-medium text-ink">{{ $monthlyLabel }}</button>
                    <button type="button" data-period-choice="yearly" aria-pressed="false" class="relative flex h-8 w-24 items-center justify-center rounded-full text-sm font-medium text-ink">{{ $yearlyLabel }}</button>
                </div>
                <p class="text-sm font-medium text-accent">{{ $saveLabel }}</p>
            </div>
        </div>

        <div class="mt-12 grid gap-6 lg:grid-cols-3" data-reveal>
            @foreach ($tiers as $tier)
            <div class="flex flex-col justify-between gap-8 rounded-xl bg-surface p-6 shadow-card sm:p-8">
                <div class="flex flex-col gap-6">
                    <div class="flex flex-col gap-2">
                        <div class="flex items-center justify-between gap-3">
                            <h3 class="title-card font-display font-semibold text-ink">{{ $tier->name }}</h3>
                            @if ($tier->featured)
                            <p class="rounded-full bg-accent-wash px-2.5 py-1 text-xs font-medium text-accent">{{ $featuredLabel }}</p>
                            @endif
                        </div>
                        <p class="text-base/7 text-pretty text-muted sm:text-[0.9375rem]/7">{{ $tier->audience }}</p>
                    </div>

                    <p class="flex items-baseline gap-2">
                        <span class="font-display text-5xl font-semibold text-ink tabular-nums">
                            <span class="price-monthly">{{ $tier->monthly }}</span><span class="price-yearly">{{ $tier->yearly }}</span>
                        </span>
                        <span class="text-sm text-muted">{{ $perLabel }}</span>
                    </p>

                    <ul role="list" class="flex flex-col gap-3 border-t border-line pt-6">
                        @foreach ($points as $point)
                        @if ($point->tier == $tier->name)
                        <li class="flex items-start gap-3 text-base/7 text-ink sm:text-[0.9375rem]/7">
                            <svg viewBox="0 0 16 16" class="size-4 h-lh shrink-0 fill-accent" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8 1.5a6.5 6.5 0 1 0 0 13 6.5 6.5 0 0 0 0-13Zm3.03 5.28a.75.75 0 0 0-1.06-1.06L7.25 8.44 6.03 7.22a.75.75 0 0 0-1.06 1.06l1.75 1.75a.75.75 0 0 0 1.06 0l3.25-3.25Z" clip-rule="evenodd"/>
                            </svg>
                            {{ $point->title }}
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>

                <div>
                    @if ($tier->featured)
                    <a href="{{ $tier->link }}" class="btn-solid w-full">{{ $tier->cta }}</a>
                    @else
                    <a href="{{ $tier->link }}" class="btn-ghost w-full">{{ $tier->cta }}</a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
