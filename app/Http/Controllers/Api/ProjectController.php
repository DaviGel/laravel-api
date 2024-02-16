<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // Salvo tutti i progetti nella variabile projects
        $projects = Project::paginate(12);
        // Converto i progetti in un json che conterrà due chiavi: success (settato a true) e results (contentente tutti i progetti)
        return response()->json([
            'success' => true,
            'results' => $projects,
        ]);
    }
}
