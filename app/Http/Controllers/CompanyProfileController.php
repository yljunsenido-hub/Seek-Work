<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class CompanyProfileController extends Controller
{
    public function index()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Assuming the user has a 'company' relationship
        $company = $user->company; 

        // Pass the company object to the view
        return view("employer.companyProfile", compact('company'));
    }

    public function edit()
    {
        // Get the company belonging to the logged-in user
        $company = Auth::user()->company;

        if (!$company) {
            return redirect()->route('dashboard')->with('error', 'No company profile found.');
        }

        return view('employer.editCompanyProfile', compact('company'));
    }

    public function updateBanner(Request $request)
    {
        $company = Auth::user()->company;

        $request->validate([
            'banner' => 'required|image|mimes:jpeg,png,jpg,webp,avif|max:2048', 
        ]);

        if ($request->hasFile('banner')) {
            // Delete old
            if ($company->banner_path && Storage::disk('public')->exists($company->banner_path)) {
                Storage::disk('public')->delete($company->banner_path);
            }

            // Store new
            $path = $request->file('banner')->store('banners', 'public');

            // Update directly or prepare array
            $company->update(['banner_path' => $path]);
            
            return redirect()->route('employer.companyProfile')->with('success', 'Banner updated!');
        }

        return back()->with('error', 'Please select an image first.');
    }

    public function updateLogo(Request $request)
    {
        $company = Auth::user()->company;

        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,webp,avif|max:2048', 
        ]);

        if ($request->hasFile('logo')) {
            // Delete old
            if ($company->logo_path && Storage::disk('public')->exists($company->logo_path)) {
                Storage::disk('public')->delete($company->logo_path);
            }

            // Store new
            $path = $request->file('logo')->store('logos', 'public');

            // Update directly or prepare array
            $company->update(['logo_path' => $path]);
            
            return redirect()->route('employer.companyProfile')->with('success', 'Logo updated!');
        }

        return back()->with('error', 'Please select an image first.');
    }

    public function update(Request $request)
    {

        $company = Auth::user()->company;

        // 1. Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'tagline' => 'required|string|max:100',
            'description' => 'required|string|min:20',
        ]);

        $updateData = [
            'name' => $request->name,
            'tagline' => $request->tagline,
            'description' => $request->description,
        ];

        // 3. Update & Redirect
        $company->update($updateData);

        return redirect()->route('employer.edit')->with('success', 'Company profile updated successfully!');
    }



    public function uploadPhotos(Request $request, $companyId)
    {
        $company = Companies::findOrFail($companyId);

        $request->validate([
            'photos.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048', // 2MB max per image
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $file) {
                // 1. Store the physical file in storage/app/public/companies
                $path = $file->store('companies', 'public');

                // 2. Create the record in the photos table
                $company->photos()->create([
                    'path' => $path,
                ]);
            }
        }

        return back()->with('success', 'Images uploaded successfully!');
    }
}