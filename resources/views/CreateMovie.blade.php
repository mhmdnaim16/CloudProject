<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Movie</title>
    <style>
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

        form {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 500px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }

        label {
            display: block;
            font-weight: 600;
            color: #444;
            margin-bottom: 6px;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        input[type="url"],
        textarea {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            transition: border-color 0.2s;
        }

        input:focus,
        textarea:focus {
            border-color: #1e90ff;
            outline: none;
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

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

        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
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
    </style>
</head>
<body>
    <form action="{{ route('CreateMovies.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h1>Create a New Movie</h1>

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

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}" required>

        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" value="{{ old('genre') }}" required>

        <label for="duration">Duration :</label>
        <input type="number" id="duration" name="duration" value="{{ old('duration') }}" required>

        <label for="production_date">Production Date:</label>
        <input type="date" id="production_date" name="production_date" value="{{ old('production_date') }}" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required>{{ old('description') }}</textarea>

        <label for="synopsis">Synopsis </label>
        <textarea id="synopsis" name="synopsis" >{{ old('synopsis') }}</textarea>

        <label for="thumbnail">Thumbnail </label>
        <input type="file" id="thumbnail" name="thumbnail" value="{{ old('thumbnail') }}">

        <button type="submit">Add Movie</button>

        <a href="{{ route('ListMovies') }}" class="back-link">← Back to Movie List</a>
    </form>
</body>
</html>
