<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<script>
document.addEventListener("trix-before-initialize", () => {
    Trix.config.toolbar.getDefaultHTML = () => {
        return `@include('laracms::components.trix-toolbar')`;
    }

    Trix.config.blockAttributes.heading2 = {
        tagName: "h2",
        terminal: true,
        breakOnReturn: true,
        group: false,
    };
    Trix.config.blockAttributes.heading3 = {
        tagName: "h3",
        terminal: true,
        breakOnReturn: true,
        group: false,
    };
})
</script>