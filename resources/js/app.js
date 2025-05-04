// Listen for the openNewTab event from Livewire
document.addEventListener('livewire:initialized', () => {
    Livewire.on('openNewTab', (data) => {
        // Open the URL in a new tab
        window.open(data.url, '_blank');
    });
});
