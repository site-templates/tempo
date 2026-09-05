@props([
    'heading' => 'Line by line',
    'body' => 'The same table our support team uses when somebody asks which plan they need.',
    'featureLabel' => 'Feature',
    'freeLabel' => 'Free',
    'proLabel' => 'Pro',
    'teamsLabel' => 'Teams',
    'items',
])
<!--
    A comparison table on the page itself — no card, no vertical rules, no
    uppercase headings. It scrolls sideways inside its own gutter-cancelling
    wrapper on a phone rather than squashing the columns.
-->
<section class="pb-20 md:pb-28">
    <div class="mx-auto max-w-page px-6">

        <div data-reveal>
            <h2 class="display-section max-w-[20ch] font-display font-semibold text-balance text-ink">{{ $heading }}</h2>
            <p class="lede mt-5 max-w-[52ch] text-pretty text-muted">{{ $body }}</p>
        </div>

        <div class="-mx-6 -my-2 mt-10 overflow-x-auto whitespace-nowrap" data-reveal>
            <div class="inline-block min-w-full px-6 py-2 align-middle">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-line-strong">
                            <th scope="col" class="py-4 pr-6 font-display text-[0.9375rem] font-semibold whitespace-nowrap text-ink">{{ $featureLabel }}</th>
                            <th scope="col" class="px-6 py-4 font-display text-[0.9375rem] font-semibold whitespace-nowrap text-ink">{{ $freeLabel }}</th>
                            <th scope="col" class="px-6 py-4 font-display text-[0.9375rem] font-semibold whitespace-nowrap text-ink">{{ $proLabel }}</th>
                            <th scope="col" class="py-4 pl-6 font-display text-[0.9375rem] font-semibold whitespace-nowrap text-ink">{{ $teamsLabel }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr class="border-b border-line">
                            <th scope="row" class="py-4 pr-6 text-[0.9375rem] font-normal whitespace-nowrap text-ink">{{ $item->feature }}</th>
                            <td class="px-6 py-4 text-[0.9375rem] text-muted tabular-nums">
                                @if ($item->free == 'yes')
                                <svg viewBox="0 0 16 16" class="size-4 h-lh fill-accent" role="img"><path fill-rule="evenodd" d="M8 1.5a6.5 6.5 0 1 0 0 13 6.5 6.5 0 0 0 0-13Zm3.03 5.28a.75.75 0 0 0-1.06-1.06L7.25 8.44 6.03 7.22a.75.75 0 0 0-1.06 1.06l1.75 1.75a.75.75 0 0 0 1.06 0l3.25-3.25Z" clip-rule="evenodd"/><title>Included</title></svg>
                                @endif
                                @if ($item->free == 'no')
                                <svg viewBox="0 0 16 16" class="size-4 h-lh fill-faint" role="img"><path d="M3.5 7.25a.75.75 0 0 0 0 1.5h9a.75.75 0 0 0 0-1.5h-9Z"/><title>Not included</title></svg>
                                @endif
                                @if ($item->free != 'yes')
                                @if ($item->free != 'no')
                                {{ $item->free }}
                                @endif
                                @endif
                            </td>
                            <td class="px-6 py-4 text-[0.9375rem] text-muted tabular-nums">
                                @if ($item->pro == 'yes')
                                <svg viewBox="0 0 16 16" class="size-4 h-lh fill-accent" role="img"><path fill-rule="evenodd" d="M8 1.5a6.5 6.5 0 1 0 0 13 6.5 6.5 0 0 0 0-13Zm3.03 5.28a.75.75 0 0 0-1.06-1.06L7.25 8.44 6.03 7.22a.75.75 0 0 0-1.06 1.06l1.75 1.75a.75.75 0 0 0 1.06 0l3.25-3.25Z" clip-rule="evenodd"/><title>Included</title></svg>
                                @endif
                                @if ($item->pro == 'no')
                                <svg viewBox="0 0 16 16" class="size-4 h-lh fill-faint" role="img"><path d="M3.5 7.25a.75.75 0 0 0 0 1.5h9a.75.75 0 0 0 0-1.5h-9Z"/><title>Not included</title></svg>
                                @endif
                                @if ($item->pro != 'yes')
                                @if ($item->pro != 'no')
                                {{ $item->pro }}
                                @endif
                                @endif
                            </td>
                            <td class="py-4 pl-6 text-[0.9375rem] text-muted tabular-nums">
                                @if ($item->teams == 'yes')
                                <svg viewBox="0 0 16 16" class="size-4 h-lh fill-accent" role="img"><path fill-rule="evenodd" d="M8 1.5a6.5 6.5 0 1 0 0 13 6.5 6.5 0 0 0 0-13Zm3.03 5.28a.75.75 0 0 0-1.06-1.06L7.25 8.44 6.03 7.22a.75.75 0 0 0-1.06 1.06l1.75 1.75a.75.75 0 0 0 1.06 0l3.25-3.25Z" clip-rule="evenodd"/><title>Included</title></svg>
                                @endif
                                @if ($item->teams == 'no')
                                <svg viewBox="0 0 16 16" class="size-4 h-lh fill-faint" role="img"><path d="M3.5 7.25a.75.75 0 0 0 0 1.5h9a.75.75 0 0 0 0-1.5h-9Z"/><title>Not included</title></svg>
                                @endif
                                @if ($item->teams != 'yes')
                                @if ($item->teams != 'no')
                                {{ $item->teams }}
                                @endif
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>
