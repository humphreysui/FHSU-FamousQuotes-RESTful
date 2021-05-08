<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="view/css/styles.css">
  <title>Famous Quotes / INF653 Final Project</title>
</head>
<body>
  
  <section class="menu-section">
    <form action="." method="get" id="authcat_selection">

      <section id="dropmenus" class="input-field dropmenus">

        <?php if ($authors) { ?>
        <select class="authDropdown" name="authorId">
          <option value="0">View All Authors</option>
          <?php foreach ($authors as $author) : ?>
            <?php if ($author['id'] == $authorId) { ?>
          <option value="<?= $author['id']; ?>" selected>
            <?php } else { ?>
          <option value="<?= $author['id']; ?>">
            <?php } ?>                    
            <?= $author['author']; ?>
          </option>
          <?php endforeach; ?>
        </select>
        <?php } ?>

        <?php if ($categories) { ?>
        <select name="categoryId">
          <option value="0">View All Categories</option>
          <?php foreach ($categories as $category) : ?>
            <?php if ($category['id'] == $categoryId) { ?>
          <option value="<?= $category['id']; ?>" selected>
            <?php } else { ?>
          <option value="<?= $category['id']; ?>">
            <?php } ?>                    
            <?= $category['category']; ?>
          </option>
          <?php endforeach; ?>
        </select>
        <?php } ?>

      </section>
      <section id="buttons" class="buttons">
        <div>
          <input class="submitBtn" type="submit" value="Submit">
          <!-- #TODO: reset button -->
          <input class="resetBtn" id="resetVehicleListForm" type="reset">
        </div>
      </section>

    </form>
  </section>
  
  <section class="quote-table">
    <?php if($quotes) { ?>
    <div>
      <table>

        <thead>
          <tr>
            <th>Quote</th>
            <th>Author</th>
            <th>Category</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($quotes as $quote) : ?>
          <tr>
            <?php if ($quote['quote']) { ?>
            <td><?= $quote['author']; ?></td>
            <td><?= $quote['category']; ?></td>
            <td><?= $quote['quote']; ?></td>
            
            <?php } else { ?>
            <td>None</td>
            <td>None</td>
            <td>None</td>
            <?php } ?>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <?php } else { ?>
    <p>no quotes yet.</p>
    <?php } ?>
  </section>

</body>
</html>