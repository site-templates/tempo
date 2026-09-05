@props([
    'items',
    'points',
    'durations',
    'weekdays',
    'days',
    'slots',
    'hours',
    'columns',
    'events',
])
<!--
    The Features page body: one row per audience, the drawn screen alternating
    sides so the page does not become four identical left-text rows. Each row's
    id is the anchor the Solutions menu links to, and its points come from the
    featurePoints collection, matched on the feature key.
-->
<div class="flex flex-col gap-20 pb-20 md:gap-28 md:pb-28">
    @foreach ($items as $item)
    <section id="{{ $item->id }}" class="scroll-mt-32">
        <div class="mx-auto max-w-page px-6">
            <div class="grid items-center gap-10 lg:grid-cols-2 lg:gap-16 data-[layout=stacked]:lg:grid-cols-1" data-layout="{{ $item->layout }}" data-reveal>

                <div class="flex flex-col items-start gap-5 data-[flip=1]:lg:order-2" data-flip="{{ $item->flip }}">
                    <h2 class="display-section max-w-[20ch] font-display font-semibold text-balance text-ink">{{ $item->title }}</h2>
                    <p class="lede max-w-[48ch] text-pretty text-muted">{{ $item->body }}</p>
                    <ul role="list" class="mt-2 flex flex-col gap-3">
                        @foreach ($points as $point)
                        @if ($point->feature == $item->id)
                        <li class="flex items-start gap-3 text-base/7 text-ink sm:text-[0.9375rem]/7">
                            <svg viewBox="0 0 16 16" class="size-4 h-lh shrink-0 fill-accent" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8 1.5a6.5 6.5 0 1 0 0 13 6.5 6.5 0 0 0 0-13Zm3.03 5.28a.75.75 0 0 0-1.06-1.06L7.25 8.44 6.03 7.22a.75.75 0 0 0-1.06 1.06l1.75 1.75a.75.75 0 0 0 1.06 0l3.25-3.25Z" clip-rule="evenodd"/>
                            </svg>
                            {{ $point->title }}
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>

                <!-- Every mock already draws its own white card, so nothing wraps it here. -->
                <div class="data-[layout=stacked]:lg:max-w-3xl" data-layout="{{ $item->layout }}">
                    @if ($item->mock == 'booking')
                    <x-mocks.booking :durations="$durations" :weekdays="$weekdays" :days="$days" :slots="$slots" />
                    @endif
                    @if ($item->mock == 'overlay')
                    <x-mocks.overlay :columns="$columns" :events="$events" />
                    @endif
                    @if ($item->mock == 'availability')
                    <x-mocks.availability :hours="$hours" />
                    @endif
                    @if ($item->mock == 'reminder')
                    <x-mocks.reminder />
                    @endif
                </div>

            </div>
        </div>
    </section>
    @endforeach
</div>
