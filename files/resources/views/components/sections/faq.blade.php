@props([
    'heading' => 'Questions we get asked first',
    'body' => 'If yours is not here, write to us. A person answers, usually the same day.',
    'contactText' => 'Ask us anything',
    'contactLink' => 'mailto:hello@example.com',
    'items',
])
<!--
    Heading on the left, the questions on the right — so the section reads as a
    reference rather than a centred announcement. Opening one question closes
    the others, and the whole thing works without JavaScript because it is
    built on details and summary.
-->
<section class="pb-20 md:pb-28">
    <div class="mx-auto max-w-page px-6">
        <div class="grid gap-10 lg:grid-cols-[minmax(0,22rem)_1fr] lg:gap-16">

            <div class="flex flex-col items-start gap-5" data-reveal>
                <h2 class="display-section max-w-[18ch] font-display font-semibold text-balance text-ink">{{ $heading }}</h2>
                <p class="max-w-[42ch] text-base/7 text-pretty text-muted">{{ $body }}</p>
                <a href="{{ $contactLink }}" class="text-link text-[0.9375rem] font-medium text-accent hover:text-accent-lift">{{ $contactText }}</a>
            </div>

            <ul role="list" class="flex flex-col" data-faq data-reveal>
                @foreach ($items as $item)
                <li class="border-t border-line last:border-b">
                    <details>
                        <summary class="flex cursor-pointer list-none items-start justify-between gap-6 py-5">
                            <span class="font-display text-lg font-semibold text-balance text-ink">{{ $item->question }}</span>
                            <span class="faq-sign relative mt-1 flex size-5 shrink-0 items-center justify-center text-muted" aria-hidden="true">
                                <svg viewBox="0 0 16 16" class="size-4 fill-current">
                                    <path d="M8.75 2.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z"/>
                                </svg>
                            </span>
                        </summary>
                        <div class="faq-answer">
                            <div>
                                <p class="max-w-[70ch] pr-8 pb-6 text-base/7 text-pretty text-muted">{{ $item->answer }}</p>
                            </div>
                        </div>
                    </details>
                </li>
                @endforeach
            </ul>

        </div>
    </div>
</section>
