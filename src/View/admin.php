<form method="post">
    <input type="text" class="button" name="title" placeholder="标题"/>
    <br/>
    <textarea name="editor" id="editor"></textarea>
    <input type="hidden" name="html" id="html"/>
    是否是草稿：<input type="checkbox" name="isDraft" id="isDraft"/>
    <br/>
    <br/>
    <button id="submit">提交</button>
</form>

<script>
    var simplemde = new SimpleMDE({element: $('#editor')[0]});
    $('#submit').click(function () {
        $('#editor').val(simplemde.value());
        $('#html').val(simplemde.options.previewRender(simplemde.value()));
    });
</script>