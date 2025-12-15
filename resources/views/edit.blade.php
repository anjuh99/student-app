<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background-color: #f4f4f4; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { text-align: center; color: #333; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        button { width: 100%; padding: 10px; background: #ffc107; color: black; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; font-weight: bold;}
        button:hover { background: #e0a800; }
        .back-link { display: block; text-align: center; margin-top: 20px; text-decoration: none; color: #333; }
    </style>
</head>
<body>

<div class="container">
    <h1>✏️ Edit Student</h1>

    <form action="/update-student/{{ $student->id }}" method="POST">
        @csrf
        @method('PUT') <div class="form-group">
            <label>Student Name:</label>
            <input type="text" name="name" value="{{ $student->name }}" required>
        </div>

        <div class="form-group">
            <label>Email Address:</label>
            <input type="email" name="email" value="{{ $student->email }}" required>
        </div>

        <div class="form-group">
            <label>Age:</label>
            <input type="number" name="age" value="{{ $student->age }}" required>
        </div>

        <button type="submit">Update Details</button>
    </form>

    <a href="/" class="back-link">Cancel & Go Back</a>
</div>

</body>
</html>