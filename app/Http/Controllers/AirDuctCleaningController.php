<?php

namespace App\Http\Controllers;

use App\Models\AirDuctCleaning;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AirDuctCleaningController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request) {
        $airDuctCleanings = AirDuctCleaning::paginate(10);
        return view("air_duct_cleaning.index", compact('airDuctCleanings'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request) {
        $selectedSlots = AirDuctCleaning::selectRaw("DATE_FORMAT(schedule_date,'%d-%m-%Y') as date,time_frame,count(id) as count")
            ->groupBy("schedule_date", "time_frame")
            ->where("schedule_date", ">=",Carbon::now())
            ->get();

        $selectedDates = AirDuctCleaning::selectRaw("DATE_FORMAT(schedule_date,'%d-%m-%Y') as date")
                ->groupBy("schedule_date")
                ->where("schedule_date", ">=",Carbon::now())
//                ->havingRaw("count(schedule_date) = 9")
                ->pluck('date');
//        dd($selectedDate);
        return view("air_duct_cleaning.create", compact('selectedSlots', 'selectedDates'));
    }

    public function store(Request $request) {
        $date = Carbon::createFromFormat('d-m-Y',  $request->schedule_date);
        AirDuctCleaning::create([
            'job_name' => $request->job_name,
            'schedule_date' => $date,
            'time_frame' => $request->time_frame,
            'furnace' => $request->furnace,
            'area' =>  $request->area
        ]);
        return redirect()->route("air-duct-cleaning.index");
    }

    public function check_date_timeslot(Request $request) {
        dd($request->all());
    }
}
