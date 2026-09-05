@props([
    'title' => 'Post',
    'description' => '',
    'category' => '',
    'dateFormatted' => '',
    'readTime' => '',
    'author' => '',
    'authorAvatar' => '',
    'backText' => 'All writing',
    'backLink' => '/blog',
    'moreHeading' => 'More from the blog',
    'more',
])
<!--
    The reading layout for a single post. It wraps the main page layout so the
    header and footer are identical everywhere, then sets a comfortable measure
    for the body and closes with the rest of the collection.
-->
<x-layouts.main :title="$title" :description="$description" current="/blog">

    <article class="pt-32 pb-16 sm:pt-40">
        <div class="mx-auto max-w-page px-6">

            <div class="mx-auto flex max-w-[44rem] flex-col items-start gap-6">
                <a href="{{ $backLink }}" class="text-link flex items-center gap-1.5 text-sm font-medium text-muted hover:text-ink">
                    <svg viewBox="0 0 16 16" class="size-4 shrink-0 fill-current" aria-hidden="true">
                        <path fill-rule="evenodd" d="M9.78 4.22a.75.75 0 0 1 0 1.06L7.06 8l2.72 2.72a.75.75 0 1 1-1.06 1.06L5.47 8.53a.75.75 0 0 1 0-1.06l3.25-3.25a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd"/>
                    </svg>
                    {{ $backText }}
                </a>

                <h1 class="display-page max-w-[22ch] font-display font-semibold text-balance text-ink">{{ $title }}</h1>

                <p class="lede max-w-[54ch] text-pretty text-muted">{{ $description }}</p>

                <div class="flex flex-wrap items-center gap-x-4 gap-y-3 border-t border-line pt-6 text-sm text-muted">
                    <span class="flex items-center gap-2.5">
                        <img src="{{ $authorAvatar }}" alt="" width="32" height="32" class="size-8 shrink-0 rounded-full object-cover">
                        <span class="font-medium text-ink">{{ $author }}</span>
                    </span>
                    <span class="tabular-nums">{{ $category }}</span>
                    <span class="tabular-nums">{{ $dateFormatted }}</span>
                    <span class="tabular-nums">{{ $readTime }}</span>
                </div>
            </div>

            <div class="prose mx-auto mt-12 max-w-[44rem]">
                {{ $slot }}
            </div>

        </div>
    </article>

    <section class="pb-20 md:pb-28">
        <div class="mx-auto max-w-page px-6">
            <div class="mx-auto max-w-[44rem]">
                <h2 class="font-display text-xl font-semibold text-ink">{{ $moreHeading }}</h2>
                <ul role="list" class="mt-6 flex flex-col">
                    @foreach ($more as $item)
                    @if ($item->title != $title)
                    <li class="border-t border-line last:border-b">
                        <a href="{{ $item->link }}" class="group flex flex-col gap-2 py-5">
                            <span class="block max-w-[34ch] font-display text-lg font-semibold text-balance text-ink group-hover:text-accent">{{ $item->title }}</span>
                            <span class="block text-sm text-muted tabular-nums">{{ $item->category }} · {{ $item->dateFormatted }}</span>
                        </a>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

</x-layouts.main>
