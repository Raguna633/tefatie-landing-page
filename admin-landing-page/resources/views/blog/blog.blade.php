@push('scripts')
@endpush
<meta name="csrf-token" content="{{ csrf_token() }}">

<x-app-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            {{-- <a href="{{ route('crud.tambah') }}" class="btn btn-primary">Tambah Blog</a> --}}
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="header-title">
                                            <h4 class="card-title">Tambah Blog</h4>
                                        </div>
                                    </div>
                                    <div class="card-body px-0">
                                        <div class="table-responsive">
                                            <div class="row m-2">
                                                <div class="container mt-4">
                                                    <form id="post-form" method="POST"
                                                        action="{{ route('posts.store') }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="title" class="form-label">Title</label>
                                                            <input type="text" class="form-control" name="title"
                                                                id="title" placeholder="Title" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="content" class="form-label">Content</label>
                                                            <textarea class="form-control" name="content" id="content" rows="4" placeholder="Content" required></textarea>
                                                        </div>
                                                        <img id="previewImage" src="" alt="Gambar Lama"
                                                            style="max-width: 200px; display:none;">
                                                        <div class="mb-3">
                                                            <label for="image" class="form-label">Image</label>
                                                            <input type="file" class="form-control" name="image"
                                                                id="image" required>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Tambah
                                                            Post</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive mt-4">
                            <table id="user-list-table" class="table table-striped" role="grid">
                                <thead>
                                    <tr class="ligth">
                                        <th>Gambar Artikel</th>
                                        <th>Judul Artikel</th>
                                        <th>Isi Artikel</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="postTableBody">
                                    <!-- Data akan diisi oleh JavaScript -->
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    $(document).ready(function() {
        let editingPostId = null;

        loadPosts();

        // Tambah / Update Post
        $('#post-form').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            let url = '/posts';
            let type = 'POST';

            if (editingPostId) {
                formData.append('_method', 'PUT');
                url = `/posts/${editingPostId}`;
                type = 'POST'; // Laravel butuh _method=PUT untuk update
            }

            $.ajax({
                url: url,
                type: type,
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        if (editingPostId) {
                            updatePostRow(response.post);
                            editingPostId = null;
                            $('#post-form button[type="submit"]').text('Tambah Post');
                        } else {
                            appendPost(response.post);
                            // Simpan flag bahwa data berhasil ditambahkan
                            sessionStorage.setItem('postAdded', 'true');
                        }
                        $('#post-form')[0].reset();
                    }
                }

                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });


        // Load semua data
        function loadPosts() {
            $.ajax({
                url: '/posts',
                type: 'GET',
                success: function(response) {
                    $('#postTableBody').empty();
                    response.forEach(function(post) {
                        appendPost(post);
                    });


                },
                error: function(xhr, status, error) {
                    alert('Gagal memuat artikel.');
                    console.error(error);
                }
            });
        }

        // Tambahkan ke tabel
        function appendPost(post) {
            var postRow = `
    <tr id="post-${post.id}">
        <td><img src="/storage/${post.image}" alt="Gambar Artikel" class="img-fluid" style="max-width: 100px;"></td>
        <td>${post.title}</td>
        <td>${post.content}</td>
        <td>${new Date(post.created_at).toISOString().slice(0, 10)}</td>

        <td>
            <div class="flex align-items-center list-user-action">
                <a href="#" class="btn btn-sm btn-icon btn-warning edit-post" data-id="${post.id}" data-title="${post.title}" data-content="${post.content}" data-image="${post.image}">
                    <span class="btn-inner">
                                       <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                          <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                          <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                       </svg>
                                    </span>
                </a>
                <a href="#" class="btn btn-sm btn-icon btn-danger delete-post" data-id="${post.id}">
                    <span class="btn-inner">
                                       <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                          <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                          <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                          <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                       </svg>
                                    </span>
                </a>
            </div>
        </td>
    </tr>
`;
            $('#postTableBody').prepend(postRow);


        }



        // Tampilkan alert jika ada flag postAdded
if (sessionStorage.getItem('postAdded') === 'true') {
    alert('Data berhasil ditambahkan');
    sessionStorage.removeItem('postAdded'); // hapus agar tidak muncul lagi saat reload berikutnya
}

    });


    // Update baris yang sudah ada
    function updatePostRow(post) {
        const updatedRow = `
            <tr id="post-${post.id}">
                <td><img src="/storage/${post.image}" alt="Gambar Artikel" class="img-fluid" style="max-width: 100px;"></td>
                <td>${post.title}</td>
                <td>${post.content}</td>
                <td>${new Date(post.created_at).toISOString().slice(0, 10)}</td>

                <td>
                    <div class="flex align-items-center list-user-action">
                        <a href="#" class="btn btn-sm btn-icon btn-warning edit-post" data-id="${post.id}" data-title="${post.title}" data-content="${post.content}">
                           <span class="btn-inner">
                                       <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                          <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                          <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                       </svg>
                                    </span>
                        </a>
                        <a href="#" class="btn btn-sm btn-icon btn-danger delete-post" data-id="${post.id}">
                            <span class="btn-inner">
                                       <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                          <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                          <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                          <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                       </svg>
                                    </span>
                        </a>
                    </div>
                </td>
            </tr>
        `;
        $(`#post-${post.id}`).replaceWith(updatedRow);
    }

    // Tombol Edit
    $(document).on('click', '.edit-post', function(e) {
        e.preventDefault();
        const id = $(this).data('id');
        const title = $(this).data('title');
        const content = $(this).data('content');
        const image = $(this).data('image'); // Ambil data gambar lama jika ada

        $('#title').val(title);
        $('#content').val(content);

        // Menampilkan gambar lama jika ada
        if (image) {
            $('#previewImage').attr('src', '/storage/' + image).show();
        } else {
            $('#previewImage').hide();
        }

        editingPostId = id;
        $('#post-form button[type="submit"]').text('Update Post');
    });


    // Tombol Delete
    $(document).on('click', '.delete-post', function(e) {
        e.preventDefault();
        const id = $(this).data('id');

        if (confirm('Yakin ingin menghapus artikel ini?')) {
            $.ajax({
                url: `/posts/${id}`,
                type: 'POST',
                data: {
                    _method: 'DELETE',
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        $(`#post-${id}`).remove();
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });
</script>
