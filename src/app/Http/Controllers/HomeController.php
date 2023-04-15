<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * The generic route implementation.
     * We just take the only parameter passed to the function and split by "-"
     * then the method looks for a matching view by splitting the "-" into "."
     * A route like http://localhost/terms will look up for the view "frontend/pages/terms"
     */
    public function any(Request $request)
    {
        // Prefix the starting lookup folder, all the page views should be inside frontend/pages folder
        $routePrefix = "frontend.pages";

        // Take the path request
        $path = $request->path();

        // Replace the "-" by "." so Laravel is able to look for the view
        $cleanRoute = str_replace("-", ".", $path);

        // The final view to look up for
        $route = "{$routePrefix}.{$cleanRoute}";

        // Render the view if it exists or a 404 error else
        if (view()->exists($route)) {
            return view($route);
        }

        return abort(404);
    }

    /**
     * Just a few manually defined routes bellow
     **/
    public function welcome()
    {
        return view('frontend.pages.welcome');
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function terms()
    {
        return view('frontend.pages.terms');
    }

    /** Some of the main landing pages routes, just to keep the url nice */
    public function appLanding()
    {
        return view('frontend.pages.app-landing');
    }

    public function appLanding2()
    {
        return view('frontend.pages.app-landing-2');
    }

    public function automateSocial()
    {
        return view('frontend.pages.automate-social');
    }

    public function businessSolutions()
    {
        return view('frontend.pages.business-solutions');
    }

    public function onlinePayment()
    {
        return view('frontend.pages.online-payment');
    }

    public function paymentServices()
    {
        return view('frontend.pages.payment-services');
    }

    public function smartBusiness()
    {
        return view('frontend.pages.smart-business');
    }
}
