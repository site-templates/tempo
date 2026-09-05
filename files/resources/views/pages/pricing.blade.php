<!--
    Pricing. The plans, everything every plan includes, the line-by-line table,
    and the questions people ask before they pick one.
-->
<x-layouts.main title="Pricing" description="Free for one person forever. Paid plans are per person, per month, and you can leave in one click." current="/pricing">

    <x-sections.page-header
        heading="Pay for the people, not the meetings"
        body="Bookings are unlimited on every plan, including the free one. What you pay for is other people's calendars." />

    <x-sections.pricing showHeading="0" :tiers="$tiers" :points="$tierFeatures" />

    <x-sections.capabilities
        heading="In every plan, including the free one"
        body="These are not the paid features. They are the floor."
        :items="$included" />

    <x-sections.compare :items="$comparison" />

    <x-sections.faq :items="$faq" />

    <x-sections.cta heading="Start on the free plan" body="Connect a calendar, share a link, and move up only if a second person needs to be in the room." />

</x-layouts.main>
