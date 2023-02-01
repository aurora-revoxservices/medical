<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Requests;

use Analytics;
use Carbon\Carbon;
use Spatie\Analytics\Period;
use App\Structure\Elements;
use App\Structure\Registers;
use App\Models\User;
use App\Models\Blog;
use App\Models\Project;
use App\Models\Contact;
use App\Models\Testimonie;
use App\Models\Faq;
use App\Models\Team;



class DashboardController extends Controller
{


    public function dashboard()
    {

        $user = User::auth();
        $blogs = Blog::latest()->get();
        $contacts = Contact::latest()->get();
        $testimonies = Testimonie::latest()->get();
        $faqs = Faq::latest()->get();
        $teams = Team::latest()->get();

        return view('managers.views.dashboard.index')->with([
            'user' => $user,
            'blogs' => $blogs,
            'contacts' => $contacts,
            'testimonies' => $testimonies,
            'faqs' => $faqs,
            'teams' => $teams,
        ]);
    }
}