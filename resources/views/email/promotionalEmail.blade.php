<!DOCTYPE html>
<html>
<head>
  <title>Promotional Email</title>
  <style type="text/css">
    /* Reset default styles */
    body, p, h1, h2, h3, h4, h5, h6, ul, ol, li {
      margin: 0;
      padding: 0;
    }
    body {
      font-family: Arial, sans-serif;
      font-size: 14px;
      line-height: 1.6;
      color: #333;
    }
    img {
      max-width: 100%;
      height: auto;
    }
  </style>
</head>
<body>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="center">
        <!-- Header -->
        <table width="600" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center" bgcolor="#f7f7f7">
              <h1 style="padding: 20px;">PMS</h1>
            </td>
          </tr>
        </table>

        <!-- Main Content -->
        <table width="600" border="0" cellspacing="0" cellpadding="20">
          <tr>
            <td>
              <h2>{{$campaign->title}}</h2>
              <p>
                Dear valued customer, we are excited to offer you a special promotion!
              </p>
              <br><br>
              <p>
                {{$campaign->details}}
              </p>
              <br><br>
              <!-- Add your promotional content here -->
              <p>
                Check out this amazing offer:
                <br>
              </p>
              <!-- End of promotional content -->
              <p>
                Hurry! This offer is valid for a limited time only.
              </p>
              <br>
              <a href="{{$campaign->url}}" style="display: inline-block; background-color: cornflowerblue; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Visit Now</a>
            </td>
          </tr>
        </table>

        <!-- Footer -->
        <table width="600" border="0" cellspacing="0" cellpadding="10">
          <tr>
            <td align="center" bgcolor="#f7f7f7">
              <p>
                © 2023 Your Company. All rights reserved.
              </p>
            
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
