
    <div class="sidebar-news mt-4 p-3 rounded text-white" style="background: #313eb4 !important">
        <h4 class="mb-4 fw-semibold text-white">Komentar ({{ $berita->komentars->count() }})</h4>

        <div class="comments-section bg-light p-4 rounded text-dark"
            style="max-height: 500px; overflow-y: auto; position: relative;">
            <div id="comment-list">
                @foreach ($berita->komentars as $komentar)
                    <div class="comment mb-3">
                        <div class="d-flex align-items-start">
                            <img src="https://i.pravatar.cc/40?u={{ $komentar->public_user_id }}"
                                class="rounded-circle me-3" width="40" height="40">
                            <div>
                                <strong>{{ $komentar->user->email ?? 'Anonim' }}</strong>
                                <p class="mb-1">{{ $komentar->isi_komentar }}</p>
                                <small class="text-muted">{{ $komentar->created_at->diffForHumans() }}</small>
                                <a href="#" class="text-primary small reply-toggle" data-id="{{ $komentar->id }}"
                                    data-email="{{ $komentar->user->email ?? 'Anonim' }}">Balas</a>

                                @if ($komentar->balasan->count())
                                    <div class="replies mt-3 d-none" id="replies-{{ $komentar->id }}">
                                        @foreach ($komentar->balasan as $balasan)
                                            <div class="d-flex mb-2">
                                                <img src="https://i.pravatar.cc/40?u={{ $balasan->public_user_id }}"
                                                    class="rounded-circle me-2"
                                                    style="width: 30px; height: 30px; object-fit: cover;">
                                                <div>
                                                    <strong>{{ $balasan->user->email ?? 'Anonim' }}</strong>
                                                    <p class="mb-1">{{ $balasan->isi_komentar }}</p>
                                                    <a href="#" class="text-primary small reply-toggle"
                                                        data-id="{{ $balasan->id }}"
                                                        data-email="{{ $balasan->user->email ?? 'Anonim' }}"
                                                        data-parent="{{ $balasan->parent_id ?? $balasan->id }}">
                                                        Balas
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <a href="#" class="text-muted small toggle-replies"
                                        data-id="{{ $komentar->id }}">
                                        Lihat {{ $komentar->balasan->count() }}
                                        {{ Str::plural('reply', $komentar->balasan->count()) }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-3">
                <button id="showAllComments" class="btn btn-sm btn-secondary">Lihat Semua Komentar</button>
            </div>
        </div>

        <!-- Form Komentar -->
        @if (session()->has('public_user_id'))
            <form action="{{ route('komentar.store') }}" method="POST"
                class="comment-form mt-3 d-flex align-items-start gap-2">
                @csrf
                <input type="hidden" name="berita_id" value="{{ $berita->id }}">
                <input type="hidden" id="parent_id" name="parent_id" value="">

                <textarea id="isi_komentar" name="isi_komentar" class="form-control rounded-pill px-3 py-2"
                    placeholder="Tulis komentar di sini..." style="resize: none; flex: 1;" required></textarea>

                <button type="submit"
                    class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center fas fa-paper-plane"
                    style="width: 38px; height: 38px;">

                </button>
            </form>

            <form method="POST" action="{{ url('/logout-publik') }}" class="mt-2">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-light">Logout Komentar</button>
            </form>
        @else
            <div class="alert alert-warning mt-3 text-dark bg-light">
                Kamu harus <a href="{{ url('/login-publik') }}" class="fw-bold text-primary">login via email</a> untuk
                menulis komentar. Silahkan Login
            </div>
        @endif
    </div>




<script>
    // Toggle reply form
    document.querySelectorAll('.reply-toggle').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const id = this.dataset.id;
            document.getElementById('reply-form-' + id).classList.toggle('d-none');
        });
    });

    // Toggle reply visibility
    document.querySelectorAll('.toggle-replies').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const id = this.dataset.id;
            const box = document.getElementById('replies-' + id);
            const count = box.children.length;

            if (box.classList.contains('d-none')) {
                box.classList.remove('d-none');
                this.innerText = 'Sembunyikan Balasan';
            } else {
                box.classList.add('d-none');
                this.innerText = `View ${count} ${count > 1 ? 'replies' : 'reply'}`;
            }
        });
    });

    document.querySelectorAll('.reply-toggle').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            const komentarId = this.dataset.parent; // ambil parent ID sebenarnya
            const email = this.dataset.email;

            const textarea = document.getElementById('isi_komentar');
            const parentInput = document.getElementById('parent_id');

            textarea.value = `@${email} `;
            parentInput.value = komentarId; // tetap set ke komentar utama

            textarea.focus();

            document.querySelector('.comment-form').scrollIntoView({
                behavior: 'smooth'
            });
        });
    });


    // Show hidden comments
    document.getElementById('showAllComments').addEventListener('click', function() {
        document.querySelectorAll('.extra-comment').forEach(el => el.classList.remove('d-none'));
        this.remove(); // Hapus tombol setelah diklik
    });



    // Fungsi untuk membuat elemen komentar
    function createComment(username, text, avatarUrl = 'https://i.pravatar.cc/40') {
        const comment = document.createElement('div');
        comment.className = 'comment mb-3';
        comment.innerHTML = `
            <div class="d-flex align-items-start">
                <img src="${avatarUrl}" class="rounded-circle me-3" width="40" height="40">
                <div>
                    <strong>${username}</strong>
                    <p class="mb-1">${text}</p>
                    <a href="#" class="text-primary small reply-toggle" data-id="new">Reply</a>

                    <div class="reply-form mt-2 d-none" id="reply-form-new">
                        <textarea class="form-control mb-2" rows="2" placeholder="Balas komentar @${username}"></textarea>
                        <button class="btn btn-sm btn-primary">Kirim</button>
                    </div>
                </div>
            </div>
        `;
        return comment;
    }

    // Komentar utama
    document.querySelector('.comment-form button').addEventListener('click', function() {
        const textarea = document.getElementById('main-comment');
        const text = textarea.value.trim();
        if (!text) return;
        const comment = createComment('Anda', text);
        document.getElementById('comment-list').appendChild(comment);
        textarea.value = '';
    });

    // Reply komentar
    document.querySelectorAll('.reply-form button').forEach(btn => {
        btn.addEventListener('click', function() {
            const textarea = this.previousElementSibling;
            const replyText = textarea.value.trim();
            if (!replyText) return;

            const wrapper = this.closest('.comment');
            const repliedTo = wrapper.querySelector('strong').textContent;

            const fullReply = `@${repliedTo} ${replyText}`;
            const comment = createComment('Anda', fullReply);
            document.getElementById('comment-list').appendChild(comment);

            textarea.value = '';
            textarea.parentElement.classList.add('d-none');
        });
    });

    // Saat klik Balas
    document.querySelectorAll('.reply-toggle').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            const komentarId = this.dataset.parent;
            const email = this.dataset.email;

            const textarea = document.getElementById('isi_komentar');
            const parentInput = document.getElementById('parent_id');

            // Isi textarea dengan @email
            textarea.value = `@${email} `;
            parentInput.value = komentarId;

            textarea.focus();

            // Scroll ke form
            document.querySelector('.comment-form').scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Saat pengguna menghapus mention @email, set parent_id ke kosong
    document.getElementById('isi_komentar').addEventListener('input', function() {
        const isi = this.value.trim();
        const parentInput = document.getElementById('parent_id');

        // Jika tidak ada karakter @ di awal, reset jadi komentar utama
        if (!isi.startsWith('@')) {
            parentInput.value = '';
        }
    });
</script>
