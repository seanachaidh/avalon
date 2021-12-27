<form method="POST">
    @csrf
    <div class="editor-container">
        <div class="editor-buttonbar">
            <div class="editor-menu">
                <button type="button" onclick="insertheading()" class="btn"><span class="fas fa-heading"></span></button>
                <button type="button" onclick="insertitalic()" class="btn"><span class="fas fa-italic"></span></button>
                <button class="btn"><span class="fas fa-images"></span></button>
            </div>
        </div>

        <div class="editor-editor">
            <label>Tekst van blog</label>
            <textarea name="contents" id="editor" class="form-control"></textarea>
        </div>
        <!-- TODO: zoek hier een betere plek voor -->
        <div class="editor-synopis">
            <label>Overview van blog</label>
            <textarea name="synopsis" class="form-control"></textarea>
        </div>
        <div class="editor-actionbar">
            <div class="row">
                <div class="col-md">
                    <button class="form-control btn btn-primary">
                        Bewaren
                    </button>                
                </div>

                <div class="col-md">
                    <button type="button" class="form-control btn btn-danger">
                        Alles wissen
                    </button>         
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    let editor = document.getElementById('editor');
    function insertheading(val) {
        editor.innerHTML += "hello world";
    }
    function insertitalic() {

    }

    function setEditorCursor(position)  {
        editor.selectionEnd = position;
    }

    function eraseAll() {
        editor.innerHTML = '';
    }

</script>