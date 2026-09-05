@props(['title' => 'Home', 'description' => '', 'current' => '/'])
<!doctype html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }} · {{ $site->name }}</title>
    <meta name="description" content="{{ $description }}">

    <link rel="icon" href="/favicon.svg" type="image/svg+xml">

    <!-- Outfit sets every heading; Inter runs the body light and tightly tracked. -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300..500&family=Outfit:wght@500..600&display=swap" rel="stylesheet">

    <!-- Loads Tailwind, then the tokens, the type scale, the prose rules and the motion system -->
    @vite(['resources/css/site.css'])

    <!-- Flags JavaScript before first paint so scroll reveals never flash -->
    <script>document.documentElement.classList.add('js')</script>
    <script src="/js/main.js" defer></script>
</head>
<body data-instant-navigation class="min-h-dvh bg-canvas font-sans text-ink antialiased">
<!--
    Paper for the page, white for everything laid on it, and one carbon pill
    floating over the top. The header opens every page the same way; the footer
    closes it the same way.
-->

    <x-nav :links="$site->nav_links" :solutions="$site->solution_links" :current="$current" />

    <main class="isolate">
        {{ $slot }}
    </main>

    <x-footer :columns="$site->footer_columns" />

</body>
</html>
