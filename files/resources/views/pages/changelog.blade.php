<!--
    Every release, newest first, from resources/data/collections/changelog.json.
-->
<x-layouts.main title="Changelog" description="Everything we have shipped, newest first, with the reasoning where it matters." current="/changelog">

    <x-sections.page-header
        heading="What we shipped, and why"
        body="Small releases, often. Anything that changes how a booking behaves gets a paragraph explaining the decision." />

    <x-sections.changelog :items="$changelog" />

    <x-sections.cta heading="See it on your own calendar" />

</x-layouts.main>
