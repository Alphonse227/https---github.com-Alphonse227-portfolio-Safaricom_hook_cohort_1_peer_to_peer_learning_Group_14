<section id="projects" class="py-5">
  <div class="container">
    <h2 class="text-center mb-5">Projects</h2>
    <div class="row">

      <?php
      // Database connection
      $conn = new mysqli("localhost", "root", "", "projects_db");

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // Query to fetch all projects
      $sql = "SELECT title, description, link, date_created FROM projects ORDER BY date_created DESC";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // Output each project
          while($row = $result->fetch_assoc()) {
              echo "<div class='col-md-4 mb-4'>
                      <div class='card'>
                        <div class='card-body'>
                          <h5 class='card-title'>" . $row['title'] . "</h5>
                          <p class='card-text'>" . nl2br($row['description']) . "</p>";
              if ($row['link']) {
                  echo "<a href='" . $row['link'] . "' class='btn btn-primary' target='_blank'>View Project</a>";
              }
              echo "  <p class='text-muted'>" . $row['date_created'] . "</p>
                        </div>
                      </div>
                    </div>";
          }
      } else {
          echo "<p>No projects found.</p>";
      }

      // Close connection
      $conn->close();
      ?>

    </div>
  </div>
</section>
