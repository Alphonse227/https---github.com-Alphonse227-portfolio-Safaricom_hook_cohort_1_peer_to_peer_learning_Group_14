<section id="testimonials" class="py-5">
  <div class="container">
    <h2 class="text-center mb-5">What People Say</h2>
    <div class="row">

      <?php
      // Database connection
      $conn = new mysqli("localhost", "root", "", "testimonials_db");

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // Query to fetch all testimonials
      $sql = "SELECT name, message, date_created FROM testimonials ORDER BY date_created DESC";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // Output each testimonial
          while($row = $result->fetch_assoc()) {
              echo "<div class='col-md-4 mb-4'>
                      <div class='card'>
                        <div class='card-body'>
                          <h5 class='card-title'>" . $row['name'] . "</h5>
                          <p class='card-text'>" . nl2br($row['message']) . "</p>
                          <p class='text-muted'>" . $row['date_created'] . "</p>
                        </div>
                      </div>
                    </div>";
          }
      } else {
          echo "<p>No testimonials found.</p>";
      }

      // Close connection
      $conn->close();
      ?>

    </div>
  </div>
</section>
