<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;

class TestController extends Controller
{
    public function q1() {
        // Write a query to get list of users which using gmail
        
        $gmail = 'gmail';
        $answer1 = User::where('email', 'LIKE', '%' . $gmail . '%')->get();

        return view('q1')->with([
            'answer1' => $answer1
        ]);
    }
    
    public function q2() {
        // Write a query to get list of items with price below than 300
        // if no result, get below 400, 500, 600 and so on until it show something
        
        $answer2 = Item::where('price', '<', 300)->get();

        // Based on $answer2 result, sum up the price
        $answer3 = $answer2->sum('price');

        return view('q2')->with([
            'answer2' => $answer2,
            'answer3' => $answer3
        ]);
    }

    public function q3() {
        // Define the relationship in App\Models\User to fix the logic below
        $user = User::find(1);
        $user->address;


        // Currently only show first_name
        // Please include last_name by defining a full_name accessor in App\Models\User 

        $full_name = $user->fullname;

        return view('q3')->with([
            'user' => $user,
        ]);
    }

    public function q4() {
        $users = User::get();

        // Write a logic to map a new key for each user based on user->gender, 
        // The value is either 'Mr' or 'Ms'
        // Key name: name_prefix

        $name_prefix = $users->map(function($user, $key) {    

            if($user->gender == 'female')
            {
                $user->name_prefix = 'Ms';
            }

            else if($user->gender == 'male')
            {
                $user->name_prefix = 'Mr';
            }                             
            
            return [
                'gender' => $user->gender,
                'name_prefix' => $user->name_prefix,
            ];
        });

        return view('q4')->with([
            'users' => $users,
        ]);
    }

    public function q5(Request $request) {
        // Copy and paste this link in your browser: http://yourlocalhostwithorwithoutport/q5?param1=parameter1&param2=parameter2
        // Get the query param from the url and assign the variables below accordingly

        $input = $request->all();

        $param1 = $request->input('param1');
        $param2 = $request->input('param2');

        return view('q5')->with([
            'param1' => $param1,
            'param2' => $param2,
        ]);
    }
}
