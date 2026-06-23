/**
 * Extreme Vivid Auto Glass — front-end interactions.
 *
 * Progressive enhancement: every section renders fully without JS.
 * JS only adds the orchestration that used to live in the .dc.html prototype.
 */

import './index.css';

const HEADER_OFFSET = 70;

/* ------------------------------------------------------------------
 * Smooth scroll to in-page sections via [data-scroll-to="<id>"].
 * ----------------------------------------------------------------- */
function smoothScrollTo( id ) {
	const el = document.getElementById( id );
	if ( ! el ) return;

	const top = el.getBoundingClientRect().top
		+ ( window.pageYOffset || document.documentElement.scrollTop || 0 )
		- HEADER_OFFSET;

	try {
		window.scrollTo( { top, behavior: 'smooth' } );
	} catch ( _ ) {
		window.scrollTo( 0, top );
	}
}

function initScrollLinks() {
	document.addEventListener( 'click', ( event ) => {
		const trigger = event.target.closest( '[data-scroll-to]' );
		if ( ! trigger ) return;

		const id = trigger.getAttribute( 'data-scroll-to' );
		if ( ! id ) return;

		const href = trigger.getAttribute( 'href' );
		if ( href ) {
			const destination = new URL( href, window.location.href );
			const currentPath = window.location.pathname.replace( /\/+$/, '' ) || '/';
			const destinationPath = destination.pathname.replace( /\/+$/, '' ) || '/';
			const sameDocument = destination.origin === window.location.origin
				&& destinationPath === currentPath;

			// A homepage section link clicked from another page must navigate
			// home first, even when that page happens to contain the same ID.
			if ( ! sameDocument ) return;
		}

		// Only intercept the click if the target exists on the current page.
		// Otherwise let the browser follow the href (e.g. /#services from a
		// service detail page should navigate to the homepage normally).
		if ( ! document.getElementById( id ) ) return;

		event.preventDefault();
		closeMobileNav();
		smoothScrollTo( id );
	} );
}

/* ------------------------------------------------------------------
 * Mobile nav drawer toggle.
 * ----------------------------------------------------------------- */
function closeMobileNav() {
	const toggle = document.querySelector( '[data-nav-toggle]' );
	const drawer = document.querySelector( '[data-nav-drawer]' );
	if ( ! toggle || ! drawer ) return;

	toggle.setAttribute( 'aria-expanded', 'false' );
	drawer.hidden = true;
}

function initMobileNav() {
	const toggle = document.querySelector( '[data-nav-toggle]' );
	const drawer = document.querySelector( '[data-nav-drawer]' );
	if ( ! toggle || ! drawer ) return;

	toggle.addEventListener( 'click', () => {
		const open = toggle.getAttribute( 'aria-expanded' ) === 'true';
		toggle.setAttribute( 'aria-expanded', open ? 'false' : 'true' );
		drawer.hidden = open;
	} );
}

/* ------------------------------------------------------------------
 * Glass selector tiles → set quote form's <select> + scroll to quote.
 * ----------------------------------------------------------------- */
function initGlassSelector() {
	const tiles  = Array.from( document.querySelectorAll( '[data-glass-select]' ) );
	const select = document.querySelector( '[data-cf7-quote] select[name="glass"]' );
	if ( ! tiles.length ) return;

	function setActive( value ) {
		tiles.forEach( ( tile ) => {
			const matches = tile.getAttribute( 'data-glass-value' ) === value;
			tile.setAttribute( 'aria-pressed', matches ? 'true' : 'false' );

			const frame = tile.querySelector( '[data-active-frame]' );
			const tick  = tile.querySelector( '[data-active-tick]' );
			if ( frame ) frame.hidden = ! matches;
			if ( tick )  tick.hidden  = ! matches;
		} );

		if ( select ) {
			select.value = value;
			select.dispatchEvent( new Event( 'change', { bubbles: true } ) );
		}
	}

	tiles.forEach( ( tile ) => {
		tile.addEventListener( 'click', () => {
			const value = tile.getAttribute( 'data-glass-value' );
			if ( ! value ) return;
			setActive( value );
			smoothScrollTo( 'quote' );
		} );
	} );

	// Reflect manual <select> changes back to the tile state.
	if ( select ) {
		select.addEventListener( 'change', () => {
			setActive( select.value );
		} );
	}
}

/* ------------------------------------------------------------------
 * Contact-method picker (Email / Phone / Both) — hidden input + frame.
 * ----------------------------------------------------------------- */
function initContactPicker() {
	const buttons = Array.from( document.querySelectorAll( '[data-contact-select]' ) );
	const input   = document.querySelector( '[data-cf7-quote] input[name="contact"]' );
	if ( ! buttons.length || ! input ) return;

	buttons.forEach( ( btn ) => {
		btn.addEventListener( 'click', () => {
			const value = btn.getAttribute( 'data-contact-value' );
			input.value = value;

			buttons.forEach( ( b ) => {
				const matches = b === btn;
				b.setAttribute( 'aria-pressed', matches ? 'true' : 'false' );
				const frame = b.querySelector( '[data-active-frame]' );
				if ( frame ) frame.hidden = ! matches;
			} );
		} );
	} );
}

/* ------------------------------------------------------------------
 * Reviews slider — prev/next + keyboard arrows + dots + edge disable.
 * ----------------------------------------------------------------- */
function initReviewsSlider() {
	const viewport = document.querySelector( '[data-reviews-viewport]' );
	const track    = document.querySelector( '[data-reviews-track]' );
	const prevBtn  = document.querySelector( '[data-reviews-prev]' );
	const nextBtn  = document.querySelector( '[data-reviews-next]' );
	const dotsWrap = document.querySelector( '[data-reviews-dots]' );

	if ( ! viewport || ! track || ! prevBtn || ! nextBtn ) return;

	let index = 0;
	let dots  = [];

	function step() {
		const card = track.querySelector( 'article' );
		if ( ! card ) return 0;
		const gap = 16;
		return card.getBoundingClientRect().width + gap;
	}

	function maxIndex() {
		const cards = track.querySelectorAll( 'article' ).length;
		const perView = Math.max( 1, Math.round( viewport.clientWidth / step() ) );
		return Math.max( 0, cards - perView );
	}

	function syncEdges() {
		const max = maxIndex();
		prevBtn.disabled = index <= 0;
		nextBtn.disabled = index >= max;
		prevBtn.setAttribute( 'aria-disabled', prevBtn.disabled ? 'true' : 'false' );
		nextBtn.setAttribute( 'aria-disabled', nextBtn.disabled ? 'true' : 'false' );
		dots.forEach( ( d, i ) => {
			d.setAttribute( 'aria-current', i === index ? 'true' : 'false' );
		} );
	}

	function update( delta ) {
		const max = maxIndex();
		index = Math.min( max, Math.max( 0, index + delta ) );
		track.style.transform = `translateX(${ -index * step() }px)`;
		syncEdges();
	}

	function goTo( i ) {
		const max = maxIndex();
		index = Math.min( max, Math.max( 0, i ) );
		track.style.transform = `translateX(${ -index * step() }px)`;
		syncEdges();
	}

	function buildDots() {
		if ( ! dotsWrap ) return;
		dotsWrap.innerHTML = '';
		const count = maxIndex() + 1;
		for ( let i = 0; i < count; i++ ) {
			const dot = document.createElement( 'button' );
			dot.type = 'button';
			dot.className = 'evag-rev-dot';
			dot.setAttribute( 'aria-label', `Go to review group ${ i + 1 }` );
			dot.setAttribute( 'aria-current', i === index ? 'true' : 'false' );
			dot.addEventListener( 'click', () => goTo( i ) );
			dotsWrap.appendChild( dot );
		}
		dots = Array.from( dotsWrap.querySelectorAll( '.evag-rev-dot' ) );
	}

	prevBtn.addEventListener( 'click', () => update( -1 ) );
	nextBtn.addEventListener( 'click', () => update( 1 ) );

	// Keyboard nav when the viewport region is focused.
	viewport.setAttribute( 'tabindex', '0' );
	viewport.setAttribute( 'role', 'region' );
	viewport.setAttribute( 'aria-label', 'Customer reviews' );
	viewport.addEventListener( 'keydown', ( e ) => {
		if ( e.key === 'ArrowRight' ) { e.preventDefault(); update( 1 ); }
		if ( e.key === 'ArrowLeft' )  { e.preventDefault(); update( -1 ); }
	} );

	buildDots();
	syncEdges();

	let resizeTimer;
	window.addEventListener( 'resize', () => {
		clearTimeout( resizeTimer );
		resizeTimer = setTimeout( () => {
			index = 0;
			track.style.transform = 'translateX(0px)';
			buildDots();
			syncEdges();
		}, 120 );
	} );
}

/* ------------------------------------------------------------------
 * Reveal observer — opts the page into entrance motion only after
 * pageload + JS, so non-JS / bots ship the painted page.
 * ----------------------------------------------------------------- */
function initReveal() {
	const reduce = window.matchMedia && window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;
	if ( reduce ) return;

	document.documentElement.classList.add( 'evag-can-animate' );

	const targets = document.querySelectorAll( '[data-reveal]' );
	if ( ! targets.length || ! ( 'IntersectionObserver' in window ) ) {
		targets.forEach( ( el ) => el.classList.add( 'is-in' ) );
		return;
	}

	const io = new IntersectionObserver( ( entries ) => {
		entries.forEach( ( entry ) => {
			if ( entry.isIntersecting ) {
				entry.target.classList.add( 'is-in' );
				io.unobserve( entry.target );
			}
		} );
	}, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 } );

	targets.forEach( ( el ) => io.observe( el ) );

	// How-it-works rail draw.
	const rail = document.querySelector( '.evag-hiw-rail' );
	if ( rail ) {
		const railIo = new IntersectionObserver( ( entries ) => {
			entries.forEach( ( entry ) => {
				if ( entry.isIntersecting ) {
					rail.classList.add( 'is-in' );
					railIo.unobserve( entry.target );
				}
			} );
		}, { threshold: 0.4 } );
		railIo.observe( rail.parentElement );
	}
}

/* ------------------------------------------------------------------
 * Quote form — Contact Form 7 event integration.
 * ----------------------------------------------------------------- */
function initQuoteForm() {
	const wrapper = document.querySelector( '[data-cf7-quote]' );
	const success = document.querySelector( '[data-quote-success]' );
	if ( ! wrapper || ! success ) return;

	const form = wrapper.querySelector( '.evag-cf7-form' );
	if ( ! form ) return;

	const zip = form.querySelector( 'input[name="zip"]' );
	if ( zip ) {
		zip.setAttribute( 'inputmode', 'numeric' );
	}

	const setSubmitting = ( submitting ) => {
		const submit = form.querySelector( '.evag-quote-submit' );
		if ( ! submit ) return;

		if ( submitting ) {
			submit.dataset.originalLabel = submit.value;
			submit.value = 'Sending…';
			submit.disabled = true;
		} else {
			submit.value = submit.dataset.originalLabel || 'Get my auto glass quote →';
			submit.disabled = false;
		}
	};

	form.addEventListener( 'wpcf7beforesubmit', () => {
		setSubmitting( true );
	} );

	form.addEventListener( 'wpcf7submit', () => {
		setSubmitting( false );
	} );

	form.addEventListener( 'wpcf7mailsent', ( event ) => {
		const inputs = event.detail && Array.isArray( event.detail.inputs )
			? event.detail.inputs
			: [];
		const nameField = inputs.find( ( input ) => input.name === 'name' );
		const name = nameField && typeof nameField.value === 'string'
			? nameField.value.trim()
			: '';
		const thanks = success.querySelector( '[data-quote-thanks-name]' );

		if ( thanks && name ) {
			thanks.textContent = ', ' + name.split( ' ' )[ 0 ];
		}

		form.hidden = true;
		success.hidden = false;
		smoothScrollTo( 'quote' );
	} );
}

/* ------------------------------------------------------------------
 * Boot.
 * ----------------------------------------------------------------- */
function boot() {
	initScrollLinks();
	initMobileNav();
	initGlassSelector();
	initContactPicker();
	initReviewsSlider();
	initQuoteForm();
	initReveal();
	initBeforeAfter();
	initNavDropdown();
}

/**
 * Services dropdown in the desktop primary nav.
 * - Hover/focus opens, click toggles, outside-click + Escape closes.
 * - Keyboard accessible (button toggles aria-expanded).
 */
function initNavDropdown() {
	const wrapper = document.querySelector( '.evag-nav-dropdown' );
	if ( ! wrapper ) return;

	const button = wrapper.querySelector( '[data-nav-dropdown]' );
	const menu   = wrapper.querySelector( '.evag-nav-menu' );
	if ( ! button || ! menu ) return;

	let hoverTimer = null;

	const open = () => {
		clearTimeout( hoverTimer );
		wrapper.classList.add( 'is-open' );
		button.setAttribute( 'aria-expanded', 'true' );
		menu.hidden = false;
	};

	const close = () => {
		wrapper.classList.remove( 'is-open' );
		button.setAttribute( 'aria-expanded', 'false' );
		menu.hidden = true;
	};

	const scheduleClose = () => {
		clearTimeout( hoverTimer );
		hoverTimer = setTimeout( close, 180 );
	};

	button.addEventListener( 'click', ( e ) => {
		e.preventDefault();
		if ( wrapper.classList.contains( 'is-open' ) ) {
			close();
		} else {
			open();
		}
	} );

	wrapper.addEventListener( 'mouseenter', open );
	wrapper.addEventListener( 'mouseleave', scheduleClose );

	// Focus management — keep menu open while children are focused.
	wrapper.addEventListener( 'focusin', open );
	wrapper.addEventListener( 'focusout', ( e ) => {
		if ( ! wrapper.contains( e.relatedTarget ) ) {
			close();
		}
	} );

	// Outside click closes.
	document.addEventListener( 'click', ( e ) => {
		if ( ! wrapper.contains( e.target ) ) close();
	} );

	// Escape closes and returns focus to the trigger.
	document.addEventListener( 'keydown', ( e ) => {
		if ( e.key === 'Escape' && wrapper.classList.contains( 'is-open' ) ) {
			close();
			button.focus();
		}
	} );
}

/**
 * Before/After comparison sliders — drag to reveal.
 * Uses pointer events for unified mouse + touch handling.
 */
function initBeforeAfter() {
	const sliders = document.querySelectorAll( '[data-ba-slider]' );
	if ( ! sliders.length ) return;

	sliders.forEach( slider => {
		let dragging = false;

		const setPos = clientX => {
			const rect = slider.getBoundingClientRect();
			let pct = ( ( clientX - rect.left ) / rect.width ) * 100;
			pct = Math.max( 2, Math.min( 98, pct ) );
			slider.style.setProperty( '--ba-pos', pct + '%' );
		};

		const onDown = e => {
			dragging = true;
			slider.setPointerCapture && slider.setPointerCapture( e.pointerId );
			setPos( e.clientX );
		};

		const onMove = e => {
			if ( ! dragging ) {
				// Subtle hover follow when not actively dragging on desktop.
				if ( e.pointerType === 'mouse' ) {
					setPos( e.clientX );
				}
				return;
			}
			setPos( e.clientX );
			e.preventDefault();
		};

		const onUp = e => {
			dragging = false;
			slider.releasePointerCapture && slider.releasePointerCapture( e.pointerId );
		};

		slider.addEventListener( 'pointerdown', onDown );
		slider.addEventListener( 'pointermove', onMove );
		slider.addEventListener( 'pointerup', onUp );
		slider.addEventListener( 'pointercancel', onUp );
		slider.addEventListener( 'pointerleave', () => { dragging = false; } );
	} );
}

if ( document.readyState === 'loading' ) {
	document.addEventListener( 'DOMContentLoaded', boot );
} else {
	boot();
}
