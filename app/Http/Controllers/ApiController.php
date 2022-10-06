<?php

namespace App\Http\Controllers;

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
            $navItemsResponse = $response->navItems;
            $servicesCardsResponse = $response->servicesCards;
            $teravisionNodesResponse = $response->teravisionNodes;
            $usefulLinksResponse = $response->usefulLinks;
            $ourServicesLinksResponse = $response->ourServicesLinks;
            $portfoliosResponse = $response->portfolios;
            $careersResponse = $response->careers;

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Success',
                    'data' => $response,
                    'navItems' => $navItemsResponse,
                    'servicesCards' => $servicesCardsResponse,
                    'teravisionNodes' => $teravisionNodesResponse,
                    'usefulLinks' => $usefulLinksResponse,
                    'ourServicesLinks' => $ourServicesLinksResponse,
                    'portfolios' => $portfoliosResponse,
                    'careers' => $careersResponse,
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
    
}
