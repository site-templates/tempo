@props([
    'brand' => 'Tempo',
    'mission' => 'Tempo is scheduling that stays out of the way. Share one link, keep one calendar, and let the other person pick the time that works.',
    'columns' => [],
    'note' => 'Every plan includes unlimited event types, unlimited bookings, and a booking page you can put your own name on.',
    'legal' => 'Tempo is a demo product built for this template. Swap the copy, the links and the mark for your own.',
])
<!--
    The close of every page: the mark and what the product is for on the left,
    four link columns on the right. The columns come from footer_columns in
    resources/data/site.json, so one edit changes every page.
-->
<footer class="border-t border-line">
    <div class="mx-auto max-w-page px-6 py-16 md:py-20">

        <div class="grid gap-12 lg:grid-cols-[19rem_1fr] lg:gap-16">

            <div class="flex flex-col gap-5">
                <a href="/" aria-label="Homepage" class="flex w-fit items-center gap-2.5 text-carbon">
                    <svg viewBox="0 0 24 24" class="size-6 shrink-0 stroke-current" fill="none" stroke-width="3" stroke-linecap="round" aria-hidden="true">
                        <path d="M5 5h14"/>
                        <path d="M8 9v3"/>
                        <path d="M12 9v10"/>
                        <path d="M16 9v6.5"/>
                    </svg>
                    <span class="font-display text-xl font-semibold tracking-[0.005em]">{{ $brand }}</span>
                </a>
                <p class="max-w-[46ch] text-base/7 text-pretty text-muted sm:text-[0.9375rem]/7">{{ $mission }}</p>
            </div>

            <div class="grid grid-cols-2 gap-x-6 gap-y-10 sm:grid-cols-4">
                @foreach ($columns as $column)
                <div class="flex flex-col gap-4">
                    <h2 class="font-display text-[0.9375rem] font-semibold text-ink">{{ $column->text }}</h2>
                    <ul role="list" class="flex flex-col gap-3 text-base sm:text-[0.9375rem]">
                        @foreach ($column->children as $link)
                        <li>
                            <a href="{{ $link->url }}" class="text-link font-normal text-muted hover:text-ink">{{ $link->text }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>

        </div>

        <div class="mt-14 flex flex-col gap-3 border-t border-line pt-8 text-sm/6 text-muted md:flex-row md:items-start md:justify-between md:gap-10">
            <p class="max-w-[62ch] text-pretty">{{ $note }}</p>
            <p class="max-w-[48ch] text-pretty md:text-right">{{ $legal }}</p>
        </div>

    </div>
</footer>
