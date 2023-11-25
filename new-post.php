<?php include('includes/header.php');?>


        <div class="col-md-4 mx-auto my-4">
            <div class="card bg-light p-3">
                <h2 class="text-primary">Nova Postagem</h2>
                <form action="post.php" method="post">
                    <div class="mb-3">
                        <label for="title" class="form-label">Título:</label>
                        <input type="text" id="title" name="title" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Conteúdo:</label>
                        <textarea id="content" name="content" class="form-control" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Publicar</button>
                </form>
            </div>
        </div>


<?php include('includes/footer.php');?>