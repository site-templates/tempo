@props([
    'heading' => 'What people say once they have stopped emailing',
    'body' => 'The compliment we get most often is that nobody mentions the software any more.',
    'items',
])
<!--
    The page's one dark beat, full width edge to edge. The heading and the lede
    hold the left; the large quote answers them across the fold; three short
    quotes close the band in a hairline-divided row. Quotes come from the quotes
    collection — the one marked large runs across the top, the rest below.
-->
<section class="bg-carbon py-20 text-carbon-ink md:py-28">
    <div class="mx-auto max-w-page px-6">

        <div class="grid gap-10 lg:grid-cols-[minmax(0,26rem)_1fr] lg:gap-16" data-reveal>
            <div>
                <h2 class="display-section max-w-[22ch] font-display font-semibold text-balance">{{ $heading }}</h2>
                <p class="lede mt-5 max-w-[44ch] text-pretty text-carbon-muted">{{ $body }}</p>
            </div>

            @foreach ($items as $item)
            @if ($item->size == 'large')
            <figure class="flex flex-col justify-between gap-8">
                <blockquote class="max-w-[42ch] font-display text-2xl/9 text-balance sm:text-[1.75rem]/10">
                    <p class="relative before:absolute before:inline before:-translate-x-full before:content-['\201C'] after:inline after:content-['\201D']">{{ $item->quote }}</p>
                </blockquote>
                <figcaption class="flex items-center gap-3">
                    <img src="{{ $item->avatar }}" alt="" width="40" height="40" class="size-10 shrink-0 rounded-full object-cover">
                    <span class="text-sm/6">
                        <span class="block font-medium">{{ $item->name }}</span>
                        <span class="block text-carbon-muted">{{ $item->role }}</span>
                    </span>
                </figcaption>
            </figure>
            @endif
            @endforeach
        </div>

        <ul role="list" class="mt-16 grid gap-y-10 border-t border-carbon-line sm:grid-cols-3 sm:gap-x-10" data-reveal>
            @foreach ($items as $item)
            @if ($item->size == 'small')
            <li class="flex flex-col justify-between gap-6 pt-8 sm:border-l sm:border-carbon-line sm:pl-10 sm:first:border-l-0 sm:first:pl-0">
                <blockquote class="text-base/7">
                    <p class="relative text-pretty before:absolute before:inline before:-translate-x-full before:content-['\201C'] after:inline after:content-['\201D']">{{ $item->quote }}</p>
                </blockquote>
                <div class="flex items-center gap-3">
                    <img src="{{ $item->avatar }}" alt="" width="32" height="32" class="size-8 shrink-0 rounded-full object-cover">
                    <span class="text-sm/6">
                        <span class="block font-medium">{{ $item->name }}</span>
                        <span class="block text-carbon-muted">{{ $item->role }}</span>
                    </span>
                </div>
            </li>
            @endif
            @endforeach
        </ul>

    </div>
</section>
