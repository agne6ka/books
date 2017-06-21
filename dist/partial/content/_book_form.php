<section class="new-book-section">
    <div class="col-md-6 col-xs-12">
        <div class="new-book-section_info">
            <h3>Add new book to book list</h3>
        </div>
        <div class="new-book-section_form">
            <form id="form" action="partial/modules/add_book.php" method="post">
                <div class="form-group">
                    <label for="photo">Zdjęcie</label>
                    <input type="file" id="photo" name="photo">
                </div>
                <div class="form-group">
                    <label for="title">Tytuł</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="author">Autor</label>
                    <input type="text" class="form-control" id="author" name="author">
                </div>
                <div class="form-group">
                    <label for="page">Ilość stron</label>
                    <input type="text" class="form-control" id="page" name="page">
                </div>
                <div class="radio">
                    <label for="type"><input type="radio" id="backend" name="type"> Backend</label>
                    <label for="type"><input type="radio" id="frontend" name="type"> Front-end</label>
                    <label for="type"><input type="radio" id="practice" name="type"> Good practise</label>
                    <label for="type"><input type="radio" id="architecture" name="type"> Architecture</label>
                </div>
                <div class="form-group">
                    <label for="desc">Opis</label>
                    <textarea type="text" class="form-control" id="desc" name="desc"></textarea>
                </div>
                <button class="btn btn-success" type="submit">ADD NEW</button>
            </form>
        </div>
    </div>
</section>