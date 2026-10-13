{{-- Pesan flash sukses / gagal. Dipakai di semua halaman. --}}
@if (session('success'))
  <div role="alert" class="mb-6 rounded-lg border px-4 py-3 text-sm font-medium" style="border-color: #A9B0F0; background: var(--ds-indigo-soft); color: var(--ds-indigo-dark)">
    {{ session('success') }}
  </div>
@endif
@if (session('error'))
  <div role="alert" class="mb-6 rounded-lg border border-red-300 bg-red-50 px-4 py-3 text-sm font-medium text-red-800">
    {{ session('error') }}
  </div>
@endif
