<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Holiday;

class HolidayController extends Controller
{
    public function getSupportedCountries(){

      $query = 'https://kayaposoft.com/enrico/json/v2.0/?action=getSupportedCountries';
      $response = Http::get($query);
      $response = json_decode($response, true);

      return $response;
    }

    public function index(){

      $years = array(2018, 2019, 2020, 2021, 2022, 2023, 2024);
      $response = $this->getSupportedCountries();

      return view ('welcome', compact('response', 'years'));
    }

    public function getHoliday(Request $request){

      $country = $request->country;
      $year = $request->year;

      $query = Holiday::Where('country', $country)->Where('year', $year)->get();
      $plus = count($query);

        if($plus != 0){

          foreach($query as $element){

            $holidays = json_decode($element->data, true);
            $working = json_decode($element->working, true);
            $isHoliday = json_decode($element->holiday, true);
            $count = count($holidays);
            $total = $element->totalholidays;

          }

          return view('resultsfromdb', compact('holidays', 'count', 'working', 'isHoliday', 'total'));

          } else{

            $query = 'https://kayaposoft.com/enrico/json/v2.0?action=getHolidaysForYear&year='.$year.'&country='.$country.'&holidayType=public_holiday';
            $data = Http::get($query);
            $data = json_decode($data, true);
            $dataDb = json_encode($data, true);
            $count = count($data);

            $currentDate = date("d-m-Y");
            $workingDay = 'https://kayaposoft.com/enrico/json/v2.0/?action=isWorkDay&date='.$currentDate.'&country='.$country;
            $working = Http::get($workingDay);
            $working = json_decode($working, true);
            $workingDb = json_encode($working, true);

            $holiDay = 'https://kayaposoft.com/enrico/json/v2.0/?action=isPublicHoliday&date='.$currentDate.'&country='.$country;
            $holiday = Http::get($holiDay);
            $holiday = json_decode($holiday, true);
            $holidayDb = json_encode($holiday, true);

            $days = 0;
              foreach($data as $date){
                if($date['date']['dayOfWeek'] !=6 && $date['date']['dayOfWeek'] !=7){
                  $days++;
                }
              }

              $startDate = strtotime($year."-01-01");
              $endDate = strtotime($year."-12-31");
              $daysSec = 86400;
              $totalDays=0;
                for($i=$startDate; $i<=$endDate; $i=$i+$daysSec){
                  if(Date('D', $i) == 'Sat' || Date('D',$i) == 'Sun'){
                    $totalDays++;
                  }
                }

              $freeDay = $totalDays-$days;

              $createTask = Holiday::create([
                'country' => $request->get('country'),
                'year' => $request->get('year'),
                'data' => $dataDb,
                'working' => $workingDb,
                'holiday' => $holidayDb,
                'totalholidays' => $freeDay,
              ]);
            }

            return view ('results', compact('data', 'count', 'working', 'holiday', 'freeDay'));
          }
}
