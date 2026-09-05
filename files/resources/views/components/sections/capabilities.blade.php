@props([
    'heading' => 'And the smaller things you only notice once',
    'body' => 'None of these are the reason anybody signs up. All of them are the reason nobody leaves.',
    'items',
])
<!--
    An index, not a card grid: two columns of hairline-separated rows. The point
    is that a reader can scan sixteen words and find the one capability they
    came for, which a wall of identical icon tiles makes harder, not easier.
-->
<section class="pb-20 md:pb-28">
    <div class="mx-auto max-w-page px-6">

        <div data-reveal>
            <h2 class="display-section max-w-[24ch] font-display font-semibold text-balance text-ink">{{ $heading }}</h2>
            <p class="lede mt-5 max-w-[52ch] text-pretty text-muted">{{ $body }}</p>
        </div>

        <dl class="mt-12 grid sm:grid-cols-2 sm:gap-x-16" data-reveal>
            @foreach ($items as $item)
            <div class="flex flex-col gap-1.5 border-t border-line py-6">
                <dt class="font-display text-base font-semibold text-ink">{{ $item->title }}</dt>
                <dd class="max-w-[46ch] text-base/7 text-pretty text-muted sm:text-[0.9375rem]/7">{{ $item->body }}</dd>
            </div>
            @endforeach
        </dl>

    </div>
</section>
