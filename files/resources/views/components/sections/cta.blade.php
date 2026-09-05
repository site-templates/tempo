@props([
    'heading' => 'Send one link instead of four emails',
    'body' => 'Free for one person, forever. Two minutes to connect a calendar, and the next meeting arranges itself.',
    'ctaText' => 'Start for free',
    'ctaLink' => '#',
    'showSecondary' => '1',
    'secondaryText' => 'Talk to us first',
    'secondaryLink' => 'mailto:hello@example.com',
    'note' => 'No card, no trial clock, nothing to cancel.',
])
<!--
    The close, and the page's only centred heading — it has earned it, because
    everything under it is symmetrical. The backdrop is a drawn field of paper
    tiles masked to fade at the edges: no image, no bytes, sharp at any width.
-->
<section class="px-4 pb-20 md:pb-28">
    <div class="mx-auto max-w-page">
        <div class="relative isolate overflow-hidden rounded-3xl bg-surface px-6 py-20 sm:py-24">

            <svg aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10 size-full text-canvas [mask-image:radial-gradient(72%_62%_at_50%_50%,black,transparent)]">
                <defs>
                    <pattern id="tempo-tiles" width="76" height="76" patternUnits="userSpaceOnUse">
                        <rect x="6" y="6" width="64" height="64" rx="14" fill="currentColor"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#tempo-tiles)"/>
            </svg>

            <div class="flex flex-col items-center gap-6 text-center" data-reveal>
                <h2 class="display-section mx-auto max-w-[20ch] font-display font-semibold text-balance text-ink">{{ $heading }}</h2>
                <p class="lede mx-auto max-w-[46ch] text-pretty text-muted">{{ $body }}</p>
                <div class="flex flex-wrap items-center justify-center gap-3">
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
            </div>

        </div>
    </div>
</section>
