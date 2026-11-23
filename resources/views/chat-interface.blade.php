@extends('layouts.app')

@section('title', 'Chat Anima - CeritaKita')

@push('styles')
    @vite('resources/css/pages/chat-interface.css')
@endpush

@section('content')

<section class="anima-page">
    <div class="anima-container">
        <header class="anima-header">
            <a
                href="{{ route('chat-option') }}"
                class="anima-back"
                aria-label="Kembali ke pilihan mode cerita"
            >
                <img
                    src="{{ asset('icons/arrow_back.svg') }}"
                    alt=""
                >
            </a>
            <div class="anima-header-info">
                <h1 class="anima-name">
                    Anima
                </h1>
                <span class="anima-online">
                    <img
                        src="{{ asset('icons/online.svg') }}"
                        alt=""
                    >
                    ONLINE
                </span>
            </div>
        </header>
        <div
            class="anima-messages"
            id="anima-messages"
            role="log"
            aria-label="Riwayat percakapan Anima"
        >
            <div class="anima-message assistant">
                <span class="anima-avatar">
                    <img
                        src="{{ asset('icons/robot.svg') }}"
                        alt=""
                    >
                </span>
                <div class="anima-bubble">
                    <p class="anima-bubble-text">Hai! Aku Anima, teman ceritamu di CeritaKita. Ada yang ingin kamu ceritakan hari ini?</p>
                </div>
            </div>
        </div>
        <div class="anima-composer">
            <form
                id="anima-chat-form"
                class="anima-chat-form"
            >
                @csrf
                <button
                    type="button"
                    class="anima-attach"
                    disabled
                    title="Fitur lampiran belum tersedia"
                    aria-label="Lampiran belum tersedia"
                >
                    <img
                        src="{{ asset('icons/add_files.svg') }}"
                        alt=""
                    >
                </button>
                <div class="anima-input-wrapper">
                    <input
                        type="text"
                        id="anima-input"
                        class="anima-input"
                        placeholder="Ketik pesanmu di sini..."
                        aria-label="Tulis pesan untuk Anima"
                        maxlength="2000"
                        autocomplete="off"
                        required
                    >
                    <button
                        type="submit"
                        id="anima-send-button"
                        class="anima-send"
                        aria-label="Kirim pesan"
                    >
                        <img
                            src="{{ asset('icons/send_chat.svg') }}"
                            alt=""
                        >
                    </button>
                </div>
            </form>
        </div>
        <p
            id="anima-feedback"
            class="anima-feedback"
            role="status"
            aria-live="polite"
        ></p>
        <nav
            class="anima-bottom-nav"
            aria-label="Navigasi utama"
        >
            <a
                href="{{ route('home') }}"
                class="anima-nav-item"
            >
                <img
                    src="{{ asset('icons/home.svg') }}"
                    alt=""
                >
                <span>Home</span>
            </a>
            <span
                class="anima-nav-item"
                aria-disabled="true"
            >
                <img
                    src="{{ asset('icons/psikolog.svg') }}"
                    alt=""
                >
                <span>Psikolog</span>
            </span>
            <a
                href="{{ route('chat-option') }}"
                class="anima-nav-item active"
                aria-current="page"
            >
                <img
                    src="{{ asset('icons/chat.svg') }}"
                    alt=""
                >
                <span>Chat</span>
            </a>
            <span
                class="anima-nav-item"
                aria-disabled="true"
            >
                <img
                    src="{{ asset('icons/journal.svg') }}"
                    alt=""
                >
                <span>Journal</span>
            </span>
            <span
                class="anima-nav-item"
                aria-disabled="true"
            >
                <img
                    src="{{ asset('icons/profile.svg') }}"
                    alt=""
                >
                <span>Profile</span>
            </span>
        </nav>
    </div>
</section>

@endsection

@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {
    const chatForm =
        document.getElementById('anima-chat-form');
    const chatInput =
        document.getElementById('anima-input');
    const messagesContainer =
        document.getElementById('anima-messages');
    const sendButton =
        document.getElementById('anima-send-button');
    const feedback =
        document.getElementById('anima-feedback');
    const robotIcon =
        "{{ asset('icons/robot.svg') }}";
    const chatEndpoint =
        "{{ route('chat.send') }}";
    let isSending = false;
    function getCurrentTime() {
        return new Intl.DateTimeFormat('id-ID', {
            hour: '2-digit',
            minute: '2-digit',
            hour12: false
        }).format(new Date());
    }
    function scrollToBottom() {
        messagesContainer.scrollTop =
            messagesContainer.scrollHeight;
    }
    function appendMessage(text, sender, typing = false) {
        const messageWrapper =
            document.createElement('div');
        messageWrapper.className =
            'anima-message ' + sender;
        if (typing) {
            messageWrapper.classList.add('is-typing');
        }
        if (sender === 'assistant') {
            const avatar =
                document.createElement('span');
            avatar.className = 'anima-avatar';
            const avatarImage =
                document.createElement('img');
            avatarImage.src = robotIcon;
            avatarImage.alt = '';
            avatar.appendChild(avatarImage);
            messageWrapper.appendChild(avatar);
        }
        const bubble =
            document.createElement('div');
        bubble.className = 'anima-bubble';
        const paragraph =
            document.createElement('p');
        paragraph.className = 'anima-bubble-text';
        paragraph.textContent = text;
        bubble.appendChild(paragraph);
        if (!typing) {
            const time =
                document.createElement('time');
            time.className = 'anima-message-time';
            time.textContent = getCurrentTime();
            bubble.appendChild(time);
        }
        messageWrapper.appendChild(bubble);
        messagesContainer.appendChild(messageWrapper);
        scrollToBottom();
        return messageWrapper;
    }
    chatForm.addEventListener('submit', async function(event) {
        event.preventDefault();
        const message = chatInput.value.trim();
        if (!message || isSending) {
            return;
        }
        isSending = true;
        sendButton.disabled = true;
        chatInput.disabled = true;
        chatInput.value = '';
        feedback.textContent = '';
        const userBubble =
            appendMessage(message, 'user');
        const typingBubble =
            appendMessage(
                'Anima sedang mengetik...',
                'assistant',
                true
            );
        try {
            const response = await fetch(chatEndpoint, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN':
                        chatForm.querySelector(
                            'input[name="_token"]'
                        ).value
                },
                body: JSON.stringify({
                    message: message
                })
            });
            const data = await response.json();
            if (!response.ok || !data.reply) {
                throw new Error(
                    data.error ||
                    data.message ||
                    'Gagal mendapatkan balasan Anima.'
                );
            }
            typingBubble.remove();
            appendMessage(data.reply, 'assistant');
        } catch (error) {
            typingBubble.remove();
            userBubble.remove();
            chatInput.value = message;
            feedback.textContent =
                error.message ||
                'Terjadi kesalahan saat menghubungi Anima.';
        } finally {
            isSending = false;
            sendButton.disabled = false;
            chatInput.disabled = false;
            chatInput.focus();
            scrollToBottom();
        }
    });
});
</script>

@endpush