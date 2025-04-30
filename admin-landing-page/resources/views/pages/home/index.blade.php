<x-app-layout :assets="$assets ?? []">
    <div class="container py-4 mt-5">
        <h1 class="mb-4">Manage Home Page Sections</h1>

        <!-- Nav Tabs -->
        <ul class="nav nav-tabs" id="homeSectionsTab" role="tablist">
            @foreach (['hero', 'mitra', 'about', 'stats', 'services', 'features', 'team'] as $section)
                <li class="nav-item" role="presentation">
                    <button class="nav-link @if ($loop->first) active @endif" id="tab-{{ $section }}"
                        data-bs-toggle="tab" data-bs-target="#pane-{{ $section }}" type="button"
                        role="tab">{{ ucfirst($section) }}</button>
                </li>
            @endforeach
        </ul>

        <!-- Tab Content -->
        <div class="tab-content mt-3" id="homeSectionsTabContent">
            @foreach (['hero', 'mitra', 'about', 'stats', 'services', 'features', 'team'] as $section)
                <div class="tab-pane fade @if ($loop->first) show active @endif"
                    id="pane-{{ $section }}" role="tabpanel">
                    <div class="d-flex justify-content-end mb-2">
                        <button class="btn btn-primary btn-add" data-section="{{ $section }}">
                            Add / Edit {{ ucfirst($section) }}
                        </button>
                    </div>
                    <table class="table table-bordered" id="table-{{ $section }}">
                        <thead>
                            <tr>
                                @switch($section)
                                    @case('hero')
                                        <th>ID</th>
                                        <th>Heading</th>
                                        <th>Subheading</th>
                                        <th>Background</th>
                                    @break

                                    @case('mitra')
                                        <th>ID</th>
                                        <th>Logo</th>
                                        <th>Order</th>
                                    @break

                                    @case('about')
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Icon</th>
                                        <th>Description</th>
                                    @break

                                    @case('stats')
                                        <th>ID</th>
                                        <th>Count</th>
                                        <th>Label</th>
                                    @break

                                    @case('services')
                                        <th>ID</th>
                                        <th>Icon</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                    @break

                                    @case('features')
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Button Text</th>
                                    @break

                                    @case('team')
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Photo</th>
                                    @break
                                @endswitch
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal Form -->
    <div class="modal fade" id="sectionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="sectionForm" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="sectionModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body" id="sectionFormBody">
                        <!-- di sini kita injek partial fields -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <x-slot name="scripts">
        <script>
            $(function() {
                const sections = ['hero', 'mitra', 'about', 'stats', 'services', 'features', 'team'];

                // List
                function loadTable(sec) {
                    $.get(`/admin/api/${sec}`, res => {
                        const items = res.data || [];
                        const $tbody = $(`#table-${sec} tbody`).empty();

                        items.forEach(item => {
                            let row = '<tr>';
                            switch (sec) {
                                case 'hero':
                                    row += `
                                            <td>${item.id}</td>
                                            <td>${item.heading}</td>
                                            <td>${item.subheading}</td>
                                            <td>
                                            <img src="/storage/${item.background}" height="40"/>
                                            </td>`;
                                    break;

                                case 'mitra':
                                    row += `
                                            <td>${item.id}</td>
                                            <td><img src="/storage/${item.logo}" height="40"/></td>
                                            <td>${item.order}</td>`;
                                    break;

                                case 'about':
                                    row += `
                                            <td>${item.id}</td>
                                            <td>${item.title}</td>
                                            <td><i class="bi ${item.icon}"></i></td>
                                            <td>${item.description.substring(0,50)}…</td>`;
                                    break;

                                case 'stats':
                                    row += `
                                            <td>${item.id}</td>
                                            <td>${item.count}</td>
                                            <td>${item.label}</td>`;
                                    break;

                                case 'services':
                                    row += `
                                            <td>${item.id}</td>
                                            <td><i class="bi ${item.icon}"></i></td>
                                            <td>${item.title}</td>
                                            <td>${item.description.substring(0,50)}…</td>`;
                                    break;

                                case 'features':
                                    row += `
                                            <td>${item.id}</td>
                                            <td>${item.title}</td>
                                            <td>${item.description.substring(0,50)}…</td>
                                            <td>${item.button_text}</td>`;
                                    break;

                                case 'team':
                                    row += `
                                            <td>${item.id}</td>
                                            <td>${item.name}</td>
                                            <td>${item.position}</td>
                                            <td><img src="/storage/${item.photo}" height="40"/></td>`;
                                    break;
                            }

                            // tombol aksi
                            row += `
                                            <td>
                                            <button class="btn btn-sm btn-warning btn-edit"
                                                    data-section="${sec}" data-id="${item.id}">
                                                Edit
                                            </button>
                                            <button class="btn btn-sm btn-danger btn-delete"
                                                    data-section="${sec}" data-id="${item.id}">
                                                Delete
                                            </button>
                                            </td>
                                                </tr>`;
                            $tbody.append(row);
                        });
                    }).fail(xhr => {
                        console.error(`Failed loading /admin/api/${sec}`, xhr);
                    });
                }
                sections.forEach(loadTable);

                // ADD
                $('body').on('click', '.btn-add', function() {
                    const sec = $(this).data('section');
                    $('#sectionModalLabel').text(`Add ${sec}`);
                    $('#sectionForm').data('section', sec).data('id', null);

                    // injek partial fields
                    $.get(`/admin/section/${sec}/create`, function(html) {
                        $('#sectionFormBody').html(html);
                        $('#sectionForm')[0].reset(); // bersihkan form
                        new bootstrap.Modal('#sectionModal').show();
                    });
                });

                // EDIT
                $('body').on('click', '.btn-edit', function() {
                    const sec = $(this).data('section'),
                        id = $(this).data('id');
                    $('#sectionModalLabel').text(`Edit ${sec}`);
                    $('#sectionForm').data('section', sec).data('id', id);

                    $.get(`/admin/section/${sec}/${id}/edit`, function(html) {
                        $('#sectionFormBody').html(html);
                        new bootstrap.Modal('#sectionModal').show();
                    });
                });

                // SUBMIT (ADD & EDIT)
                $('#sectionForm').off('submit').on('submit', function(e) {
                    e.preventDefault();
                    const sec = $(this).data('section'),
                        id = $(this).data('id') || null,
                        url = id ? `/admin/section/${sec}/${id}` : `/admin/section/${sec}`,
                        fd = new FormData(this);

                    $.ajax({
                            url,
                            type: 'POST',
                            data: fd,
                            contentType: false,
                            processData: false,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        })
                        .done(res => {
                            $('#sectionModal').modal('hide');
                            loadTable(sec); // ← reload tabelnya DI SINI
                        })
                        .fail(err => console.error(err));
                });

                // Delete
                $('body').on('click', '.btn-delete', function() {
                    if (!confirm('Yakin hapus?')) return;
                    const sec = $(this).data('section'),
                        id = $(this).data('id');
                    $.ajax({
                            url: `/admin/api/${sec}/${id}`,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        })
                        .done(() => loadTable(sec))
                        .fail(xhr => console.error(xhr));
                });


                // INITIAL LOAD
                sections.forEach(loadTable);
            });
        </script>
    </x-slot>
</x-app-layout>
