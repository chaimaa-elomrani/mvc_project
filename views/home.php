<?php
include("controllers/affichage.php");
// include("controllers/ajouter.php");
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    include('C:\laragon\www\MVC\config\connexion.php');

    $sql = "DELETE FROM products WHERE id =?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "Record deleted successfully";
        header("Location: index.php");
        exit;
    } else {
        echo "Error deleting record: ". $conn->error;
    }
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des Produits</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./assets/style.css">

</head>

<body>
  <header>
    <h1>Gestion des Produits</h1>
  </header>

  <main>
    <!-- Barre d'outils -->
    <div class="toolbar">
      <button id="addbtn">Ajouter un produit</button>
    </div>

    <!-- Table des produits -->
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Prix</th>
          <th>Description</th>
          <th>Option</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($products as $row) {
          ?>
          <tr>
            <td><?= htmlspecialchars($row['id']); ?></td>
            <td><?= htmlspecialchars($row['nom']); ?></td>
            <td><?= htmlspecialchars($row['prix']); ?></td>
            <td><?= htmlspecialchars($row['description']); ?></td>
            <td>
              <form action="" method="post">
                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                <button type="submit" name="delete">Supprimer</button>
              </form>
            </td>
          </tr>

          <?php
        }
        ?>

      </tbody>
    </table>

    <div class="form-container" id="form-container">
      <h2>Ajouter un Produit</h2>
      <form action="index.php?action=ajouter" method="POST">

        <div class="form-group">
          <label for="product-name">Nom du Produit</label>
          <input type="text" id="product-name" name="product-name" placeholder="Entrez le nom du produit" required>
        </div>

        <div class="form-group">
          <label for="product-price">Prix (€)</label>
          <input type="number" id="product-price" name="product-price" placeholder="Entrez le prix du produit" required>
        </div>

        <div class="form-group">
          <label for="product-description">Description</label>
          <textarea id="product-description" name="product-description" placeholder="Entrez une description"
            required></textarea>
        </div>

        <div class="form-actions">
          <button type="submit">Ajouter</button>
          <button type="button" class="cancel-btn" id="cancel-btn">Annuler</button>
        </div>
      </form>
    </div>

  </main>



  <script src="assets/main.js"></script>
</body>

</html>