<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // --- මුල් පිටුව පෙන්වීම ---
    public function index() {
        // දැනට Database එකේ තියෙන ඔක්කොම ශිෂ්‍යයෝ ටික ගමු
        $students = Student::all(); 
        
        // view එකට ඒ දත්ත ටික යවමු
        return view('index', compact('students'));
    }

    // --- දත්ත සේව් කිරීම ---
    public function store(Request $request) {
        // දත්ත Database එකට දානවා
        Student::create([
            'name'  => $request->name,
            'email' => $request->email,
            'age'   => $request->age
        ]);

        // ආපහු මුල් පිටුවට යවනවා
        return redirect('/')->with('success', 'Student Added Successfully!');
    }

    // --- දත්ත මැකීම ---
    public function destroy($id) {
        // 1. අදාල ID එක හොයාගන්න
        $student = Student::find($id);
        
        // 2. මකලා දාන්න
        $student->delete();

        // 3. ආපහු යවන්න
        return redirect('/')->with('success', 'Student Deleted Successfully!');
    }

    // --- Edit පිටුව පෙන්වීම ---
    public function edit($id) {
        // 1. අදාල ID එක හොයාගන්න
        $student = Student::find($id);

        // 2. ඒ දත්ත ටික edit.blade.php එකට යවන්න
        return view('edit', compact('student'));
    }

    // --- දත්ත යාවත්කාලීන කිරීම ---
    public function update(Request $request, $id) {
        
        // 1. අදාල ශිෂ්‍යයා සොයාගැනීම
        $student = Student::find($id);

        // 2. අලුත් දත්ත වලින් යාවත්කාලීන කිරීම
        $student->update([
            'name'  => $request->name,
            'email' => $request->email,
            'age'   => $request->age
        ]);

        // 3. වැඩේ ඉවර වුනාම Home Page එකට යවන්න
        return redirect('/')->with('success', 'Details Updated Successfully! ✅');
    }
}
