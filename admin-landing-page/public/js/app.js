$(document).ready(function() {
    $('#blogForm').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: '/posts',
            type: 'POST',
            data: {
                title: $('#title').val(),
                content: $('#content').val(),
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if(response.status === 'success') {
                    let post = response.data;
                    $('#blogList').prepend(`
                        <div class="card mb-2">
                            <div class="card-body">
                                <h4>${post.title}</h4>
                                <p>${post.content}</p>
                                <small>Diposting pada: ${new Date(post.created_at).toLocaleString()}</small>
                            </div>
                        </div>
                    `);
                    // Reset form
                    $('#blogForm')[0].reset();
                }
            },
            error: function(xhr) {
                alert("Gagal menyimpan artikel. Pastikan form diisi dengan benar!");
            }
        });
    });
});

function updatePost(postId) {
    let formData = new FormData($('#blogForm')[0]);
    formData.append('_token', '{{ csrf_token() }}');
    formData.append('_method', 'PUT'); // Laravel expects PUT for update

    $.ajax({
        url: '/posts/' + postId,
        type: 'POST', // karena HTML form tidak support PUT, pakai POST + _method
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if(response.status === 'success') {
                alert("Artikel berhasil diupdate!");
                location.reload(); // Atau update tampilan dengan JavaScript
            }
        },
        error: function(xhr) {
            alert("Gagal update artikel.");
        }
    });
}

function deletePost(postId) {
    if(confirm("Yakin ingin menghapus artikel ini?")) {
        $.ajax({
            url: '/posts/' + postId,
            type: 'POST',
            data: {
                _method: 'DELETE',
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if(response.status === 'success') {
                    alert(response.message);
                    location.reload(); // Atau remove elemen HTML-nya langsung
                }
            },
            error: function() {
                alert("Gagal menghapus artikel.");
            }
        });
    }
}

