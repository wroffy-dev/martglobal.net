/* MART Global — site interactions (no dependencies) */
(function () {
  'use strict';

  const $ = (sel, ctx = document) => ctx.querySelector(sel);
  const $$ = (sel, ctx = document) => Array.from(ctx.querySelectorAll(sel));
  const desktop = window.matchMedia('(min-width: 1101px)');

  /* ---------- Sticky header ---------- */
  const header = $('#siteHeader');
  const onScroll = () => header && header.classList.toggle('is-solid', window.scrollY > 40);
  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });

  /* ---------- Mega menus ---------- */
  const megas = $$('[data-mega]');
  const closeMegas = (except) => {
    megas.forEach((m) => {
      if (m === except) return;
      m.classList.remove('is-open');
      $('.mega-toggle', m).setAttribute('aria-expanded', 'false');
    });
    if (!except) header.classList.remove('mega-open');
  };
  const openMega = (m) => {
    closeMegas(m);
    m.classList.add('is-open');
    $('.mega-toggle', m).setAttribute('aria-expanded', 'true');
    header.classList.add('mega-open');
  };
  megas.forEach((m) => {
    let timer;
    const btn = $('.mega-toggle', m);
    btn.addEventListener('click', () => (m.classList.contains('is-open') ? closeMegas() : openMega(m)));
    m.addEventListener('mouseenter', () => { if (desktop.matches) { clearTimeout(timer); openMega(m); } });
    m.addEventListener('mouseleave', () => { if (desktop.matches) timer = setTimeout(() => closeMegas(), 180); });
    $$('a', m).forEach((a) => a.addEventListener('click', () => closeMegas()));
  });
  document.addEventListener('click', (e) => { if (!e.target.closest('[data-mega]')) closeMegas(); });

  /* ---------- Mobile navigation ---------- */
  const mobileNav = $('#mobileNav');
  const backdrop = $('#navBackdrop');
  const menuToggle = $('#menuToggle');
  const setMobile = (open) => {
    mobileNav.classList.toggle('is-open', open);
    backdrop.classList.toggle('is-open', open);
    document.body.classList.toggle('nav-open', open);
    mobileNav.setAttribute('aria-hidden', String(!open));
    menuToggle.setAttribute('aria-expanded', String(open));
    if (open) $('.menu-close', mobileNav).focus();
  };
  menuToggle && menuToggle.addEventListener('click', () => setMobile(true));
  $('#menuClose') && $('#menuClose').addEventListener('click', () => setMobile(false));
  backdrop && backdrop.addEventListener('click', () => setMobile(false));
  $$('.mobile-nav a').forEach((a) => a.addEventListener('click', () => setMobile(false)));
  $$('.m-toggle').forEach((btn) => btn.addEventListener('click', () => {
    const group = btn.parentElement;
    const open = !group.classList.contains('is-open');
    group.classList.toggle('is-open', open);
    btn.setAttribute('aria-expanded', String(open));
  }));

  document.addEventListener('keydown', (e) => {
    if (e.key !== 'Escape') return;
    closeMegas();
    if (mobileNav && mobileNav.classList.contains('is-open')) { setMobile(false); menuToggle.focus(); }
  });

  /* ---------- Focus areas (tabs) ---------- */
  const focusCards = $$('[data-focus]');
  const selectFocus = (slug, scroll) => {
    const card = focusCards.find((c) => c.dataset.focus === slug);
    if (!card) return false;
    focusCards.forEach((c) => c.setAttribute('aria-selected', String(c === card)));
    $$('[data-focus-panel]').forEach((p) => { p.hidden = p.dataset.focusPanel !== slug; });
    if (scroll) {
      const panel = $('#focus-panel');
      // On small screens bring the services list into view after selecting.
      if (!desktop.matches) panel.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    return true;
  };
  focusCards.forEach((c) => c.addEventListener('click', () => selectFocus(c.dataset.focus, true)));
  // Deep link from service pages: /#focus-agriculture
  const focusFromHash = () => {
    const m = location.hash.match(/^#focus-([a-z0-9-]+)$/);
    if (m && selectFocus(m[1], false)) {
      const section = $('#focus-areas');
      section && section.scrollIntoView({ behavior: 'smooth' });
    }
  };
  focusFromHash();
  window.addEventListener('hashchange', focusFromHash);

  /* ---------- Project filter ---------- */
  $$('.filter-btn').forEach((btn) => btn.addEventListener('click', () => {
    const f = btn.dataset.filter;
    $$('.filter-btn').forEach((b) => { b.classList.toggle('is-active', b === btn); b.setAttribute('aria-pressed', String(b === btn)); });
    $$('.project-grid .project-card').forEach((card) => {
      card.classList.toggle('is-hidden', f !== 'all' && card.dataset.category !== f);
    });
  }));

  /* ---------- Reveal on scroll + counters ---------- */
  const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const animateCount = (el) => {
    const target = parseInt(el.dataset.count, 10) || 0;
    if (reduced) { el.textContent = target.toLocaleString('en-IN'); return; }
    const dur = 1600;
    const start = performance.now();
    const tick = (now) => {
      const p = Math.min((now - start) / dur, 1);
      const eased = 1 - Math.pow(1 - p, 3);
      el.textContent = Math.round(target * eased).toLocaleString('en-IN');
      if (p < 1) requestAnimationFrame(tick);
    };
    requestAnimationFrame(tick);
  };

  if ('IntersectionObserver' in window) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        entry.target.classList.add('is-visible');
        $$('[data-count]', entry.target).forEach(animateCount);
        io.unobserve(entry.target);
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
    $$('.reveal').forEach((el) => io.observe(el));
  } else {
    $$('.reveal').forEach((el) => el.classList.add('is-visible'));
    $$('[data-count]').forEach(animateCount);
  }

  /* ---------- Testimonial slider ---------- */
  $$('[data-slider]').forEach((slider) => {
    const track = $('.slider-track', slider);
    const slides = $$('.testimonial', track);
    const section = slider.closest('section');
    const prev = $('[data-slide="prev"]', section);
    const next = $('[data-slide="next"]', section);
    const dotsWrap = $('[data-dots]', section);
    let index = 0;

    const perView = () => {
      if (!slides.length) return 1;
      return Math.max(1, Math.round(slider.clientWidth / slides[0].getBoundingClientRect().width));
    };
    const maxIndex = () => Math.max(0, slides.length - perView());

    const render = () => {
      index = Math.min(index, maxIndex());
      const gap = parseFloat(getComputedStyle(track).columnGap) || 0;
      const offset = index * (slides[0].getBoundingClientRect().width + gap);
      track.style.transform = `translateX(${-offset}px)`;
      if (prev) prev.disabled = index === 0;
      if (next) next.disabled = index >= maxIndex();
      if (dotsWrap) {
        dotsWrap.innerHTML = '';
        for (let i = 0; i <= maxIndex(); i++) {
          const d = document.createElement('button');
          d.setAttribute('aria-label', `Go to testimonial ${i + 1}`);
          if (i === index) d.classList.add('is-active');
          d.addEventListener('click', () => { index = i; render(); });
          dotsWrap.appendChild(d);
        }
      }
    };
    prev && prev.addEventListener('click', () => { index = Math.max(0, index - 1); render(); });
    next && next.addEventListener('click', () => { index = Math.min(maxIndex(), index + 1); render(); });

    // Touch swipe
    let x0 = null;
    slider.addEventListener('touchstart', (e) => { x0 = e.touches[0].clientX; }, { passive: true });
    slider.addEventListener('touchend', (e) => {
      if (x0 === null) return;
      const dx = e.changedTouches[0].clientX - x0;
      if (Math.abs(dx) > 40) { index = dx < 0 ? Math.min(maxIndex(), index + 1) : Math.max(0, index - 1); render(); }
      x0 = null;
    });
    window.addEventListener('resize', render);
    render();
  });

  /* ---------- Demo forms (validated client-side; no backend in this build) ---------- */
  const emailOk = (v) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v);
  $$('[data-demo-form]').forEach((form) => {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const msg = $('.form-msg', form);
      let valid = true;
      $$('[required]', form).forEach((input) => {
        const ok = input.type === 'email' ? emailOk(input.value.trim()) : input.value.trim() !== '';
        const field = input.closest('.field');
        if (field) field.classList.toggle('has-error', !ok);
        if (!ok) valid = false;
      });
      if (!valid) {
        msg.className = 'form-msg err';
        msg.textContent = 'Please fill in the required fields with a valid email.';
        return;
      }
      msg.className = 'form-msg ok';
      msg.textContent = form.classList.contains('newsletter')
        ? 'Thank you for subscribing.'
        : "Thank you — we'll be in touch shortly.";
      form.reset();
    });
  });
})();
