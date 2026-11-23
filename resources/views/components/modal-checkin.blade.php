<div
    id="checkin-modal"
    class="checkin-modal-overlay"
    hidden
>
    <div
        class="checkin-modal-card"
        role="dialog"
        aria-modal="true"
        aria-labelledby="checkin-modal-title"
        aria-describedby="checkin-modal-description"
    >
        <div class="checkin-modal-icon">
            <img
                src="{{ asset('icons/checklist.svg') }}"
                alt=""
            >
        </div>
        <h2
            id="checkin-modal-title"
            class="checkin-modal-title"
        >
            Check in Selesai
        </h2>
        <p
            id="checkin-modal-description"
            class="checkin-modal-description"
        >
            Hasil Check In kamu akan digunakan
            untuk personalisasi chatbot dan tren emosi.
        </p>
        <button
            type="button"
            id="checkin-modal-close"
            class="checkin-modal-button"
        >
            Oke, Paham
        </button>
    </div>
</div>