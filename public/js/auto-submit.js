document.addEventListener('livewire:load', function () {
    Livewire.on('auto-submit-form', function () {
        // Trigger submit form otomatis
        const form = document.querySelector('form');
        if (form) {
            form.submit();
        }
    });
});