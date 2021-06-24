<?php

namespace App\Http\Controllers;

use App\Http\Requests\URLFormRequest;
use App\Models\Link;
use Illuminate\Support\Str;


class URLShortenerController extends Controller
{
    public function shortenURL(URLFormRequest $request)
    {
        if($link = Link::where('full_link',$request->link)->first()){
            $short_link = $link->short_link;
            $counter = $link->counter;
        }
        else
        {
            $short_link = Str::random(5);
            $counter = $this->saveLink($request->link, $short_link)->counter;
        }
        return view('welcome')->with([
            'short_link'=>$short_link,
            'counter'=>$counter,
        ]);
    }

    private function saveLink($full_link, $short_link,$counter = 0)
    {
        $link = new Link();
        $link->full_link = $full_link;
        $link->short_link = $short_link;
        $link->counter = $counter;
        $link->save();
        return $link;
    }

    public function goToURL($url = null)
    {
        if(!is_null($url))
        {
            if($link = Link::where('short_link',$url)->first())
            {
                $link->counter++;
                $link->save();
                return redirect($link->full_link);
            }
            else
            {
                return view('welcome')->withErrors(["Error"=>"URL for provided code doesn`t exist"]);
            }
        }
        else
        {
            return view('welcome');
        }
    }
}
