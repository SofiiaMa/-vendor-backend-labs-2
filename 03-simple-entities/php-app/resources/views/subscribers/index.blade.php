<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUID operation Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* General Styling */
        body {
            background: linear-gradient(45deg, #2196f3, #f44336); /* Vibrant gradient */
            font-family: 'Roboto Mono', monospace; 
        }

        .container {
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.2); /* Subtle white glow */
            margin-top: 50px; /* Adjust as needed */
            max-width: 600px; /* Adjust as needed */
            margin-left: auto;
            margin-right: auto;
        }

        h1 {
            color: #fff; /* White text */
            text-shadow: 0 0 5px #0ff; /* Neon blue text shadow */
            text-align: center; /* Center align */
        }

        /* Form Styling */
        label {
            color: #fff;
            margin-bottom: 5px;
        }

        input, 
        button {
            background-color: transparent;
            border: 1px solid #fff;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            width: 100%; /* Full width */
            transition: all 0.3s ease; /* Smooth transition for hover effect */
        }

        input:hover,
        button:hover {
            box-shadow: 0 0 10px #0ff; /* Blue glow on hover */
        }

        /* Link Styling */
        a {
            color: #fff;
            text-decoration: none;
            border-bottom: 1px dashed #fff;
            transition: all 0.3s ease;
        }

        a:hover {
            color: #0ff; /* Blue color on hover */
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px; /* Adjust as needed */
        }

        th, td {
            border: 1px solid #fff;
            padding: 8px;
            color: #fff;
            text-align: left;
        }

        th {
            background-color: #2196f3; /* Blue background */
        }

        /* Button Styling */
        button[type="submit"] {
            background-color: #2196f3; /* Blue color */
            border-color: #2196f3;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0f82f2; /* Darker blue on hover */
        }
    </style>
</head>
<body>
    <div class="container mx-auto">
        <h1 class="text-3xl mb-8">Subscribers Management</h1>

        <!-- Form for creating a new subscriber -->
        <h2>Create New Subscriber</h2>
        <form action="{{ route('subscribers.store') }}" method="POST">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            <label for="tags">Tags:</label>
            <input type="text" id="tags" name="tags[]" value="1"> 
            <button type="submit">Submit</button>
        </form>

        <!-- List of existing subscribers -->
        <h2>Subscribers List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Tags</th>
                    <th>Actions</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($subscribers as $subscriber)
                <tr>
                    <td>{{ $subscriber->id }}</td>
                    <td>{{ $subscriber->name }}</td>
                    <td>{{ $subscriber->email }}</td>
                    <td>
                        @if(is_array($subscriber->tags))
                            {{ implode(', ', $subscriber->tags) }}
                        @else
                            {{ $subscriber->tags }}  
                        @endif                    
                    </td>
                    <td>
                        <a href="{{ route('subscribers.edit', $subscriber->id) }}">Edit</a>
                        <a href="{{ route('subscribers.show', $subscriber->id) }}">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
