@props([
    'label' => 'Teams at these companies stopped emailing about times.',
    'logos',
])
<!--
    The trust strip. A hairline band on the paper canvas, directly under the
    hero, so it keeps the hero's left alignment. Six logos split evenly on
    every width — three and three on a phone, one row above it.
-->
<section class="border-y border-line">
    <div class="mx-auto max-w-page px-6 py-10">
        <div class="grid gap-8 md:grid-cols-[16rem_1fr] md:items-center md:gap-12">
            <p class="max-w-[30ch] text-sm/6 text-pretty text-muted">{{ $label }}</p>
            <ul role="list" class="grid grid-cols-3 items-center gap-x-6 gap-y-8 sm:grid-cols-6">
                @foreach ($logos as $logo)
                <li class="flex justify-center">
                    <img src="{{ $logo->image }}" alt="{{ $logo->name }}" height="22" class="h-[1.375rem] w-auto">
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
