<!DOCTYPE html>
<html>
<head>
  <title>Email Sent Successfully</title>
  <!-- Add Bootstrap CSS link -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Add custom CSS for centering the content -->
  <style>
    body, html {
      height: 100%;
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #f5f5f5;
    }
    .container {
      max-width: 600px;
      text-align: center;
    }
    img {
      max-width: 100%;
      height: auto;
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Add your Undraw image background here -->
    <img src="https://static.vecteezy.com/system/resources/previews/000/963/033/original/cartoon-business-man-sending-messages-vector.jpg" alt="Email Sent Successfully" />

    <h2>Email Sent Successfully!</h2>
    <p>Your message has been sent.</p>
    
    <!-- Add a link or button to redirect users to another page if needed -->
    <a href="{{route('customer.index')}}" class="btn btn-primary">Back to Home</a>
  </div>

  <!-- Add Bootstrap JS and jQuery scripts at the end of the body to improve loading performance -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
