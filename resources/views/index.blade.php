<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background-color: #f4f4f4; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { text-align: center; color: #333; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        button { width: 100%; padding: 10px; background: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        button:hover { background: #218838; }
        .success { background: #d4edda; color: #155724; padding: 10px; margin-bottom: 20px; border-radius: 4px; text-align: center; }
        table { width: 100%; margin-top: 30px; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<div class="container">
    <h1>👨‍🎓 Student Management System</h1>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <form action="/save-student" method="POST">
        @csrf
        <div class="form-group">
            <label>Student Name:</label>
            <input type="text" name="name" required placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label>Email Address:</label>
            <input type="email" name="email" required placeholder="Enter Email">
        </div>
        <div class="form-group">
            <label>Age:</label>
            <input type="number" name="age" required placeholder="Enter Age">
        </div>
        <button type="submit">Register Student</button>
    </form>

    <hr>
    <h2>Registered Students</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Action</th> </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->age }}</td>
                    <td>
                        <a href="/edit-student/{{ $student->id }}" style="text-decoration: none; background: #ffc107; color: black; padding: 5px 10px; border-radius: 4px; margin-right: 5px;">Edit</a>
                        <br><br>
                        <form action="/delete-student/{{ $student->id }}" method="POST">
                            @csrf
                            @method('DELETE') <button type="submit" style="background: #dc3545; width: auto; padding: 5px 10px;" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>