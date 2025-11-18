<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies List</title>
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
            padding: 40px 20px;
            color: #333;
        }

        /* === HEADER === */
        h1 {
            text-align: center;
            color: #fff;
            font-size: 2.2rem;
            margin-bottom: 30px;
            letter-spacing: 1px;
        }

        /* === SEARCH BAR === */
        form {
            text-align: center;
            margin-bottom: 30px;
        }

        input[type="text"] {
            padding: 10px 14px;
            width: 300px;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        input[type="text"]:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(30, 144, 255, 0.4);
        }

        button {
            padding: 10px 20px;
            border: none;
            background-color: #005bbb;
            color: #fff;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            margin-left: 10px;
            transition: all 0.25s ease;
        }

        button:hover {
            background-color: #004799;
            transform: translateY(-2px);
        }

        /* === ADD MOVIE BUTTON === */
        .add-btn-container {
            text-align: center;
            margin-bottom: 40px;
        }

        .create-btn {
            display: inline-block;
            background-color: #00c851;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 15px;
            letter-spacing: 0.5px;
            font-weight: 600;
            color: white;
            text-decoration: none;
            border: none;
            cursor: pointer;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.25s ease;
        }

        .create-btn,
        .create-btn:link,
        .create-btn:visited,
        .create-btn:hover,
        .create-btn:active {
            text-decoration: none !important;
            color: white !important;
        }

        .create-btn:hover {
            background-color: #00a844;
            transform: translateY(-2px);
        }

        /* === MOVIE GRID === */
        .movie-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* === MOVIE CARD === */
        .movie-card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .movie-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.25);
        }

        .movie-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 3px solid #1e90ff;
        }

        .movie-content {
            padding: 16px 18px;
        }

        .movie-content h3 {
            color: #1e90ff;
            margin-bottom: 8px;
            font-size: 1.2rem;
        }

        .movie-content p {
            color: #444;
            font-size: 14px;
            margin-bottom: 6px;
            line-height: 1.4;
        }

        .movie-content strong {
            color: #111;
        }

        /* === BUTTONS INSIDE MOVIE CARD === */
        .actions {
            display: flex;
            justify-content: space-between;
            margin-top: 12px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .actions form,
        .actions a {
            flex: 1;
            text-align: center;
        }

        .actions button,
        .actions a button {
            width: 100%;
            padding: 8px 0;
            font-size: 14px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            color: #fff;
            font-weight: 600;
            transition: all 0.25s ease;
        }

        .edit-btn {
            background-color: #1e90ff;
        }

        .edit-btn:hover {
            background-color: #0078d7;
            transform: translateY(-1px);
        }

        .delete-btn {
            background-color: #ff4444;
        }

        .delete-btn:hover {
            background-color: #cc0000;
            transform: translateY(-1px);
        }

        /* === REVIEWS SECTION === */
        .reviews {
            margin-top: 20px;
            padding: 12px;
            border-top: 1px solid #eee;
        }

        .reviews h4 {
            color: #1e90ff;
            margin-bottom: 10px;
        }

        .review-box {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px 12px;
            margin-bottom: 10px;
        }

        .review-box strong {
            color: #333;
        }

        .review-box span {
            color: #f39c12;
        }

        /* === EMPTY STATE === */
        .no-movies {
            text-align: center;
            color: #fff;
            font-size: 1.1rem;
            font-weight: 500;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <h1>🎬 Movies List</h1>

    {{-- 🔍 Search Bar --}}
    <form method="GET" action="{{ route('ListMovies') }}">
        <input type="text" name="search" placeholder="Search by title or description..." value="{{ $search ?? '' }}">
        <button type="submit">Search</button>
    </form>
    <div class="add-btn-container">
        <a href="{{ route('CreateMovies.show') }}" class="create-btn">+ Add New Movie</a>
    </div>

    
    <div class="movie-grid">
        @forelse ($movies as $movie)
            <div class="movie-card">
                <img src="{{ asset('storage/' . $movie->thumbnail) }}" alt="{{ $movie->title }}">
                <div class="movie-content">
                    <h3>{{ $movie->title }}</h3>
                    <p><strong>Genre:</strong> {{ $movie->genre }}</p>
                    <p><strong>Duration:</strong> {{ $movie->duration }} min</p>
                    <p><strong>Production Date:</strong> {{ $movie->production_date }}</p>
                    <p><strong>Description:</strong> {{ $movie->description }}</p>
                    <p><strong>Synopsis:</strong> {{ $movie->synopsis }}</p>

                    <div class="actions">
                        <a href="{{ route('EditMovies.show', ['id' => $movie->id]) }}">
                            <button class="edit-btn">Edit</button>
                        </a>

                        <form action="{{ route('DeleteMovies', ['id' => $movie->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this movie?')">Delete</button>
                        </form>

                        <a href="{{ route('reviews.page', ['id' => $movie->id]) }}">
                            <button>Reviews</button>
                        </a>
                    </div>
                    
                    <div class="reviews">
                        <h4>Reviews:</h4>
                        @forelse ($movie->reviews as $review)
                            <div class="review-box">
                                <strong>Review:</strong> {{ $review->review_text }} <br>
                                <strong>Rating:</strong> <span>{{ $review->rating }} ⭐</span>
                            </div>
                        @empty
                            <p>No reviews yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        @empty
            <p class="no-movies">No movies found.</p>
        @endforelse
    </div>
</body>
</html>
