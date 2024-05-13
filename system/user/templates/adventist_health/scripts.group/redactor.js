RedactorX('#field_id_27', {
    toolbar: {
        "hide": ['add', 'deleted']
    },
    plugins: [
        'alignment',
        'blockcode',
        'rte_definedlinks',
        'pages',
        'filebrowser',
        'imageposition',
        'imageresize',
        'removeformat',
        'selector',
        'inlineformat',
        'counter'
    ],
    addbar: false,
    context: true,
    buttons: {
        topbar: ['undo', 'redo', 'shortcut'],
        context: ['format', 'bold', 'italic', 'link']
    },
    format: ['p', 'h2', 'h3', 'h4', 'h5', 'h6', 'ul', 'ol']
});