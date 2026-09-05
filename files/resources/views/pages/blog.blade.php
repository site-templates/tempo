<!--
    The blog index. Each row links to /blog/{slug}, which is served by the one
    dynamic page at pages/blog/[posts.slug].blade.php — there is no file per
    post. To publish, add an entry to resources/data/collections/posts.json.
-->
<x-layouts.main title="Writing" description="Notes on scheduling, calendars, time zones and the small decisions behind the product." current="/blog">

    <x-sections.page-header
        heading="Writing about time, and what it costs"
        body="Mostly about scheduling, occasionally about the engineering underneath it, and now and then about what we have decided not to build." />

    <x-sections.posts :items="$posts" />

    <x-sections.cta heading="Stop arranging, start meeting" />

</x-layouts.main>
