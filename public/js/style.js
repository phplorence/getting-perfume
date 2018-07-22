/**
 * Created by vuongluis on 7/22/2018.
 */
$(document).ready(function () {
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('styleCreate')
        CKEDITOR.replace('styleDetailEdit')
        CKEDITOR.replace('editor1')
        CKEDITOR.replace('editor2')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
    });
});
