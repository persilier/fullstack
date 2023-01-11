<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventCalendarRequest;
use App\Http\Requests\UpdateEventCalendarRequest;
use App\Http\Resources\EventCalendarResource;
use App\Models\EventCalendar;
use DateTime;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EventCalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $employee = Auth::user();
        if (!$eventCal = EventCalendar::with('user')
            ->where('user_id',$employee->id)
            ->latest()
            ->paginate(8)) {
            return $this->notFoundResponse('no event found for this user');
        }

        return $this->resourceCollectionResponse(EventCalendarResource::collection($eventCal),'All the  Events retrieved');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEventCalendarRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function store(StoreEventCalendarRequest $request): JsonResponse
    {

        $start_date = new DateTime($request->start_date);
        $end_date = new DateTime($request->end_date);
        $day = $start_date->diff($end_date);
        $days = $day->d;
        $validated= $request->safe()->merge(
            ['user_id'=> Auth::user()->id,
                'days'=>$days

            ]);
        $EventCalendar= EventCalendar::create([
            'user_id'=> $validated['user_id'],
            'title'=>$validated['title'],
            'start_date'=>$validated['start_date'],
            'end_date'=>$validated['end_date'],
            'days'=>$validated['days']
        ]);

        if (!$EventCalendar) {
            return $this->badRequestResponse('an error occured');
        }
        return $this->createdResponse('Event created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        if (!$EventCal = EventCalendar::with('user')->where('user_id', Auth::user()->id)) {
            return $this->notFoundResponse('no Event found');
        }
        return $this->resourceResponse(new EventCalendarResource($EventCal),'Event found successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEventCalendarRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateEventCalendarRequest $request, $id): JsonResponse
    {
        if (!$EventCal = EventCalendar::with('user')->where('user_id', Auth::user()->id)) {
            return $this->notFoundResponse('no Event found');
        }
        $EventCal->update($request->all());
        return $this->resourceResponse(new EventCalendarResource($EventCal),'Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        if (!$EventCal = EventCalendar::with('user')->where('user_id', Auth::user()->id)) {
            return $this->notFoundResponse('no Event found');
        }
        $EventCal->delete();
        return $this->noContentResponse();
    }
}
