@props([
    'heading' => 'Page title',
    'body' => '',
    'showCta' => '0',
    'ctaText' => 'Start for free',
    'ctaLink' => '#',
    'showSecondary' => '0',
    'secondaryText' => 'Book a demo',
    'secondaryLink' => '#',
])
<!--
    The opening of every page that is not the homepage. Left-aligned so it
    lines up with the container edge the sections below share.
-->
<section class="pt-32 pb-14 sm:pt-40 sm:pb-16">
    <div class="mx-auto max-w-page px-6">
        <div class="flex flex-col items-start gap-6">
            <h1 class="display-page max-w-[20ch] font-display font-semibold text-balance text-ink">{{ $heading }}</h1>
            @if ($body)
            <p class="lede max-w-[54ch] text-pretty text-muted">{{ $body }}</p>
            @endif
            @if ($showCta)
            <div class="mt-2 flex flex-wrap items-center gap-3">
                <a href="{{ $ctaLink }}" class="btn-solid">
                    {{ $ctaText }}
                    <svg viewBox="0 0 16 16" class="arrow size-4 shrink-0 fill-current" aria-hidden="true">
                        <path fill-rule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                    </svg>
                </a>
                @if ($showSecondary)
                <a href="{{ $secondaryLink }}" class="btn-ghost">{{ $secondaryText }}</a>
                @endif
            </div>
            @endif
        </div>
    </div>
</section>
