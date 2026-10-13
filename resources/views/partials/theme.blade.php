{{-- Tema Dev Store: indigo, koral, dan abu kebiruan terang. Font, warna, dan kelas komponen dipakai semua layout. --}}
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,800|jetbrains-mono:500,700&display=swap" rel="stylesheet">
<style>
  :root {
    --ds-bg: #EEF0FA;
    --ds-surface: #FFFFFF;
    --ds-ink: #181B34;
    --ds-ink-soft: #262A4D;
    --ds-muted: #5C6180;
    --ds-line: #D9DCF0;
    --ds-indigo: #4338CA;
    --ds-indigo-dark: #3730A3;
    --ds-indigo-soft: #E0E2FB;
    --ds-coral: #FF6B5E;
    --ds-coral-dark: #E5493B;
    --ds-display: 'Plus Jakarta Sans', ui-sans-serif, system-ui, sans-serif;
    --ds-body: 'Plus Jakarta Sans', ui-sans-serif, system-ui, sans-serif;
    --ds-mono: 'JetBrains Mono', ui-monospace, SFMono-Regular, Menlo, monospace;
  }
  body { font-family: var(--ds-body); background: var(--ds-bg); color: var(--ds-ink); }
  h1, h2, h3, .ds-display { font-family: var(--ds-display); font-weight: 800; letter-spacing: -0.025em; }
  .ds-mono { font-family: var(--ds-mono); }
  input[type="checkbox"] { color: var(--ds-indigo); }

  .ds-card { background: var(--ds-surface); border: 1px solid var(--ds-line); border-radius: 10px; }
  .ds-muted { color: var(--ds-muted); }
  .ds-link { color: var(--ds-indigo); font-weight: 600; }
  .ds-link:hover { text-decoration: underline; }

  .ds-btn { display: inline-flex; align-items: center; justify-content: center; gap: .4rem; border-radius: 8px;
            background: var(--ds-indigo); color: #fff; padding: .55rem 1.1rem; font-size: .875rem; font-weight: 600;
            border: 0; cursor: pointer; transition: background .15s; }
  .ds-btn:hover { background: var(--ds-indigo-dark); }
  .ds-btn-quiet { background: var(--ds-surface); color: var(--ds-ink); border: 1px solid var(--ds-line); }
  .ds-btn-quiet:hover { background: var(--ds-indigo-soft); }
  .ds-btn-coral { background: var(--ds-coral); color: var(--ds-ink); }
  .ds-btn-coral:hover { background: #FF8176; }
  .ds-btn:focus-visible, a:focus-visible, button:focus-visible { outline: 3px solid var(--ds-coral); outline-offset: 2px; }

  /* Harga ditulis monospace seperti nilai di kode */
  .ds-price { display: inline-block; background: var(--ds-indigo-soft); color: var(--ds-indigo-dark); font-family: var(--ds-mono);
              font-weight: 700; padding: .25rem .6rem; border-radius: 6px; }
  .ds-sku { font-family: var(--ds-mono); font-size: .7rem; font-weight: 500; color: var(--ds-muted); }

  .ds-chip { display: inline-flex; align-items: center; border-radius: 6px; padding: .15rem .55rem;
             font-family: var(--ds-mono); font-size: .72rem; font-weight: 700; background: var(--ds-indigo-soft); color: var(--ds-indigo-dark); }
  .ds-table th { background: #E6E8F7; color: var(--ds-muted); font-weight: 600; }
  .ds-field { border: 1px solid var(--ds-line); border-radius: 8px; background: #fff; }
  .ds-field:focus { border-color: var(--ds-indigo); box-shadow: 0 0 0 3px rgba(67,56,202,.18); outline: none; }

  /* Baris perintah di atas katalog */
  .ds-term { background: var(--ds-ink); color: #D7DAF5; border-radius: 10px; padding: .85rem 1.1rem; font-family: var(--ds-mono);
             font-size: .8rem; overflow-x: auto; white-space: nowrap; }
  .ds-term b { color: var(--ds-coral); font-weight: 700; }
  .ds-term i { font-style: normal; color: #9CA3E8; }

  .ds-cat { display: flex; align-items: center; justify-content: space-between; gap: .75rem; border-radius: 8px;
            padding: .5rem .75rem; font-size: .875rem; font-weight: 500; border-left: 3px solid transparent; }
  .ds-cat:hover { background: var(--ds-surface); }
  .ds-cat[aria-current="true"] { background: var(--ds-surface); border-left-color: var(--ds-coral); font-weight: 700; }

  @media (prefers-reduced-motion: reduce) { * { transition: none !important; } }
</style>
