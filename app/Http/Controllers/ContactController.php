<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;


class ContactController extends Controller
{
    private function data()
    {
        if (!Cookie::has('contact'))
        {
            return [];
        }

        // Terima as JSON
        $data = Cookie::get('contact');
        $data = \json_decode($data);
        return $data;
    }

    public function View()
    {
        return \view('contact');
    }

    public function ActionContact(Request $request)
    {
        $data = $this->data();
        $d = [
            "name" => $request->input('name'),
            "email" => $request->input('email'),
            "phone" => $request->input('phone'),
            "message" => $request->input('message'),
        ];

        $data[] = $d;

        $data = \json_encode($data);
        $c = Cookie::make("contact", $data, 60*24*30);
        Cookie::queue($c);

        // dd($request->all());
        // dd(Cookie::get('contact'));
        return 'Success';
    }

    public function ContactList(Request $request)
    {
        dd($request->cookie('contact'));

    }

    public function store(Request $request)
    {
  	// Ambil data dari cookie
	$jsonData = $request->cookie('contact');

        // Decode the JSON data into an array
        $formData = json_decode($jsonData, false);

	// Kirim data ke view
	return view("dataMessages",[
        "msgData" => $formData
    ]);
    }

    public function destroy($id)
    {

    $data = json_decode(Cookie::get('contact'), true);

    // If the index is valid, remove the contact from the array
    if ($id >= 0 && $id < count($data)) {
        array_splice($data, $id, 1);
    }

    // Save the updated data back to the cookie
    $data = \json_encode($data);
    $c = Cookie::make("contact", $data, 60*24*30);
    Cookie::queue($c);

    return redirect()->back();

    }

}
