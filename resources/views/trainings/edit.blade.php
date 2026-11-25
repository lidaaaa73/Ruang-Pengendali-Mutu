<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kegiatan Pelatihan | Ruang Pengendalian Mutu Bapelkes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/bapelkes-theme.css') }}" rel="stylesheet">

    <style>
        .form-section-title {
            margin: 0 0 14px;
            padding-bottom: 8px;
            border-bottom: 1px solid var(--border);
            color: var(--purple-dark);
            font-size: 13.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .input-group-text {
            border-color: var(--border-strong);
            background: var(--surface-subtle);
            color: var(--purple-dark);
            font-size: 13px;
            font-weight: 600;
        }

        .form-footer-actions {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 22px;
            padding-top: 18px;
            border-top: 1px solid var(--border);
        }

        @media (max-width: 575.98px) {
            .form-footer-actions {
                flex-direction: column-reverse;
            }

            .form-footer-actions > * {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    @include('layouts.sidebar', [
        'active' => 'trainings'
    ])

    <div class="app-shell">

        @include('layouts.topbar', [
            'breadcrumbs' => [
                ['label' => 'Dashboard', 'url' => route('dashboard')],
                ['label' => 'Data Kegiatan Pelatihan', 'url' => route('trainings.index')],
                ['label' => 'Edit Kegiatan']
            ]
        ])

        <main class="app-page">

            <div class="app-page-header">
                <div>
                    <div class="app-eyebrow">
                        <i class="bi bi-pencil-square"></i>
                        Pembaruan Data Kegiatan
                    </div>
                    <h1 class="app-page-title">Edit Kegiatan Pelatihan</h1>
                    <p class="app-page-subtitle">
                        Perbarui informasi kegiatan pelatihan yang telah terdaftar dalam sistem.
                    </p>
                </div>

                <a href="{{ route('trainings.index') }}" class="app-btn app-btn-outline">
                    <i class="bi bi-arrow-left"></i>
                    Kembali ke Daftar
                </a>
            </div>

            @if ($errors->any())
                <div class="alert app-alert app-alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-circle-fill mt-1"></i>
                    <div>
                        <strong>Data kegiatan belum dapat diperbarui.</strong>
                        <ul class="mb-0 mt-1 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
            @endif

            <form action="{{ route('trainings.update', $training) }}" method="POST">
                @csrf
                @method('PUT')

                <section class="app-card mb-0">
                    <div class="app-card-header">
                        <div class="app-card-header-left">
                            <span class="app-icon-box">
                                <i class="bi bi-pencil-square"></i>
                            </span>
                            <div>
                                <h5 class="app-card-title">Informasi Kegiatan Pelatihan</h5>
                                <p class="app-card-subtitle">Pastikan seluruh data yang diperbarui telah sesuai.</p>
                            </div>
                        </div>
                    </div>

                    <div class="app-card-body">
                        <h6 class="form-section-title">Identitas &amp; Jadwal Kegiatan</h6>

                        <div class="row g-3 mb-4">
                            <div class="col-12">
                                <label for="training_name" class="app-form-label">
                                    Nama Pelatihan <span class="app-required">*</span>
                                </label>
                                <input
                                    type="text"
                                    id="training_name"
                                    name="training_name"
                                    class="form-control @error('training_name') is-invalid @enderror"
                                    value="{{ old('training_name', $training->training_name) }}"
                                    maxlength="255"
                                    required
                                >
                                @error('training_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="start_date" class="app-form-label">
                                    Tanggal Mulai <span class="app-required">*</span>
                                </label>
                                <input
                                    type="date"
                                    id="start_date"
                                    name="start_date"
                                    class="form-control @error('start_date') is-invalid @enderror"
                                    value="{{ old('start_date', $training->start_date?->format('Y-m-d')) }}"
                                    required
                                >
                                @error('start_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="end_date" class="app-form-label">Tanggal Selesai</label>
                                <input
                                    type="date"
                                    id="end_date"
                                    name="end_date"
                                    class="form-control @error('end_date') is-invalid @enderror"
                                    value="{{ old('end_date', $training->end_date?->format('Y-m-d')) }}"
                                >
                                @error('end_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="organizer" class="app-form-label">
                                    Penyelenggara <span class="app-required">*</span>
                                </label>
                                <input
                                    type="text"
                                    id="organizer"
                                    name="organizer"
                                    class="form-control @error('organizer') is-invalid @enderror"
                                    value="{{ old('organizer', $training->organizer) }}"
                                    maxlength="255"
                                    required
                                >
                                @error('organizer')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="venue" class="app-form-label">
                                    Tempat Pelaksanaan <span class="app-required">*</span>
                                </label>
                                <input
                                    type="text"
                                    id="venue"
                                    name="venue"
                                    class="form-control @error('venue') is-invalid @enderror"
                                    value="{{ old('venue', $training->venue) }}"
                                    maxlength="255"
                                    required
                                >
                                @error('venue')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <h6 class="form-section-title">Peserta, Anggaran &amp; Catatan</h6>

                        <div class="row g-3 mb-4">
                            <div class="col-12 col-md-4">
                                <label for="participant_count" class="app-form-label">
                                    Jumlah Peserta <span class="app-required">*</span>
                                </label>
                                <div class="input-group">
                                    <input
                                        type="number"
                                        id="participant_count"
                                        name="participant_count"
                                        class="form-control @error('participant_count') is-invalid @enderror"
                                        value="{{ old('participant_count', $training->participant_count) }}"
                                        min="0"
                                        required
                                    >
                                    <span class="input-group-text">Orang</span>
                                </div>
                                @error('participant_count')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-4">
                                <label for="funding_source" class="app-form-label">Sumber Dana</label>
                                <input
                                    type="text"
                                    id="funding_source"
                                    name="funding_source"
                                    class="form-control @error('funding_source') is-invalid @enderror"
                                    value="{{ old('funding_source', $training->funding_source) }}"
                                    maxlength="255"
                                >
                                @error('funding_source')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-4">
                                <label for="budget_year" class="app-form-label">Tahun Anggaran</label>
                                <select
                                    id="budget_year"
                                    name="budget_year"
                                    class="form-select @error('budget_year') is-invalid @enderror"
                                >
                                    <option value="">Pilih tahun anggaran</option>
                                    @for ($year = (int) date('Y') - 2; $year <= (int) date('Y') + 3; $year++)
                                        <option value="{{ $year }}" {{ (string) old('budget_year', $training->budget_year) === (string) $year ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endfor
                                </select>
                                @error('budget_year')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="event_notes" class="app-form-label">Catatan Kegiatan</label>
                                <textarea
                                    id="event_notes"
                                    name="event_notes"
                                    class="form-control @error('event_notes') is-invalid @enderror"
                                    rows="4"
                                >{{ old('event_notes', $training->event_notes) }}</textarea>
                                @error('event_notes')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-footer-actions">
                            <a href="{{ route('trainings.index') }}" class="app-btn app-btn-outline">
                                <i class="bi bi-x-lg"></i>
                                Batal
                            </a>

                            <button type="submit" class="app-btn app-btn-primary">
                                <i class="bi bi-save"></i>
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </section>
            </form>

        </main>

        <footer class="app-footer">
            © {{ date('Y') }} Ruang Pengendalian Mutu Bapelkes · Sistem Informasi Internal
        </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const startDate = document.getElementById('start_date');
        const endDate = document.getElementById('end_date');

        startDate.addEventListener('change', function () {
            endDate.min = this.value;
            if (endDate.value && endDate.value < this.value) {
                endDate.value = '';
            }
        });

        if (startDate.value) {
            endDate.min = startDate.value;
        }
    </script>

</body>
</html>
