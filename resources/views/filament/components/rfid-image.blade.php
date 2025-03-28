<div style="display: flex; justify-content: center; align-items: center;">
    <img src="{{ asset('card.png') }}" alt="Gambar Kartu RFID" style="width: 40%;">
</div>
{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        const rfidInput = document.getElementById('rfidInput');

        if (rfidInput) {
            rfidInput.focus();

            // Pastikan tetap fokus meskipun kehilangan fokus
            setInterval(() => {
                if (document.activeElement !== rfidInput) {
                    rfidInput.focus();
                }
            }, 1000);
        }
    });
</script> --}}

<script>document.getElementById("rfidInput").focus();</script>
