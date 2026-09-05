/*
    Tempo — the interaction layer.

    Everything here is a progressive enhancement. Without JavaScript nothing is
    hidden, every link works, the FAQ still opens and the booking card still
    shows a selected day and its times. With it the page gains the tap toggle
    on the Solutions menu, the phone menu, scroll reveals, the pricing toggle,
    the one-open FAQ, and the booking card's date, slot and confirmation.

    setUp(root) owns everything inside <main>. It runs once on load and again
    after every instant navigation for the swapped-in <main>. The header binds
    once — it persists across pages.
*/

document.documentElement.classList.add('js');

var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

var revealObserver = null;
var revealWatched = [];

solutionsMenu();
mobileMenu();
setUp(document);

document.addEventListener('instant:navigated', function (event) {
    closeMobileMenu();
    setUp(event.detail.main);
});

function setUp(root) {
    tearDown();

    reveals(root);
    stages(root);
    pricing(root);
    singleOpenFaq(root);
}

/* Reveals are the only thing that outlives a page, so it is all there is to release. */
function tearDown() {
    if (!revealObserver) {
        return;
    }

    revealWatched = revealWatched.filter(function (el) {
        if (el.isConnected && !el.classList.contains('is-visible')) {
            return true;
        }
        revealObserver.unobserve(el);
        return false;
    });
}

/* The Solutions menu: hover and focus open it in CSS; a tap toggles it for touch screens. */
function solutionsMenu() {
    var item = document.querySelector('[data-nav-item]');
    var toggle = item && item.querySelector('[data-nav-toggle]');

    if (!toggle) {
        return;
    }

    toggle.addEventListener('click', function () {
        var open = item.toggleAttribute('data-open');
        toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });

    document.addEventListener('click', function (event) {
        if (!item.contains(event.target)) {
            item.removeAttribute('data-open');
            toggle.setAttribute('aria-expanded', 'false');
        }
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && item.hasAttribute('data-open')) {
            item.removeAttribute('data-open');
            toggle.setAttribute('aria-expanded', 'false');
            toggle.focus();
        }
    });
}

function mobileMenu() {
    var header = document.getElementById('header');
    var toggle = header && header.querySelector('[data-menu-toggle]');

    if (!toggle) {
        return;
    }

    toggle.addEventListener('click', function () {
        var open = header.toggleAttribute('data-menu-open');
        toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && header.hasAttribute('data-menu-open')) {
            closeMobileMenu();
            toggle.focus();
        }
    });

    window.matchMedia('(min-width: 64rem)').addEventListener('change', closeMobileMenu);
}

function closeMobileMenu() {
    var header = document.getElementById('header');
    var toggle = header && header.querySelector('[data-menu-toggle]');

    if (header) {
        header.removeAttribute('data-menu-open');
    }

    if (toggle) {
        toggle.setAttribute('aria-expanded', 'false');
    }
}

/* Whole blocks marked data-reveal fade and rise once as they scroll into view. */
function reveals(root) {
    var targets = Array.prototype.slice.call(root.querySelectorAll('[data-reveal]'));

    if (reduceMotion || !('IntersectionObserver' in window)) {
        targets.forEach(function (el) { el.classList.add('is-visible'); });
        return;
    }

    if (!revealObserver) {
        revealObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { rootMargin: '0px 0px -8% 0px', threshold: 0.1 });
    }

    targets.forEach(function (el) {
        revealObserver.observe(el);
        revealWatched.push(el);
    });
}

/*
    The booking stage. Picking a date swaps which list of times is showing and
    rewrites the column heading; picking a time flips the card to its
    confirmation face; the button there flips it back. The markup already ships
    with one date selected, so this only ever changes an existing state.
*/
function stages(root) {
    root.querySelectorAll('[data-stage]').forEach(function (stage) {
        var dates = stage.querySelectorAll('[data-stage-date]');
        var lists = stage.querySelectorAll('[data-slots-for]');
        var heading = stage.querySelector('[data-stage-heading]');
        var summary = stage.querySelector('[data-stage-summary]');
        var reset = stage.querySelector('[data-stage-reset]');
        var label = heading ? heading.textContent : '';

        dates.forEach(function (date) {
            date.addEventListener('click', function () {
                label = date.dataset.label;

                dates.forEach(function (other) {
                    other.setAttribute('aria-pressed', other === date ? 'true' : 'false');
                });

                lists.forEach(function (list) {
                    list.toggleAttribute('data-current', list.dataset.slotsFor === date.dataset.stageDate);
                });

                if (heading) {
                    heading.textContent = label;
                }
            });
        });

        stage.querySelectorAll('[data-stage-slot]').forEach(function (slot) {
            slot.addEventListener('click', function () {
                if (summary) {
                    summary.textContent = label + ' at ' + slot.dataset.stageSlot;
                }
                stage.dataset.face = 'done';
            });
        });

        if (reset) {
            reset.addEventListener('click', function () {
                stage.dataset.face = 'book';
            });
        }
    });
}

/* The pricing toggle flips one attribute; both prices are already in the markup. */
function pricing(root) {
    root.querySelectorAll('[data-pricing]').forEach(function (section) {
        var choices = section.querySelectorAll('[data-period-choice]');

        choices.forEach(function (choice) {
            choice.addEventListener('click', function () {
                section.dataset.period = choice.dataset.periodChoice;
                choices.forEach(function (other) {
                    other.setAttribute('aria-pressed', other === choice ? 'true' : 'false');
                });
            });
        });
    });
}

/* Opening one question closes its siblings. */
function singleOpenFaq(root) {
    root.querySelectorAll('[data-faq]').forEach(function (list) {
        list.querySelectorAll('details').forEach(function (item) {
            item.addEventListener('toggle', function () {
                if (!item.open) {
                    return;
                }
                list.querySelectorAll('details[open]').forEach(function (other) {
                    if (other !== item) {
                        other.open = false;
                    }
                });
            });
        });
    });
}
