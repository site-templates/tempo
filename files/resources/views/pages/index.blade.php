<!--
    The homepage. It lives at pages/index.blade.php, so it is served at "/".
    The page is a list of sections: each tag pulls a component from
    resources/views/components/sections/ and fills its props with these
    attributes. In the visual editor you can select, reorder and edit them on
    the canvas.

    The shapes alternate on purpose — a split hero, a hairline strip, three
    steps, an asymmetric grid, a two-column index, one dark band, a reversed
    split, a two-column FAQ, and a centred close — so the page has a rhythm
    rather than nine variations of the same row.
-->
<x-layouts.main title="Scheduling that stays out of the way" description="Tempo holds your real availability behind one link. People pick a time that already works, and it lands in both calendars." current="/">

    <x-sections.hero :durations="$durations" :weekdays="$weekdays" :days="$days" :slots="$slots" />

    <x-sections.logos :logos="$logos" />

    <x-sections.steps :steps="$steps" :calendars="$calendars" :hours="$hours" />

    <x-sections.benefits :items="$benefits" :columns="$weekColumns" :events="$weekEvents" />

    <x-sections.capabilities :items="$capabilities" />

    <x-sections.quotes :items="$quotes" />

    <x-sections.integrations :items="$integrations" />

    <x-sections.faq :items="$faq" />

    <x-sections.cta />

</x-layouts.main>
