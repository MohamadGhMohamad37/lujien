$(document).ready(function () {
    const editors = ["desc_en", "desc_ar", "desc_es", "desc_fr", "desc_de", "desc_zh", "desc_nl", "desc_tr"];

    editors.forEach(id => {
        if ($("#" + id).length > 0) {
            tinymce.init({
                selector: "textarea#" + id,
                height: 300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | " +
                    "bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
                style_formats: [
                    { title: "Bold text", inline: "b" },
                    { title: "Red text", inline: "span", styles: { color: "#ff0000" } },
                    { title: "Red header", block: "h1", styles: { color: "#ff0000" } },
                    { title: "Example 1", inline: "span", classes: "example1" },
                    { title: "Example 2", inline: "span", classes: "example2" },
                    { title: "Table styles" },
                    { title: "Table row 1", selector: "tr", classes: "tablerow1" }
                ]
            });
        }
    });

    // CKEditor initialization
    if ($("#editor1").length > 0) {
        CKEDITOR.replace("editor1", { height: "200px" });
    }
});
