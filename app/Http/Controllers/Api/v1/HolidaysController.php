<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHolidaysRequest;
use App\Http\Requests\UpdateHolidaysRequest;
use App\Models\Holidays;

class HolidaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHolidaysRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHolidaysRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Holidays  $holidays
     * @return \Illuminate\Http\Response
     */
    public function show(Holidays $holidays)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHolidaysRequest  $request
     * @param  \App\Models\Holidays  $holidays
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHolidaysRequest $request, Holidays $holidays)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Holidays  $holidays
     * @return \Illuminate\Http\Response
     */
    public function destroy(Holidays $holidays)
    {
        //
    }
}
