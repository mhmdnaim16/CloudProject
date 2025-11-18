<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <style>
        /* === RESET & BASE === */
* {
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body {
    background: linear-gradient(135deg, #1e90ff, #00bcd4);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
    padding: 20px;
}

/* === FORM CONTAINER === */
form {
    background-color: #fff;
    padding: 30px 40px;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    width: 100%;
    max-width: 450px;
}

/* === HEADER === */
h1 {
    text-align: center;
    color: #1e90ff;
    margin-bottom: 25px;
    font-size: 1.8rem;
}

/* === LABELS & INPUTS === */
label {
    display: block;
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
}

textarea,
select {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 15px;
    margin-bottom: 20px;
    transition: border-color 0.3s ease;
}

textarea:focus,
select:focus {
    border-color: #1e90ff;
    outline: none;
    box-shadow: 0 0 0 3px rgba(30, 144, 255, 0.2);
}

/* === BUTTON === */
button {
    width: 100%;
    background-color: #1e90ff;
    border: none;
    color: #fff;
    font-size: 16px;
    font-weight: 600;
    border-radius: 8px;
    padding: 12px;
    cursor: pointer;
    transition: all 0.25s ease;
}

button:hover {
    background-color: #0078d7;
    transform: translateY(-2px);
}

/* === SMALL TOUCH === */
form::before {
    content: "⭐";
    font-size: 22px;
    display: block;
    text-align: center;
    margin-bottom: 10px;
    color: #ffc107;
}

    </style>
</head>
<body>
    <form action="{{ route('reviews.store', ['id' => $movie->id]) }}" method="POST">
    @csrf
    <label for="review_text">Review:</label>
    <textarea id="review_text" name="review_text" rows="4" cols="50"></textarea>
    <br>
    <label for="rating">Rating:</label>
    <select id="rating" name="rating">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <br>
    <button type="submit">Submit Review</button>
    </form>
</body>
</html>