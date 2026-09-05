<!--
    The 404 page. Served whenever a URL does not match a page — including a
    /blog/{slug} that is not in the posts collection.
-->
<x-layouts.main title="Page not found" description="That page does not exist." current="">

    <section class="flex min-h-[80vh] items-center pt-32 pb-24">
        <div class="mx-auto flex w-full max-w-page flex-col items-start px-6">
            <p class="text-sm text-muted tabular-nums">404</p>
            <h1 class="display-page mt-5 max-w-[18ch] font-display font-semibold text-balance text-ink">Nothing is booked at this address.</h1>
            <p class="lede mt-6 max-w-[46ch] text-pretty text-muted">The link is broken or the page has moved. Everything else is one click away.</p>
            <div class="mt-9 flex flex-wrap items-center gap-3">
                <a href="/" class="btn-solid btn-lg">Back to the homepage</a>
                <a href="/features" class="btn-ghost btn-lg">See the features</a>
            </div>
        </div>
    </section>

</x-layouts.main>
