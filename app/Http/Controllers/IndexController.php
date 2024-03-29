<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Blog;
use App\Category;
use App\Expertise;
use App\Project;
use App\Publication;
use App\Discategory;
use App\Districtscord;
use App\Disdata;
use App\Slider;
use App\Strategy;
use App\Formmessage;

use Carbon\Carbon;

use DB, Hash, Auth, Image, File, Session, Artisan;
use Purifier;

class IndexController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest')->only('getLogin');
        // $this->middleware('auth')->only('getProfile');
    }

    public function index()
    {
        // $blogs = Blog::orderBy('id', 'DESC')->get()->take(3);
        // $alumnis = User::where('payment_status', 1)
        //                ->where('role', 'alumni')->count();

        $sliders = Slider::orderBy('id', 'desc')->get();
        $projects = Project::orderBy('id', 'desc')->get()->take(5);
        $publications = Publication::where('status', 1)->orderBy('id', 'desc')->get()->take(3);
        $blogs = Blog::orderBy('id', 'DESC')->get()->take(3);

        $employeecount = User::all()->count();
        $ongoingprojectcount = Project::where('status', 0)->count();
        $completeprojectcount = Project::where('status', 1)->count();
        $publicationcount = Publication::all()->count();
        $blogcount = Blog::all()->count();
        
        return view('index.index')
                            ->withSliders($sliders)
                            ->withProjects($projects)
                            ->withPublications($publications)
                            ->withBlogs($blogs)
                            ->withEmployeecount($employeecount)
                            ->withOngoingprojectcount($ongoingprojectcount)
                            ->withCompleteprojectcount($completeprojectcount)
                            ->withPublicationcount($publicationcount)
                            ->withBlogcount($blogcount);
    }

    public function homeAdhoc()
    {
        return redirect()->route('index.index');
    }

    public function getAbout()
    {
        // $strategies = Strategy::orderBy('id', 'desc')->get();
        // $expertises = Expertise::orderBy('id', 'desc')->get();
        $people = User::where('type', 'Director')
                      ->orWhere('type', 'CEO')
                      ->where('activation_status', 1)->get();
                      
        return view('index.about')
                        ->withPeople($people);

                        // ->withStrategies($strategies)
                        // ->withExpertises($expertises);
    }

    public function getAboutType($type)
    {
        $selecttype = ucwords(str_replace("-", " ", $type));
        $people = User::where('type', $selecttype)
                      ->where('activation_status', 1)->get();
                      
        return view('index.about')
                        ->withPeople($people);
    }

    public function getPrivacy()
    {                 
        return view('index.privacy');
    }

    public function getTerms()
    {                 
        return view('index.terms');
    }

    public function getExpertise($slug)
    {
        $expertise = Expertise::where('slug', $slug)->first();
        return view('index.singleexpertise')->withExpertise($expertise);
    }

    public function getDirectors()
    {
        $people = User::where('type', 'Director')
                      ->orWhere('type', 'CEO')
                      ->where('activation_status', 1)->get();
        return view('index.people')->withPeople($people);
    }

    public function getAdvisors()
    {
        $people = User::where('type', 'Advisor')
                         ->where('activation_status', 1)->get();
        return view('index.people')->withPeople($people);
    }

    public function getEmployees()
    {
        $people = User::where('type', 'Employee')
                         ->where('activation_status', 1)->get();
        return view('index.people')->withPeople($people);
    }

    public function getMembers()
    {
        $people = User::where('type', 'Member')
                         ->where('activation_status', 1)->get();
        return view('index.people')->withPeople($people);
    }

    public function getProjects()
    {
        $projects = Project::orderBy('id', 'desc')->get();
        return view('index.projects')->withProjects($projects);
    }

    public function getProject($slug)
    {
        $project = Project::where('slug', $slug)->first();
        $randomprojects = Project::inRandomOrder()->get()->take(7);
        return view('index.singleproject')
                            ->withProject($project)
                            ->withProjects($randomprojects);
    }

    public function getPublications()
    {
        $publications = Publication::where('status', 1)->orderBy('id', 'desc')->paginate(12);
        return view('index.publications')->withPublications($publications);
    }

    public function getPublication($code)
    {
        $publication = Publication::where('code', $code)->first();
        $randompublications = Publication::inRandomOrder()->get()->take(5);
        return view('index.singlepublication')
                            ->withPublication($publication)
                            ->withPublications($randompublications);
    }

    public function getDisasterdata()
    {   
        $discategories = Discategory::all();
        $districtscords = Districtscord::all();
        $disasterdatas = Disdata::all();
        $disasterdatas_unique_data = $disasterdatas->unique('districtscord_id')->values()->all(); // make it unique, as multiple districts exists
        $disasterdatas_unique_data = collect($disasterdatas_unique_data);

        return view('index.disasterdata')
                            ->withDiscategories($discategories)
                            ->withDistrictscords($districtscords)
                            ->withDisasterdatas($disasterdatas_unique_data);
    }

    public function getDisasterdataAPI($discategory_id)
    {   
        $disasterdata = Disdata::where('discategory_id', $discategory_id)->first();
        if($disasterdata) {
            $disasterdata->load('discategory');
            $disasterdata->load('districtscords');
        } else {
            return 'No Data.';
        }
        
        return $disasterdata;
    }

    public function searchDisasterdata($search_param)
    {   
        $searchresults = Disdata::orderBy('created_at', 'desc')
                                ->where(function ($query) use ($search_param) {
                                    $query->where('title', 'LIKE', '%' . $search_param . '%')
                                          ->orWhere('file', 'LIKE', '%' . $search_param . '%');
                                })
                                ->get();
                                
        // category search
        $categories = Discategory::where("name", 'LIKE', '%' . $search_param . '%')->get();
        
        $categorydatasbl = collect();
        foreach($categories as $category) {
            $categorydatas = Disdata::orderBy('created_at', 'desc')
                                    ->where('discategory_id', $category->id)
                                    ->get();
            $categorydatasbl = $categorydatasbl->merge($categorydatas);
        }
        $categorydatasbl = $categorydatasbl->merge($searchresults); // eta districtdatasbl er sathe merge hobe
        // category search

        // district search
        $districts = Districtscord::where("name", 'LIKE', '%' . $search_param . '%')
                                 ->orWhere("name_bangla", 'LIKE', '%' . $search_param . '%')
                                 ->get();
        
        $districtdatasbl = collect();
        foreach($districts as $district) {
            $districtdatas = Disdata::orderBy('created_at', 'desc')
                                    ->where('districtscord_id', $district->id)
                                    ->get();
            $districtdatasbl = $districtdatasbl->merge($districtdatas);
        }
        $disasterdatas = $districtdatasbl->merge($categorydatasbl); // searchresults, categorydatasbl & districtdatasbl merged
        // district search

        $disasterdatas = $disasterdatas->unique()->values()->all();
        $disasterdatas = collect($disasterdatas);
                                  
        return view('index.search')
                    ->withSearchparam($search_param)
                    ->withDisasterdatas($disasterdatas);
    }

    public function getConstitution()
    {
        return view('index.constitution');
    }

    public function getFaq()
    {
        return view('index.faq');
    }

    public function getAdhoc()
    {
        $adhocmembers = Adhocmember::orderBy('id', 'asc')->get();
        return view('index.adhoc')->withAdhocmembers($adhocmembers);
    }

    public function getExecutive()
    {
        return view('index.executive');
    }

    public function getNews()
    {
        return view('index.news');
    }

    public function getEvents()
    {
        return view('index.events');
    }

    public function getGallery()
    {
        return view('index.gallery');
    }

    public function getContact()
    {
        $capthcatext= random_string(5);
        $img = imagecreate(200, 80);
         
        $background = imagecolorallocate($img, rand(150, 255), rand(150, 255), rand(150, 255));
        $textcolor = imagecolorallocate($img, rand(50, 150), rand(50, 150), rand(50, 150));
        
        imagefilledrectangle($img, 0, 0, 150, 80, $background);
         
        // (D) WRITE TEXT
        $txt = $capthcatext;

        $fontfiles = glob('fonts/*.*');
        $fonts = array_rand($fontfiles);
        $font = public_path($fontfiles[$fonts]);
        // dd($font);
        // $font = "C:\Windows\Fonts\Arial.ttf"; // ! CHANGE THIS TO YOUR OWN !
        // imagettftext(IMAGE, FONT SIZE, ANGLE, X, Y, COLOR, FONT, TEXT)
        imagettftext($img, 30, rand(-7, 7), rand(5, 25), 55, $textcolor, $font, $txt);
        header('Content-type: image/png');
        imagepng($img);
        $imstr = base64_encode(ob_get_clean());
        imagedestroy($img);

        return view('index.contact')
                    ->withCapthcatext($capthcatext)
                    ->withImstr($imstr);
    }

    public function storeFormMessage(Request $request)
    {
        $this->validate($request,array(
            'name'                      => 'required|max:255',
            'email'                     => 'required|max:255',
            'message'                   => 'required|max:255',
            'contact_capthcatext'       => 'required'
        ));

        if($request->contact_capthcatext == $request->hidden_capthcatext) {
            $message = new Formmessage;
            $message->name = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->name)));
            $message->email = htmlspecialchars(preg_replace("/\s+/", " ", $request->email));
            $message->message = htmlspecialchars(preg_replace("/\s+/", " ", $request->message));
            $message->save();
            
            Session::flash('success', 'Thank you for your message! We will get back to you.');
            return redirect()->route('index.contact');
        } else {
            return redirect()->route('index.contact')->with('warning', 'The CAPTHCA is incorrect. Please try again.')->withInput();
        }
    }

    public function getApplication()
    {
        return view('index.application');
    }

    public function getLogin()
    {
        return view('index.login');
    }

    public function getProfile($unique_key)
    {
        // $blogs = Blog::where('user_id', Auth::user()->id)->get();
        // $categories = Category::all();
        $user = User::where('unique_key', $unique_key)->first();
        return view('index.profile')->withUser($user);
        
    }

    public function storeApplication(Request $request)
    {
        $this->validate($request,array(
            'name'                      => 'required|max:255',
            'email'                     => 'required|email|unique:users,email',
            'phone'                     => 'required|numeric',
            'fb'                        => 'sometimes|max:255',
            'twitter'                   => 'sometimes|max:255',
            'linkedin'                  => 'sometimes|max:255',
            'image'                     => 'required|image|max:300',
            'bio'                       => 'required',
            'password'                  => 'required|min:8'
        ));

        $application = new User();
        $application->name = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->name)));
        $application->email = htmlspecialchars(preg_replace("/\s+/", " ", $request->email));
        $application->phone = htmlspecialchars(preg_replace("/\s+/", " ", $request->phone));
        
        $application->designation = 'Member';
        $application->fb = htmlspecialchars(preg_replace("/\s+/", " ", $request->fb));
        $application->twitter = htmlspecialchars(preg_replace("/\s+/", " ", $request->twitter));
        $application->linkedin = htmlspecialchars(preg_replace("/\s+/", " ", $request->linkedin));

        // image upload
        if($request->hasFile('image')) {
            $image      = $request->file('image');
            $filename   = str_replace(' ','',$request->name).time() .'.' . $image->getClientOriginalExtension();
            $location   = public_path('/images/users/'. $filename);
            Image::make($image)->resize(250, 250)->save($location);
            $application->image = $filename;
        }
        $application->password = Hash::make($request->password);

        $application->bio    = Purifier::clean($request->bio, 'youtube');
        $application->type = 'Member';
        $application->role = 'member';
        $application->activation_status = 0;

        // generate unique_key
        $unique_key_length = 100;
        $pool = '0123456789abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $unique_key = substr(str_shuffle(str_repeat($pool, 100)), 0, $unique_key_length);
        // generate unique_key
        $application->unique_key = $unique_key;
        $application->password = Hash::make($request->password);
        $application->save();
        
        Session::flash('success', 'You have registered Successfully!');
        Auth::login($application);
        return redirect()->route('index.profile', $unique_key);
    }

    public function getStrategy($id) 
    {
        $strategy = Strategy::find($id);
        $strategies = Strategy::orderBy('id', 'desc')->get();

        return view('index.strategy')
                        ->withStrategy($strategy)
                        ->withStrategies($strategies);
    }


    // clear configs, routes and serve
    public function clear()
    {
        // Artisan::call('optimize');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('key:generate');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Session::flush();
        echo 'Config and Route Cached. All Cache Cleared';
    }
}
