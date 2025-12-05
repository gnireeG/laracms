<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

<title>{{ $title ?? 'Admin' }} - {{ config('app.name', 'LaraCMS') }}</title>
@vite(['resources/css/app.css', 'resources/js/app.js', 'packages/laracms/core/resources/css/laracms.scss'])
@livewireStyles

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('nav', false);
    });
    document.addEventListener('livewire:navigate', preventUnsavedChangesLoss)

    window.addEventListener('beforeunload', preventUnsavedChangesLoss)

    function preventUnsavedChangesLoss(e) {
        const dirtyForm = document.querySelector('form.unsaved-changes')
        if (dirtyForm) {
            if (!confirm('You have unsaved changes. Are you sure you want to leave this page?')) {
                e.preventDefault()
            }
        }
    }
</script>