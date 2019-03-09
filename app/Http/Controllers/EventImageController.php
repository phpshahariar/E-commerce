<?php

namespace App\Http\Controllers;

use App\EventImage;
use Illuminate\Http\Request;
use Image;

class EventImageController extends Controller
{
    public function EventImage(){
        $eventImages = EventImage::orderBy('id', 'desc')->get();
        return view('backEnd.pages.EventImage.eventImage', [
            'eventImages' => $eventImages
        ]);
    }
    protected function eventImageValidation($request){
        $request->validate([
            'event_image' => 'required',
            'status'      => 'required'
        ]);
    }
    public function AddEventImage(Request $request){
        $this->eventImageValidation($request);
        $image =  $request->file('event_image');
        $imageName = time().'_'.$image->getClientOriginalName();
        $imageUrl = 'event-image/';
        Image::make($image)->resize(1359,339)->save($imageUrl.$imageName);

        $eventImage = new EventImage();
        $eventImage->event_image = $imageUrl.$imageName;
        $eventImage->status = $request->status;
        $eventImage->save();
        return redirect('/add-event-image')->with('message', 'Event Image Added Successfully');
    }

    public function UnpublishedEventImage($id){
        $eventImage = EventImage::where('id', $id)->first();
        $eventImage->status = 0;
        $eventImage->update();
        return redirect('/add-event-image')->with('message', 'Event Image Unpublished Successfully');
    }
    public function PublishedEventImage($id){
        $eventImage = EventImage::where('id', $id)->first();
        $eventImage->status = 1;
        $eventImage->update();
        return redirect('/add-event-image')->with('message', 'Event Image Published Succssfully');
    }
    protected function eventImageValidationUp($request){
        $request->validate([
            'status'      => 'required'
        ]);
    }
    public function UpdateEventImage(Request $request){
        $image = $request->file('event_image');
        $this->eventImageValidationUp($request);
        $eventImage = EventImage::where('id', $request->id)->first();
        if($image){
            unlink($eventImage->event_image);
            $imageName = time().'_'.$image->getClientOriginalName();
            $imageUrl = 'event-image/';
            Image::make($image)->resize(1359, 339)->save($imageUrl.$imageName);
            $eventImage->event_image = $imageUrl.$imageName;
        }
        $eventImage->status = $request->status;
        $eventImage->update();
        return redirect('/add-event-image')->with('message', 'Event Image Updated Successfully');

    }
    public function DeleteEventImage($id){
       $eventImage = EventImage::where('id', $id)->first();
       unlink($eventImage->event_image);
       $eventImage->delete();
       return redirect('/add-event-image')->with('messageD', 'Event Image Deleted Successfully');
    }
}
