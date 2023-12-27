<?php

namespace App\Http\Controllers;

use App\Models\QA;
use App\Models\Client;
use App\Models\Project;
use App\Models\CompanyGoal;
use App\Models\CompanyTeam;
use App\Models\Testimonail;
use Illuminate\Http\Request;
use App\Models\CompanyService;
use App\Repository\BaseCrudRepo;
use App\Models\CompanyAchievement;
use App\Models\CompanyInfo;

class HomeController  extends Controller
{
    public function home()
    {
        $projctes = Project::with('user', 'photos')->get();
        $services = CompanyService::get();
        $testimonails = Testimonail::get();
        $clients = Client::get();
        $companyInfo = CompanyInfo::get();
        return response()->json([
            "projects" => $projctes,
            "services" => $services,
            "testimonails" => $testimonails,
            "clients" => $clients,
            "company_info" => $companyInfo,
        ]);
    }

    public function aboutUs()
    {
        $goals = CompanyGoal::get();
        $team = CompanyTeam::get();
        $testimonails = Testimonail::get();
        $clients = Client::get();
        $projctes = Project::with('images')->get();
        $services = CompanyService::get();
        $achievments = CompanyAchievement::get();
        $companyInfo = CompanyInfo::get();
        $qa = QA::get();
        return response()->json([
            "goals" => $goals,
            "team" => $team,
            "testimonails" => $testimonails,
            "clients" => $clients,
            "company_info" => $companyInfo,
        ]);
    }
}
