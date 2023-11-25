<?php include('includes/header.php');?> 



<h1>Importar SQL</h1>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["sqlFile"])) {
        $sqlFile = $_FILES["sqlFile"];

        if ($sqlFile["error"] === 0 && $sqlFile["type"] === "application/sql") {
            // Lê o conteúdo do arquivo SQL
            $sqlContent = file_get_contents($sqlFile["tmp_name"]);

            // Conecta-se ao banco de dados e executa o script SQL
            include 'database.php';
            $conn = connectDB();

            if ($conn->multi_query($sqlContent)) {
                echo "<p>Script SQL importado com sucesso!</p>";
            } else {
                echo "<p>Erro ao importar o script SQL: " . $conn->error . "</p>";
            }

            $conn->close();
        } else {
            echo "<p>Por favor, selecione um arquivo SQL válido.</p>";
        }
    }
}
?>

<form action="importar.php" method="post" enctype="multipart/form-data">
    <label for="sqlFile">Selecione o arquivo SQL:</label><br><br>
    <input type="file" name="sqlFile" id="sqlFile" accept=".sql" required><br><br>
    <button type="submit">Importar</button>
</form>



<?php include('includes/footer.php');?> 