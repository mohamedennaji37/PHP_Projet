<?php require_once 'db.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Form with Icons</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">





    <?php
    if(isset($_POST['submit'])){

        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $website = $_POST['website'];
        $message = $_POST['message'];
        var_dump($name, $phone, $email, $website, $message);
        require_once 'db.php';
        $query = "insert into contact(name, phone, email, website, message) values(?,?,?,?,?)";
        if(!empty($name)&&!empty($phone)&&!empty($email)&&!empty($message)){
            $sqlState = $pdo->prepare($query);
            $sqlState->execute([$name, $phone, $email, $website, $message]);
        }
    }
    ?>




  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow rounded-4">
          <div class="card-body p-4">
            <h3 class="card-title mb-4 text-center">Contact Us</h3>
            <form method="POST">
              <!-- Name -->
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                  <input type="text" class="form-control" id="name" name ="name" placeholder="Your name">
                </div>
              </div>

              <!-- Phone -->
              <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                  <input type="tel" class="form-control" id="phon" name ="phone" placeholder="Your phone number">
                </div>
              </div>

              <!-- Email -->
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                  <input type="email" class="form-control" id="email" name ="email" placeholder="Your email">
                </div>
              </div>

              <!-- Website -->
              <div class="mb-3">
                <label for="website" class="form-label">Website</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-globe"></i></span>
                  <input type="url" class="form-control" id="website" name ="website" placeholder="Your website (optional)">
                </div>
              </div>

              <!-- Message -->
              <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-chat-dots-fill"></i></span>
                  <textarea class="form-control" id="message" rows="4" name ="message"placeholder="Your message"></textarea>
                </div>
              </div>

              <!-- Submit -->
              <div class="d-grid">
                <button type="submit" class="btn btn-primary rounded-pill" name ="submit">Send Message</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
