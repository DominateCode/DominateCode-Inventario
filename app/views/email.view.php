<?php Themes::getThemeHeader(); ?>
<main class="ms-sm-auto px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">To:</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputtitle" class="form-label">Title:</label>
                <input type="text" class="form-control" id="exampleInputtitle">
            </div>
            <div class="mb-3">
            <label for="exaplemesaje" class="form-label">Mensaje:</label>
            <textarea id="exaplemesaje" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</main>
<?php Themes::getThemeFooter(); ?>