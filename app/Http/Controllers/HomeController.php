<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {       
        return view('welcome');
    }

    public function video_link(Request $request)
    {
        // $url = "https://www.facebook.com/mmsubsongs/videos/326342431775747/";
        $data = $this->url_get_contents($request->video_url);
        $hdlink = $this->hdLink($data);
        $sdlink = $this->sdLink($data);
        return redirect()->route('video',['hdlink' => $hdlink, 'sdlink' => $sdlink]);
    }

    public function video(Request $request)
    {
        if(isset($request->hdlink)){
            $url = $request->hdlink;
        }else{
            $url = $request->sdlink;
        }
        return view('video',compact('url'));
    }

    function hdLink($curl_content)
    {
        $regex = '/hd_src:"([^"]+)"/';
        if (preg_match($regex, $curl_content, $match)) {
            return $match[1];
        } else {
            return;
        }
    }

    function sdLink($curl_content)
    {
        $regex = '/sd_src_no_ratelimit:"([^"]+)"/';
        if (preg_match($regex, $curl_content, $match1)) {
            return $match1[1];
        } else {
            return;
        }
    }

    function url_get_contents($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36 Edge/12.10240');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
}
