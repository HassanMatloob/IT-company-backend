<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Messages;
use App\Models\Portfolio;
use App\Models\Settings;
use Illuminate\Http\Request;
use Exception;

class ApiController extends Controller
{
    //

    public function get_all_settings()
    {
        try {
            $response = Settings::all();

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Success',
                    'data' => $response,

                ],
                200
            );
        } catch (Exception $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Fail to fetch the settings',
                    'data' => null,

                ],
                500
            );
        }
    }

    public function get_settings_by_id($id)
    {
        try {
            $response = Settings::find($id);
            $response->navItems;
            $response->servicesCards;
            $response->teravisionNodes;
            $response->testmonials;
            $response->usefulLinks;
            $response->ourServicesLinks;

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Success',
                    'data' => $response,

                ],
                200
            );
        } catch (Exception $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Fail to fetch the settings against the given id',
                    'data' => null,

                ],
                500
            );
        }
    }

    public function get_settings_by_name($name)
    {
        try {
            $response = Settings::where('company_name',$name)->first();
            $response->navItems;
            $response->servicesCards;
            $response->teravisionNodes;
            $response->testmonials;
            $response->usefulLinks;
            $response->ourServicesLinks;

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Success',
                    'data' => $response,
                ],
                200
            );
        } catch (Exception $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Fail to fetch the settings against the given name',
                    'data' => null,

                ],
                500
            );
        }
    }

    public function get_portfolios_by_id($id)
    {

        try {
            $responses = Portfolio::where('setting_id', $id)->get();
            $option = [];
            foreach ($responses as $response) {
                $option[$response->id] = $response->portfolioTechTags;
            }

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Success',
                    'data' => $responses,
                    //'portfolioTechTags' => $option,
                ],
                200
            );
        } catch (Exception $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Fail to fetch the portfolios of given id',
                    'data' => null,

                ],
                500
            );
        }
    }

    public function get_careers_by_id($id)
    {

        try {
            $responses = Career::where('setting_id', $id)->get();
            $option = [];
            foreach ($responses as $response) {
                $option[$response->id] = $response->careerTechTags;
            }

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Success',
                    'data' => $responses,
                ],
                200
            );
        } catch (Exception $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Fail to fetch the careers of given id',
                    'data' => null,

                ],
                500
            );
        }
    }

    public function storeMessage(Request $request){
        try{
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'subject' => 'required',
                'message' => 'required',
                'setting_id' => 'required',
              ]);
          
              $newMessage = new Messages([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'subject' => $request->get('subject'),
                'message' => $request->get('message'),
                'setting_id' => $request->get('setting_id'),
              ]);
          
              $newMessage->save();
          
              return response()->json(
                [
                    'status' => true,
                    'message' => 'Success',
                    'data' => $newMessage,
                ],
                200
            );
        }catch (Exception $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Fail to send the Message',
                    'data' => null,

                ],
                500
            );
        }
        
    }
}
