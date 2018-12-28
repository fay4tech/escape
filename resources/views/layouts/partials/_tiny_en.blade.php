{{-- Tiny Textarea edit --}}

<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=8pxck77ed9f9ofgo0nbguu9a9sda42ur3g00lcbzvf3uvmxw"></script>
<script>tinymce.init({
        selector: 'textarea',
        // language_url : '/langs/fr_FR.js',
        // language: "en_US",
        theme: 'modern',
        mobile: {
            theme: 'mobile'
        },
        fontsize_formats: "8pt 10pt 12pt 14pt 18pt 20pt 24pt 36pt",
        external_plugins: {
            spoiler: 'https://serial-escapers.com/spoiler/plugin.js'
        },
        plugins: 'print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
        toolbar1: 'sizeselect fontselect |  fontsizeselect formatselect | bold italic strikethrough forecolor backcolor | link image media| alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | spoiler-add spoiler-remove | removeformat',
        image_advtab: true,

        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
        ]
    });</script>

{{-- End Tiny Textarea edit --}}