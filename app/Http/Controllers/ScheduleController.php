<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Schedule;
use App\Models\Personnel;
use Illuminate\Http\Request;
use App\Http\Resources\ApiResource;

class ScheduleController extends Controller
{
    public function index()
    {
        // $schedules = Schedule::get();

        // // Proses data, misalnya mendecode JSON pada kolom array_date_in
        // $schedules = $schedules->map(function ($schedule) {
        //     $schedule->array_date_in = json_decode($schedule->array_date_in, true);
        //     return $schedule;
        // });
        // dd($schedules);
        $personnels = Personnel::get();
        return view('schedules.index', compact('personnels'));
    }

    public function indexFormCreate()
    {
        $personnels = Personnel::get();

        return view('schedules.create', compact('personnels'));
    }

    public function store(Request $request)
    {
        $dateArray = $request->array_date; // Assuming 'array_date_in' is coming from the request
        $date = Carbon::parse('01 ' . $request->date)->format('Y-m-d');

        $data = [
            'personnel_id'  => $request->personnel_id,
            'date'           => $date,
            'array_date'  => json_encode($dateArray) // Encode array as JSON
        ];
        // dd($data);

        Schedule::create($data);
        return redirect()->route('schedules.')->with('success', 'Berhasil membuat jadwal');
    }

    public function getJadwalById($personnelId)
    {
        $schedule = Schedule::where('personnel_id', $personnelId)->first();

        $schedule->array_date_in = json_decode($schedule->array_date, true);

        return response()->json(new ApiResource(true, 200, 'Successfully get data', $schedule), 200);
    }
}
