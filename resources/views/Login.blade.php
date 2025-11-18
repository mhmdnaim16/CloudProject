<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    /* Reset & Base */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: linear-gradient(135deg, #1e90ff, #00bcd4);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      padding: 20px;
    }

    /* Form Container */
    form {
      background-color: #fff;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      width: 100%;
      max-width: 400px;
    }

    /* Title */
    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 25px;
    }

    /* Labels */
    label {
      display: block;
      font-weight: 600;
      color: #444;
      margin-bottom: 6px;
    }

    /* Inputs */
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px 12px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 15px;
      transition: border-color 0.2s;
    }

    input:focus {
      border-color: #1e90ff;
      outline: none;
    }

    /* Button */
    button {
      width: 100%;
      padding: 10px;
      background-color: #1e90ff;
      border: none;
      border-radius: 6px;
      color: #fff;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color: #0077cc;
    }

    /* Error Message */
    .error {
      background-color: #ffe0e0;
      color: #cc0000;
      border: 1px solid #cc0000;
      border-radius: 6px;
      padding: 10px 15px;
      margin-bottom: 15px;
    }

    .error ul {
      list-style-type: none;
    }

    /* Success message */
    .success {
      background-color: #e0ffe5;
      color: #007a2f;
      border: 1px solid #00b359;
      border-radius: 6px;
      padding: 10px 15px;
      margin-bottom: 15px;
    }

    /* Small link */
    .signup-link {
      text-align: center;
      margin-top: 15px;
      color: #333;
      font-size: 14px;
    }

    .signup-link a {
      color: #1e90ff;
      text-decoration: none;
      font-weight: 600;
    }

    .signup-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <form action="{{ route('Login.submit') }}" method="POST">
    @csrf
    <h2>Login</h2>
    {{-- Error messages --}}
    @if ($errors->any())
      <div class="error">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ old('email') }}" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Login</button>
  </form>
</body>
</html>
