@props([
    'heading' => 'The rules that keep your week yours',
    'body' => 'A booking link is only useful if it refuses the wrong bookings. These are the four that do the most work.',
    'items',
    'columns',
    'events',
])
<!--
    Four benefits in an asymmetric grid — wide, narrow, then narrow, wide — so
    the eye moves diagonally instead of down four identical columns. Each card
    carries the drawn screen named by its mock key.
-->
<section class="pb-20 md:pb-28">
    <div class="mx-auto max-w-page px-6">

        <div data-reveal>
            <h2 class="display-section max-w-[24ch] font-display font-semibold text-balance text-ink">{{ $heading }}</h2>
            <p class="lede mt-5 max-w-[52ch] text-pretty text-muted">{{ $body }}</p>
        </div>

        <div class="mt-14 grid gap-6 lg:grid-cols-3" data-reveal>
            @foreach ($items as $item)
            <div class="flex flex-col gap-4 rounded-xl bg-surface p-6 shadow-card data-[width=wide]:lg:col-span-2 sm:p-8" data-width="{{ $item->width }}">
                <h3 class="title-card max-w-[24ch] font-display font-semibold text-balance text-ink">{{ $item->title }}</h3>
                <p class="max-w-[56ch] text-base/7 text-pretty text-muted sm:text-[0.9375rem]/7">{{ $item->body }}</p>
                <div class="mt-2 flex flex-1 items-center rounded-xl bg-canvas p-4">
                    @if ($item->mock == 'limits')
                    <x-mocks.limits />
                    @endif
                    @if ($item->mock == 'link')
                    <x-mocks.link />
                    @endif
                    @if ($item->mock == 'overlay')
                    <x-mocks.overlay :columns="$columns" :events="$events" />
                    @endif
                    @if ($item->mock == 'reminder')
                    <x-mocks.reminder />
                    @endif
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
