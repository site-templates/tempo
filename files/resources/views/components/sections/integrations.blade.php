@props([
    'heading' => 'It writes to the tools you already open',
    'body' => 'Calendars, video rooms, payments and the place your team talks. Connect one in a couple of clicks and Tempo keeps them in step.',
    'ctaText' => 'See every integration',
    'ctaLink' => '/features#integrations',
    'showSecondary' => '1',
    'secondaryText' => 'Read the API docs',
    'secondaryLink' => '/blog',
    'items',
])
<!--
    Copy left, a hairline-ruled tile grid right. The rules are the grid's own
    gap showing through a line-coloured background, so there is no nth-child
    border maths to redo at each breakpoint — four across on a tablet, two on a
    phone, and both split evenly.
-->
<section id="integrations" class="pb-20 md:pb-28">
    <div class="mx-auto max-w-page px-6">
        <div class="grid gap-10 lg:grid-cols-2 lg:items-center lg:gap-16" data-reveal>

            <div class="flex flex-col items-start gap-5">
                <h2 class="display-section max-w-[20ch] font-display font-semibold text-balance text-ink">{{ $heading }}</h2>
                <p class="lede max-w-[46ch] text-pretty text-muted">{{ $body }}</p>
                <div class="mt-2 flex flex-wrap items-center gap-3">
                    <a href="{{ $ctaLink }}" class="btn-ghost">{{ $ctaText }}</a>
                    @if ($showSecondary)
                    <a href="{{ $secondaryLink }}" class="text-link text-[0.9375rem] font-medium text-accent hover:text-accent-lift">{{ $secondaryText }}</a>
                    @endif
                </div>
            </div>

            <ul role="list" class="grid grid-cols-2 gap-px overflow-hidden rounded-xl bg-line shadow-card sm:grid-cols-4">
                @foreach ($items as $item)
                <li class="flex h-24 items-center justify-center bg-surface px-4">
                    <img src="{{ $item->image }}" alt="{{ $item->name }}" height="20" class="h-5 w-auto">
                </li>
                @endforeach
            </ul>

        </div>
    </div>
</section>
