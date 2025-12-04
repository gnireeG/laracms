import './bootstrap';

// Alpine store for component hover state in edit mode
document.addEventListener('alpine:init', () => {
    Alpine.store('componentHover', {
        hoveredId: null,
        setHovered(id) {
            this.hoveredId = id;
        },
        clearHovered(id) {
            if (this.hoveredId === id) {
                this.hoveredId = null;
            }
        },
        clear() {
            this.hoveredId = null;
        }
    });
});

// Clear hover state on any Livewire update to prevent stuck state
document.addEventListener('livewire:update', () => {
    if (Alpine.store('componentHover')) {
        Alpine.store('componentHover').clear();
    }
});

// Also clear on Livewire navigate
document.addEventListener('livewire:navigated', () => {
    if (Alpine.store('componentHover')) {
        Alpine.store('componentHover').clear();
    }
});
