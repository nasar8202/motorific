<?php

namespace App\Http\Controllers\backend\admin\liveSell;

use App\Models\LiveSaleTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LiveSellController extends Controller
{

    public function liveSell()
    {
        $liveselltime = LiveSaleTime::first();
// dd($liveselltime);
        return view('backend.admin.liveSell.updateLiveSellTime',compact('liveselltime'));

    }
    public function updateTime(Request $request,$id)
    {
        $liveselltime = LiveSaleTime::find($id);
        $liveselltime->start_time = $request->start_time;
        $liveselltime->end_time = $request->end_time;
        $liveselltime->save();

        return redirect()->route('liveSell')->with('success','Time Updated Succesfully');

    }
}
