<div id="modalNovela" class="modal">
    <div class="modal_container">
        <form id="crear-form" class="form-style-9" method="POST" action="/Controller/setNovela.php" enctype="multipart/form-data">
            <ul>
                <li>
                    <input id="tituloNovela" type="text" name="titulo" class="field-style field-full align-none" placeholder="Titulo" />
                </li>
                <li>
                    <input id="slugNovela" type="text" name="slug" class="field-style field-full align-none" placeholder="Slug" />
                </li>
                <li>
                    <input id="linkImageNovela" type="file" name="linkImage" class="field-style field-full align-none" placeholder="linkImage" />
                </li>
                <li>
                    <textarea id="discripcionNovela" name="descripcion" class="field-style" placeholder="Descripcion"></textarea>
                </li>
                <li>
                    <input type="submit" value="Subir novela" />
                    <a href="#general">Cerrar</a>
                </li>
            </ul>
        </form>
    </div>
</div>