<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f5f7fa;
      margin: 0;
      padding: 40px;
    }
    .profile-container {
      max-width: 900px;
      margin: 0 auto;
      background: #fff;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      display: flex;
      gap: 20px;
    }
    .avatar {
      width: 120px;
      height: 120px;
      background: #e9f2fb;
      border-radius: 10px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-weight: bold;
      font-size: 32px;
      color: #2a4d7d;
    }
    .info {
      flex: 1;
    }
    .info h2 {
      margin: 0;
    }
    .role {
      color: gray;
      margin-bottom: 15px;
    }
    .meta {
      margin-bottom: 20px;
    }
    .meta span {
      display: inline-block;
      margin-right: 15px;
      padding: 5px 10px;
      background: #f3f6fa;
      border-radius: 6px;
      font-size: 14px;
    }
    form {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 15px;
    }
    form label {
      font-size: 13px;
      color: #555;
      display: block;
      margin-bottom: 5px;
    }
    form input, form textarea {
      width: 100%;
      padding: 10px;
      border-radius: 6px;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }
    form textarea {
      grid-column: 1 / span 2;
      min-height: 100px;
      resize: vertical;
    }
    .buttons {
      grid-column: 1 / span 2;
      margin-top: 10px;
    }
    .buttons button {
      padding: 10px 20px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-weight: bold;
      margin-right: 10px;
    }
    .btn-save {
      background: #0d6efd;
      color: white;
    }
    .btn-cancel {
      background: #e9ecef;
      color: #333;
    }
  </style>
</head>
<body>
  <div class="profile-container">
    <div class="avatar">AR</div>
    <div class="info">
        <h2>Amit Roy</h2>
        <div class="role">Student of BCA</div>
        <div class="meta">
            <span>📧 amit@example.com</span>
            <span>📞 +91 98765 43210</span>
        </div>
    </div>
</body>
</html>
