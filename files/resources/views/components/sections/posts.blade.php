@props([
    'readLabel' => 'Read',
    'items',
])
<!--
    The blog index as an editorial list rather than a grid of cards: the date
    and category hold a narrow left column, the writing holds the rest. Posts
    come from the posts collection, and each row links to the dynamic post page
    at /blog/{slug}.
-->
<section class="pb-20 md:pb-28">
    <div class="mx-auto max-w-page px-6">
        <ul role="list" class="flex flex-col" data-reveal>
            @foreach ($items as $item)
            <li class="border-t border-line last:border-b">
                <a href="{{ $item->link }}" class="group grid gap-4 py-8 lg:grid-cols-[11rem_1fr] lg:gap-10">
                    <span class="flex flex-col gap-1 text-sm text-muted">
                        <span class="font-medium text-ink">{{ $item->category }}</span>
                        <span class="tabular-nums">{{ $item->dateFormatted }}</span>
                        <span class="tabular-nums">{{ $item->readTime }}</span>
                    </span>
                    <span class="flex flex-col items-start gap-3">
                        <span class="block max-w-[28ch] font-display text-2xl font-semibold text-balance text-ink group-hover:text-accent sm:text-[1.75rem]/9">{{ $item->title }}</span>
                        <span class="block max-w-[66ch] text-base/7 text-pretty text-muted">{{ $item->description }}</span>
                        <span class="flex items-center gap-2.5 pt-1">
                            <img src="{{ $item->authorAvatar }}" alt="" width="28" height="28" class="size-7 shrink-0 rounded-full object-cover">
                            <span class="text-sm text-muted">{{ $item->author }}</span>
                        </span>
                    </span>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</section>
