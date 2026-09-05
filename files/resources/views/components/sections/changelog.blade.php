@props([
    'items',
])
<!--
    Every release, newest first. The version and date hold a narrow left column
    so the entries read as a spine; the body is rich text from the changelog
    collection, styled by the prose rules in site.css.
-->
<section class="pb-20 md:pb-28">
    <div class="mx-auto max-w-page px-6">
        <div class="flex flex-col" data-reveal>
            @foreach ($items as $item)
            <article class="grid gap-4 border-t border-line py-10 last:border-b lg:grid-cols-[11rem_1fr] lg:gap-10">
                <div class="flex items-baseline gap-3 lg:flex-col lg:gap-2">
                    <p class="flex h-7 items-center rounded-full bg-surface px-3 font-display text-sm font-semibold text-ink shadow-card tabular-nums">{{ $item->version }}</p>
                    <p class="text-sm text-muted tabular-nums">{{ $item->dateFormatted }}</p>
                </div>
                <div class="flex flex-col gap-4">
                    <h2 class="max-w-[30ch] font-display text-2xl font-semibold text-balance text-ink">{{ $item->title }}</h2>
                    <div class="prose max-w-[70ch]">{!! $item->content !!}</div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
