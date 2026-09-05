@props([
    'heading' => 'Set it up once, in about ten minutes',
    'body' => 'After that the only thing you do is send a link. Everything below is a real screen, drawn rather than photographed, so it stays sharp.',
    'steps',
    'calendars',
    'hours',
])
<!--
    How it works: three numbered steps, each over the screen it describes. The
    numerals stay because the order genuinely matters — you cannot set hours
    before there is a calendar to read them from. The mock key on each step
    decides which drawn screen sits underneath it.
-->
<section class="py-20 md:py-28">
    <div class="mx-auto max-w-page px-6">

        <div data-reveal>
            <h2 class="display-section max-w-[24ch] font-display font-semibold text-balance text-ink">{{ $heading }}</h2>
            <p class="lede mt-5 max-w-[52ch] text-pretty text-muted">{{ $body }}</p>
        </div>

        <dl class="stagger mt-14 grid gap-6 md:grid-cols-3" data-reveal>
            @foreach ($steps as $step)
            <div class="flex flex-col gap-4 rounded-xl bg-surface p-6 shadow-card">
                <p class="text-sm font-medium text-muted tabular-nums">{{ $step->number }}</p>
                <dt class="title-card font-display font-semibold text-balance text-ink">{{ $step->title }}</dt>
                <dd class="text-base/7 text-pretty text-muted sm:text-[0.9375rem]/7">{{ $step->body }}</dd>
                <div class="mt-2 flex flex-1 items-center rounded-xl bg-canvas p-3">
                    @if ($step->mock == 'calendars')
                    <x-mocks.calendars :calendars="$calendars" />
                    @endif
                    @if ($step->mock == 'availability')
                    <x-mocks.availability :hours="$hours" />
                    @endif
                    @if ($step->mock == 'link')
                    <x-mocks.link />
                    @endif
                </div>
            </div>
            @endforeach
        </dl>

    </div>
</section>
