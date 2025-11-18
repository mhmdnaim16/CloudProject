<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
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
    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="number"] {
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

    /* Gender group */
    .gender-group {
      margin-bottom: 15px;
    }

    .gender-options {
      display: flex;
      align-items: center;
      gap: 15px; /* space between male and female */
      margin-top: 5px;
    }

    .gender-options label {
      margin-right: 0;
      font-weight: 500;
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

    /* Error message box */
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
  </style>
</head>
<body>
  <form action="{{ route('SignUp.submit') }}" method="POST">
    @csrf
    <h2>Sign Up</h2>

    {{-- Error Display --}}
    @if ($errors->any())
      <div class="error">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}" required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" value="{{ old('email') }}" required>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>

    <label for="password_confirmation">Confirm Password</label>
    <input type="password" id="password_confirmation" name="password_confirmation" required>

    <div class="gender-group">
      <label>Gender:</label>
      <div class="gender-options">
        <input type="radio" id="male" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }} required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }} required>
        <label for="female">Female</label>
      </div>
    </div>

    <label for="phone-number">Phone Number</label>
    <input type="number" id="phone-number" name="phone_number" value="{{ old('phone_number') }}" required>

    <button type="submit">Sign Up</button>
  </form>
</body>
</html>
