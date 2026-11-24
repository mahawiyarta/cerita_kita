@extends('layouts.app')

@section('title', 'Refleksi Hari Ini - CeritaKita')

@push('styles')
    @vite('resources/css/pages/journal.css')
@endpush

@section('content')

<section class="journal-page">
    <div class="journal-container">
        <header class="journal-header">
            <h1>Refleksi Hari Ini</h1>
        </header>
        <div class="journal-prompt-wrapper">
            <div class="journal-prompt">
                <span class="journal-prompt-icon">
                    <img
                        src="{{ asset('icons/journal_prompt.svg') }}"
                        alt=""
                    >
                </span>
                <div class="journal-prompt-content">
                    <h2 class="journal-prompt-title">
                        Prompt Hari Ini
                    </h2>
                    <p class="journal-prompt-text">
                        Apa satu hal kecil yang paling
                        menguras energimu hari ini?
                    </p>
                </div>
            </div>
        </div>
        <div
            class="journal-toolbar"
            role="toolbar"
            aria-label="Format teks jurnal"
        >
            <div class="journal-toolbar-actions">
                <button
                    type="button"
                    class="journal-format-button"
                    data-command="bold"
                    aria-label="Bold"
                    title="Tebalkan teks"
                >
                    <img
                        src="{{ asset('icons/bold.svg') }}"
                        alt=""
                    >
                </button>
                <button
                    type="button"
                    class="journal-format-button"
                    data-command="italic"
                    aria-label="Italic"
                    title="Miringkan teks"
                >
                    <img
                        src="{{ asset('icons/italic.svg') }}"
                        alt=""
                    >
                </button>
                <button
                    type="button"
                    class="journal-format-button"
                    data-command="insertUnorderedList"
                    aria-label="List"
                    title="Buat daftar"
                >
                    <img
                        src="{{ asset('icons/list.svg') }}"
                        alt=""
                    >
                </button>
            </div>
            <span
                id="journal-word-count"
                class="journal-word-count"
                aria-live="polite"
            >
                0 Kata
            </span>
        </div>
        <div class="journal-editor-wrapper">
            <div
                id="journal-editor"
                class="journal-editor"
                contenteditable="true"
                role="textbox"
                aria-label="Isi refleksi hari ini"
                aria-multiline="true"
                data-empty="true"
                data-placeholder="Tumpahkan seluruh isi pikiranmu di sini tanpa batas..."
            ></div>
        </div>
        <div class="journal-bottom">
            <div class="journal-tools-row">
                <div class="journal-extra-tools">
                    <button
                        type="button"
                        id="journal-emoji-button"
                        class="journal-extra-button"
                        aria-label="Tambahkan emoji"
                        aria-expanded="false"
                        aria-controls="journal-emoji-picker"
                    >
                        <img
                            src="{{ asset('icons/smile.svg') }}"
                            alt=""
                        >
                    </button>
                    <button
                        type="button"
                        id="journal-attachment-button"
                        class="journal-extra-button"
                        aria-label="Pilih gambar"
                        title="Lampiran masih dalam tahap testing"
                    >
                        <img
                            src="{{ asset('icons/add_files2.svg') }}"
                            alt=""
                        >
                    </button>
                    <input
                        type="file"
                        id="journal-file-input"
                        accept="image/png,image/jpeg,image/webp"
                        hidden
                    >
                </div>
                <p
                    id="journal-draft-status"
                    class="journal-draft-status"
                    role="status"
                >
                    Draft tersimpan otomatis
                </p>
            </div>
            <div
                id="journal-emoji-picker"
                class="journal-emoji-picker"
                aria-label="Pilihan emoji"
                hidden
            >
                <button type="button" data-emoji="😊">😊</button>
                <button type="button" data-emoji="😢">😢</button>
                <button type="button" data-emoji="🥰">🥰</button>
                <button type="button" data-emoji="😔">😔</button>
                <button type="button" data-emoji="😌">😌</button>
                <button type="button" data-emoji="❤️">❤️</button>
            </div>
            <p
                id="journal-attachment-status"
                class="journal-attachment-status"
                role="status"
            ></p>
            <div class="journal-notice">
                <img
                    src="{{ asset('icons/warning.svg') }}"
                    alt=""
                >
                <p>
                    Catatan: Ringkasan pola emosi baru
                    akan aktif secara akurat setelah
                    kamu mengisi minimal 5 entri jurnal.
                </p>
            </div>
            <a
                href="{{ route('journal-summary') }}"
                class="journal-save-button"
            >
                <span>Simpan Refleksi</span>
                <img
                    src="{{ asset('icons/arrow_next.svg') }}"
                    alt=""
                >
            </a> 
            <p
                id="journal-save-feedback"
                class="journal-save-feedback"
                role="status"
                aria-live="polite"
            ></p>
        </div>
        <nav
            class="journal-bottom-nav"
            aria-label="Navigasi utama"
        >
            <a
                href="{{ route('home') }}"
                class="journal-nav-item"
            >
                <img
                    src="{{ asset('icons/home.svg') }}"
                    alt=""
                >
                <span>Home</span>
            </a>
            <a
                href="{{ route('psikolog') }}"
                class="journal-nav-item"
            >
                <img
                    src="{{ asset('icons/psikolog.svg') }}"
                    alt=""
                >
                <span>Psikolog</span>
            </a>
            <a
                href="{{ route('chat-option') }}"
                class="journal-nav-item"
            >
                <img
                    src="{{ asset('icons/chat.svg') }}"
                    alt=""
                >
                <span>Chat</span>
            </a>
            <a
                href="{{ route('journal') }}"
                class="journal-nav-item active"
                aria-current="page"
            >
                <img
                    src="{{ asset('icons/journal.svg') }}"
                    alt=""
                >
                <span>Journal</span>
            </a>
            <a
                href="{{ route('profile') }}"
                class="journal-nav-item"
            >
                <img
                    src="{{ asset('icons/profile.svg') }}"
                    alt=""
                >
                <span>Profile</span>
            </a>
        </nav>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const editor =
        document.getElementById('journal-editor');
    const wordCount =
        document.getElementById('journal-word-count');
    const draftStatus =
        document.getElementById('journal-draft-status');
    const saveButton =
        document.getElementById('journal-save-button');
    const saveFeedback =
        document.getElementById('journal-save-feedback');
    const emojiButton =
        document.getElementById('journal-emoji-button');
    const emojiPicker =
        document.getElementById('journal-emoji-picker');
    const attachmentButton =
        document.getElementById('journal-attachment-button');
    const fileInput =
        document.getElementById('journal-file-input');
    const attachmentStatus =
        document.getElementById('journal-attachment-status');
    const DRAFT_KEY = 'ceritakita.journal.draft.v1';
    const ENTRIES_KEY = 'ceritakita.journal.entries.v1';
    let draftTimer = null;
    function sanitizeHTML(html) {
        const template = document.createElement('template');
        template.innerHTML = html;
        const allowed = new Set([
            'B', 'STRONG', 'I', 'EM',
            'UL', 'OL', 'LI', 'BR',
            'DIV', 'P'
        ]);
        const blocked = new Set([
            'SCRIPT', 'STYLE', 'IFRAME',
            'OBJECT', 'SVG', 'IMG',
            'FORM', 'INPUT'
        ]);
        function cleanNode(node) {
            if (node.nodeType === Node.TEXT_NODE) {
                return document.createTextNode(
                    node.textContent
                );
            }
            if (node.nodeType !== Node.ELEMENT_NODE) {
                return document.createDocumentFragment();
            }
            if (blocked.has(node.tagName)) {
                return document.createDocumentFragment();
            }
            const cleanElement = allowed.has(node.tagName)
                ? document.createElement(
                    node.tagName.toLowerCase()
                  )
                : document.createDocumentFragment();
            Array.from(node.childNodes).forEach(function(child) {
                cleanElement.appendChild(cleanNode(child));
            });
            return cleanElement;
        }
        const result = document.createElement('div');
        Array.from(template.content.childNodes)
            .forEach(function(node) {
                result.appendChild(cleanNode(node));
            });
        return result.innerHTML;
    }
    function getJournalText() {
        return editor.innerText
            .replace(/\u00a0/g, ' ')
            .trim();
    }
    function getWordCount() {
        const text = getJournalText();
        if (!text) {
            return 0;
        }
        return text.split(/\s+/u).filter(Boolean).length;
    }
    function updateEditor() {
        wordCount.textContent = getWordCount() + ' Kata';
        editor.dataset.empty =
            getJournalText() === '' ? 'true' : 'false';
    }
    function saveDraft() {
        try {
            const html = sanitizeHTML(editor.innerHTML);
            if (getJournalText() === '') {
                localStorage.removeItem(DRAFT_KEY);
            } else {
                localStorage.setItem(DRAFT_KEY, html);
            }
            draftStatus.textContent =
                'Draft tersimpan otomatis';
        } catch (error) {
            draftStatus.textContent =
                'Draft gagal disimpan';
        }
    }
    function queueDraftSave() {
        clearTimeout(draftTimer);
        draftStatus.textContent = 'Menyimpan draft...';
        draftTimer = setTimeout(saveDraft, 500);
    }
    try {
        const savedDraft = localStorage.getItem(DRAFT_KEY);
        if (savedDraft) {
            editor.innerHTML = sanitizeHTML(savedDraft);
            draftStatus.textContent = 'Draft dipulihkan';
        }
    } catch (error) {
        draftStatus.textContent =
            'Penyimpanan lokal tidak tersedia';
    }
    updateEditor();
    editor.addEventListener('input', function () {
        updateEditor();
        queueDraftSave();
        saveFeedback.textContent = '';
    });
    editor.addEventListener('paste', function (event) {
        event.preventDefault();
        const text = event.clipboardData
            .getData('text/plain');
        document.execCommand('insertText', false, text);
        updateEditor();
        queueDraftSave();
    });
    const formatButtons =
        document.querySelectorAll('.journal-format-button');
    formatButtons.forEach(function (button) {
        button.addEventListener('mousedown', function (event) {
            event.preventDefault();
        });
        button.addEventListener('click', function () {
            const command = button.dataset.command;
            editor.focus();
            document.execCommand(command, false, null);
            updateEditor();
            queueDraftSave();
        });
    });
    emojiButton.addEventListener('click', function () {
        const willOpen = emojiPicker.hidden;
        emojiPicker.hidden = !willOpen;
        emojiButton.setAttribute(
            'aria-expanded',
            String(willOpen)
        );
    });
    document.querySelectorAll('[data-emoji]')
        .forEach(function (button) {
            button.addEventListener('click', function () {
                editor.focus();
                document.execCommand(
                    'insertText',
                    false,
                    button.dataset.emoji
                );
                emojiPicker.hidden = true;
                emojiButton.setAttribute(
                    'aria-expanded',
                    'false'
                );
                updateEditor();
                queueDraftSave();
            });
        });
    attachmentButton.addEventListener('click', function () {
        fileInput.click();
    });
    fileInput.addEventListener('change', function () {
        const file = fileInput.files[0];
        if (!file) return;
        attachmentStatus.textContent =
            'Gambar dipilih: ' + file.name +
            ' (belum diunggah atau disimpan)';
    });
    saveButton.addEventListener('click', function () {
        const text = getJournalText();
        if (!text) {
            saveFeedback.textContent =
                'Tulis refleksimu terlebih dahulu.';
            editor.focus();
            return;
        }
        const entry = {
            id: Date.now(),
            created_at: new Date().toISOString(),
            content: sanitizeHTML(editor.innerHTML),
            text: text,
            word_count: getWordCount()
        };
        try {
            const savedEntries = JSON.parse(
                localStorage.getItem(ENTRIES_KEY) || '[]'
            );
            const entries = Array.isArray(savedEntries)
                ? savedEntries
                : [];
            entries.push(entry);
            localStorage.setItem(
                ENTRIES_KEY,
                JSON.stringify(entries.slice(-100))
            );
            clearTimeout(draftTimer);
            localStorage.removeItem(DRAFT_KEY);
            editor.innerHTML = '';
            updateEditor();
            draftStatus.textContent =
                'Draft tersimpan otomatis';
            saveFeedback.textContent =
                'Refleksi berhasil disimpan.';
        } catch (error) {
            saveFeedback.textContent =
                'Gagal menyimpan refleksi. Coba lagi.';
        }
    });
    window.addEventListener('pagehide', function () {
        clearTimeout(draftTimer);
        saveDraft();
    });
});
</script>

@endpush