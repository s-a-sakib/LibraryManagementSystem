<?php
include '../Model/crudOperation.php';

$books = readBook();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle Add Book form
    if (isset($_POST['addBook'])) {
        $isbn = $_POST['isbn'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $stock = $_POST['stock'];
        $price = $_POST['price'];

        addBook($isbn, $title, $author, $stock, $price);
        header('Location: ../View/table.php');
        exit();
    }

    // Handle Delete Book
    if (isset($_POST['deleteBook'])) {
        $isbn = $_POST['isbn'];
        deleteBook($isbn);
        header('Location: ../View/table.php');
        exit();
    }

    // Handle Update Book
    if (isset($_POST['updateBook'])) {
        $isbn = $_POST['isbn'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $stock = $_POST['stock'];
        $price = $_POST['price'];

        updateBook($isbn, $title, $author, $stock, $price);
        header('Location: ../View/table.php');
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Add New Book</h2>
    <form method="POST" action="../View/table.php">
        <div class="form-row">
            <div class="form-group col-md-2">
                <input type="text" class="form-control" name="isbn" placeholder="ISBN" required>
            </div>
            <div class="form-group col-md-2">
                <input type="text" class="form-control" name="title" placeholder="Title" required>
            </div>
            <div class="form-group col-md-2">
                <input type="text" class="form-control" name="author" placeholder="Author" required>
            </div>
            <div class="form-group col-md-2">
                <input type="number" class="form-control" name="stock" placeholder="Stock" required>
            </div>
            <div class="form-group col-md-2">
                <input type="text" class="form-control" name="price" placeholder="Price" required>
            </div>
            <div class="form-group col-md-2">
                <button type="submit" name="addBook" class="btn btn-primary">Add Book</button>
            </div>
        </div>
    </form>

    <h2 class="mt-5">Book List</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>ISBN</th>
                <th>Title</th>
                <th>Author</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book): ?>
            <tr>
                <td><?= $book['id'] ?></td>
                <td><?= $book['isbn'] ?></td>
                <td><?= $book['title'] ?></td>
                <td><?= $book['author'] ?></td>
                <td><?= $book['stock'] ?></td>
                <td><?= $book['price'] ?></td>
                <td>
                    <form method="POST" action="" style="display:inline-block;">
                        <input type="hidden" name="isbn" value="<?= $book['isbn'] ?>">
                        <button type="submit" name="deleteBook" class="btn btn-danger btn-sm">Delete</button>
                    </form>

                    <button class="btn btn-warning btn-sm" onclick="showUpdateForm('<?= $book['isbn'] ?>', '<?= $book['title'] ?>', '<?= $book['author'] ?>', '<?= $book['stock'] ?>', '<?= $book['price'] ?>')">Update</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Update Book Modal -->
<div class="modal" tabindex="-1" role="dialog" id="updateModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="POST" action="">
          <div class="modal-header">
            <h5 class="modal-title">Update Book</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="form-group">
                  <label>ISBN</label>
                  <input type="text" class="form-control" id="updateIsbn" name="isbn" readonly>
              </div>
              <div class="form-group">
                  <label>Title</label>
                  <input type="text" class="form-control" id="updateTitle" name="title">
              </div>
              <div class="form-group">
                  <label>Author</label>
                  <input type="text" class="form-control" id="updateAuthor" name="author">
              </div>
              <div class="form-group">
                  <label>Stock</label>
                  <input type="number" class="form-control" id="updateStock" name="stock">
              </div>
              <div class="form-group">
                  <label>Price</label>
                  <input type="text" class="form-control" id="updatePrice" name="price">
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" name="updateBook" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
      </form>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
function showUpdateForm(isbn, title, author, stock, price) {
    $('#updateIsbn').val(isbn);
    $('#updateTitle').val(title);
    $('#updateAuthor').val(author);
    $('#updateStock').val(stock);
    $('#updatePrice').val(price);
    $('#updateModal').modal('show');
}
</script>

</body>
</html>
