<!--
    Features. The Solutions menu in the header links straight to each row's id,
    so the anchors here and the urls in site.json's solution_links must match.
-->
<x-layouts.main title="Features" description="One link for an individual, pooled availability for a team, panels for recruiters, and callbacks for support." current="/features">

    <x-sections.page-header
        heading="Four ways people use the same booking link"
        body="The product underneath is identical. What changes is whose availability it reads and how it picks between them."
        showCta="1"
        showSecondary="1" />

    <x-sections.feature-rows
        :items="$features"
        :points="$featurePoints"
        :durations="$durations"
        :weekdays="$weekdays"
        :days="$days"
        :slots="$slots"
        :hours="$hours"
        :columns="$weekColumns"
        :events="$weekEvents" />

    <x-sections.capabilities :items="$capabilities" />

    <x-sections.integrations :items="$integrations" />

    <x-sections.cta heading="Try it on this week's calendar" />

</x-layouts.main>
