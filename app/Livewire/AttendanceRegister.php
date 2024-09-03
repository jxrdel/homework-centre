<?php

namespace App\Livewire;

use App\Models\Appointment;
use App\Models\Student;
use Livewire\Component;

class AttendanceRegister extends Component
{
    public $id;
    public $students;

    public function render()
    {
        $id = $this->id;
        $this->students = Student::select('students.StudentID', 'FirstName', 'LastName', 'PicturePath')
            ->with(['appointments' => function ($query) use ($id) {
                $query->where('TimeSlotID', $id);
            }])
            ->whereHas('appointments', function ($query) use ($id) {
                $query->where('TimeSlotID', $id);
            })
            ->get();
        return view('livewire.attendance-register');
    }

    public function mount($id){
        $this->id = $id;
    }

    public function setAttendance($id, $status){
        // dd($id, $status);
        $appointment = Appointment::find($id);
        $appointment->Attendance = $status;
        $appointment->save();
    }
}
