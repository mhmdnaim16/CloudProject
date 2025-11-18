<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Movie</title>
    <style>
        /* === RESET & BASE === */
        * {
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: linear-gradient(135deg, #1e90ff, #00bcd4);
            min-height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        form {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 14px;
            box-shadow: 0 8px 22px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 520px;
        }

        h1 {
            text-align: center;
            color: #1e90ff;
            margin-bottom: 25px;
        }

        label {
            display: block;
            font-weight: 600;
            color: #333;
            margin-bottom: 6px;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            transition: border-color 0.3s;
        }

        input:focus,
        textarea:focus {
            border-color: #1e90ff;
            outline: none;
            box-shadow: 0 0 0 3px rgba(30, 144, 255, 0.2);
        }

        textarea {
            resize: vertical;
            min-height: 90px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #1e90ff;
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.1s;
        }

        button:hover {
            background-color: #0077cc;
            transform: translateY(-1px);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 18px;
            color: #1e90ff;
            text-decoration: none;
            font-weight: 500;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .error {
            background-color: #ffe0e0;
            color: #cc0000;
            border: 1px solid #cc0000;
            border-radius: 6px;
            padding: 10px 15px;
            margin-bottom: 15px;
        }

        .preview {
            text-align: center;
            margin-bottom: 15px;
        }

        .preview img {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid #1e90ff;
        }
    </style>
</head>
<body>
    <form action="{{ route('EditMovies.submit', $movie->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h1>Update Movie</h1>
        @method('PUT')
        
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ old('title', $movie->title) }}" required>

        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" value="{{ old('genre', $movie->genre) }}" required>

        <label for="duration">Duration :</label>
        <input type="number" id="duration" name="duration" value="{{ old('duration', $movie->duration) }}" required>

        <label for="production_date">Production Date:</label>
        <input type="date" id="production_date" name="production_date" value="{{ old('production_date', $movie->production_date) }}" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required>{{ old('description', $movie->description) }}</textarea>

        <label for="synopsis">Synopsis </label>
        <textarea id="synopsis" name="synopsis" >{{ old('synopsis', $movie->synopsis) }}</textarea>

        <label for="thumbnail">Thumbnail </label>
        <input type="file" id="thumbnail" name="thumbnail" value="{{ old('thumbnail', $movie->thumbnail) }}">

        <button type="submit">Update Movie</button>
        <a href="{{ route('ListMovies') }}" class="back-link">← Back to Movie List</a>
    </form>
</body>
</html>