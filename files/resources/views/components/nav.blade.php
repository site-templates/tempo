@props([
    'brand' => 'Tempo',
    'links' => [],
    'solutions' => [],
    'solutionsLabel' => 'Solutions',
    'current' => '/',
    'signInText' => 'Sign in',
    'signInLink' => '#',
    'ctaText' => 'Get started',
    'ctaLink' => '#',
])
<!--
    The site-wide pill. White, floating over the paper canvas on every page,
    carrying the mark, the Solutions menu, the page links, sign in and one
    carbon button. Links come from nav_links in resources/data/site.json and the
    menu from solution_links, so one edit changes every page. The menu opens on
    hover and on keyboard focus with no script; main.js adds the tap toggle for
    touch screens and the phone menu.
-->
<header id="header" class="fixed inset-x-0 top-4 z-50 px-4 sm:top-6">
    <div class="relative mx-auto max-w-page">

        <div class="flex h-16 items-center rounded-full bg-surface pr-2 pl-5 shadow-pop sm:pl-6">

            <!-- href="/" always points to your site's root, in preview and when published -->
            <a href="/" aria-label="Homepage" class="flex shrink-0 items-center gap-2.5 text-carbon">
                <svg viewBox="0 0 24 24" class="size-6 shrink-0 stroke-current" fill="none" stroke-width="3" stroke-linecap="round" aria-hidden="true">
                    <path d="M5 5h14"/>
                    <path d="M8 9v3"/>
                    <path d="M12 9v10"/>
                    <path d="M16 9v6.5"/>
                </svg>
                <span class="font-display text-xl font-semibold tracking-[0.005em]">{{ $brand }}</span>
            </a>

            <nav class="ml-8 text-[0.9375rem] max-lg:hidden" aria-label="Main">
                <ul role="list" class="flex items-center">
                    <li class="nav-item relative" data-nav-item>
                        <button type="button" class="flex items-center gap-1 rounded-full px-3 py-2 text-muted hover:text-ink" aria-expanded="false" aria-haspopup="true" data-nav-toggle>
                            {{ $solutionsLabel }}
                            <svg viewBox="0 0 16 16" class="nav-chevron size-4 shrink-0 fill-current" aria-hidden="true">
                                <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                        <div class="nav-menu absolute top-full left-0 pt-4">
                            <ul role="list" class="w-80 rounded-2xl bg-surface p-2 shadow-pop">
                                @foreach ($solutions as $link)
                                <li>
                                    <a href="{{ $link->url }}" class="flex flex-col gap-0.5 rounded-xl px-3 py-2.5 hover:bg-canvas">
                                        <span class="font-medium text-ink">{{ $link->text }}</span>
                                        <span class="text-[0.8125rem] text-muted">{{ $link->description }}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    @foreach ($links as $link)
                    <li>
                        @if ($link->url == $current)
                        <a href="{{ $link->url }}" aria-current="page" class="block rounded-full px-3 py-2 font-medium text-ink">{{ $link->text }}</a>
                        @else
                        <a href="{{ $link->url }}" class="block rounded-full px-3 py-2 text-muted hover:text-ink">{{ $link->text }}</a>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </nav>

            <div class="ml-auto flex items-center gap-1 pl-4 text-[0.9375rem]">
                <a href="{{ $signInLink }}" class="text-link block rounded-full px-3 py-2 font-medium text-ink max-sm:hidden">{{ $signInText }}</a>

                <a href="{{ $ctaLink }}" class="btn-solid btn-sm btn-rect">
                    {{ $ctaText }}
                    <svg viewBox="0 0 16 16" class="arrow size-4 shrink-0 fill-current" aria-hidden="true">
                        <path fill-rule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                    </svg>
                </a>

                <button type="button" data-menu-toggle aria-expanded="false" aria-controls="mobile-menu" aria-label="Menu" class="relative ml-1 flex size-10 items-center justify-center rounded-full text-ink hover:bg-canvas lg:hidden">
                    <span class="absolute top-1/2 left-1/2 size-[max(100%,3rem)] -translate-1/2 pointer-fine:hidden" aria-hidden="true"></span>
                    <svg viewBox="0 0 20 20" class="menu-icon-open size-5 fill-current" aria-hidden="true">
                        <path fill-rule="evenodd" d="M2 5.75A.75.75 0 0 1 2.75 5h14.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 5.75Zm0 8.5a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd"/>
                    </svg>
                    <svg viewBox="0 0 20 20" class="menu-icon-close size-5 fill-current" aria-hidden="true">
                        <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- The phone menu. Hidden until the hamburger sets data-menu-open on the header. -->
        <div id="mobile-menu" class="absolute inset-x-0 top-full mt-2 rounded-3xl bg-surface p-3 shadow-pop lg:hidden">
            <nav aria-label="Main, mobile">
                <ul role="list" class="flex flex-col text-base">
                    @foreach ($links as $link)
                    <li>
                        @if ($link->url == $current)
                        <a href="{{ $link->url }}" aria-current="page" class="block rounded-2xl px-3 py-3 font-medium text-ink">{{ $link->text }}</a>
                        @else
                        <a href="{{ $link->url }}" class="block rounded-2xl px-3 py-3 text-muted hover:bg-canvas hover:text-ink">{{ $link->text }}</a>
                        @endif
                    </li>
                    @endforeach
                    @foreach ($solutions as $link)
                    <li class="first:mt-2 first:border-t first:border-line first:pt-2">
                        <a href="{{ $link->url }}" class="block rounded-2xl px-3 py-3 text-muted hover:bg-canvas hover:text-ink">{{ $link->text }}</a>
                    </li>
                    @endforeach
                    <li class="mt-2 border-t border-line pt-2 sm:hidden">
                        <a href="{{ $signInLink }}" class="block rounded-2xl px-3 py-3 text-muted hover:bg-canvas hover:text-ink">{{ $signInText }}</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
