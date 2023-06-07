<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Doctor;
use App\Models\DoctorLanguage;
use App\Models\Language;
use App\Models\Package;
use App\Models\Product;
use App\Models\Specialty;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function dashboard(){
        $page_title = 'Dashboard';
        return view('admin.dashboard',compact('page_title'));
    }
    //
    public function articles(){

        $articles = Article::orderBy('id', 'DESC')->get();
        $page_title = 'Articles';
        $empty_message = 'No product has been added.';

        return view('admin.Articles.all_articles',compact('page_title', 'empty_message', 'articles'));
    }
    public function articlesAdd()
    {
        $page_title = 'Add Article';

        return view('admin.Articles.add_articles', compact('page_title' ,));
    }
    public function articlesStore(Request $request)
    {
        $request->validate([
            'title_ar' => 'required',
            'title_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $fileName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images/articles', $fileName);

        $article = new Article();
        $article->title_ar = $request->title_ar;
        $article->title_en = $request->title_en;
        $article->description_ar = $request->description_ar;
        $article->description_en = $request->description_en;
        $article->image_path = $fileName;

        $article->save();
        $notify[] = ['success', 'Product Added Successfully!'];
        return redirect('admin/articles')->with('success', 'Data saved successfully!');
      //  return back()->withNotify($notify);
    }
    public function articlesEdit($id)
    {
        $page_title = 'Edit Article';
        $article = Article::where('id',$id)->first();
        return view('admin.Articles.edit_articles', compact('page_title' ,'article'));
      //  return back()->withNotify($notify);
    }
    public function articlesUpdate(Request $request)
    {

        $request->validate([
            'title_ar' => 'required',
            'title_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',

        ]);


        $article = Article::where('id',$request->id)->first();
        $article->title_ar = $request->title_ar;
        $article->title_en = $request->title_en;
        $article->description_ar = $request->description_ar;
        $article->description_en = $request->description_en;
        if($request->image != null){
            $fileName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images/articles', $fileName);
            $article->image_path = $fileName;

        }

        $article->save();
        $notify[] = ['success', 'Product Added Successfully!'];
        return redirect('admin/articles')->with('success', 'Data saved successfully!');

    }
    public function articlesRemove($id)
    {
        $page_title = 'Edit Article';
        $article = Article::where('id',$id)->first();
        $article->delete();
        return redirect('admin/articles')->with('success', 'Data saved successfully!');
        //  return back()->withNotify($notify);
    }
    //
    public function specialties(){
        $Specialties = Specialty::orderBy('id', 'DESC')->get();
        $page_title = 'Specialties';
        $empty_message = 'No product has been added.';
        return view('admin.Specialties.all_Specialties',compact('page_title', 'empty_message', 'Specialties'));
    }

    public function specialtiesAdd()
    {
        $page_title = 'Add Specialty';

        return view('admin.Specialties.add_Specialties', compact('page_title' ,));
    }
    public function specialtiesStore(Request $request)
    {


        $article = new Specialty();
        $article->name = $request->name;
        $article->save();
        $notify[] = ['success', 'Product Added Successfully!'];
        return redirect('admin/specialties')->with('success', 'Data saved successfully!');
        //  return back()->withNotify($notify);
    }
    public function specialtiesEdit($id)
    {
        $page_title = 'Edit Article';
        $specialties = Specialty::where('id',$id)->first();
        return view('admin.specialties.edit_specialties', compact('page_title' ,'specialties'));
        //  return back()->withNotify($notify);
    }
    public function specialtiesUpdate(Request $request)
    {
        $specialties =  Specialty::where('id',$request->id)->first();
        $specialties->name = $request->name;
        $specialties->save();
        $notify[] = ['success', 'Product Added Successfully!'];
        return redirect('admin/specialties')->with('success', 'Data saved successfully!');

    }
    public function specialtiesRemove($id)
    {
        $page_title = 'Edit Article';
        $article = Specialty::where('id',$id)->first();
        $article->delete();
        return redirect('admin/specialties')->with('success', 'Data saved successfully!');
        //  return back()->withNotify($notify);
    }
    ////////

    public function doctors(){

        $doctors = Doctor::orderBy('id', 'DESC')->get();
        $page_title = 'Doctors';
        $empty_message = 'No product has been added.';

        return view('admin.Doctors.all_doctors',compact('page_title', 'empty_message', 'doctors'));
    }
    public function doctorsAdd()
    {
        $page_title = 'Add Doctor';
        $specialties = Specialty::orderBy('id', 'DESC')->get();
        $languages = Language::orderBy('id', 'DESC')->get();
        return view('admin.Doctors.add_doctors', compact('page_title' ,'specialties','languages'));
    }
    public function doctorsStore(Request $request)
    {
//        $request->validate([
//            'specialty_id' => 'required',
//            'first_name' => 'required',
//            'last_name' => 'required',
//            'address' => 'required',
//            'phone' => 'required',
//            'email' => 'required',
//            'gender' => 'required',
//            'date_of_birth' => 'required',
//            'education' => 'required',
//            'experience' => 'required',
//            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
//        ]);
        $fileName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images/doctors', $fileName);

        $doctor = new Doctor();
        $doctor->specialty_id = $request->specialty_id;
        $doctor->first_name = $request->first_name;
        $doctor->last_name = $request->last_name;
        $doctor->address = $request->address;
        $doctor->phone = $request->phone;
        $doctor->email = $request->email;
        $doctor->gender = $request->gender;
        $doctor->date_of_birth = Carbon::create($request->date_of_birth);
        $doctor->education = $request->education;
        $doctor->experience = $request->experience;
        $doctor->image_path = $fileName;

        $doctor->save();
foreach ($request->lans as $key => $lang) {
    $doctorLanguage = new DoctorLanguage();
    $doctorLanguage->doctor_id = $doctor->id;
    $doctorLanguage->language_id = $lang;
    $doctorLanguage->save();
}
$notify[] = ['success', 'Product Added Successfully!'];
        return redirect('admin/doctors')->with('success', 'Data saved successfully!');
        //  return back()->withNotify($notify);
    }
    public function doctorsEdit($id)
    {
        $page_title = 'Edit Article';
        $article = Article::where('id',$id)->first();
        return view('admin.Articles.edit_articles', compact('page_title' ,'article'));
        //  return back()->withNotify($notify);
    }
    public function doctorsUpdate(Request $request)
    {

        $request->validate([
            'title_ar' => 'required',
            'title_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',

        ]);


        $article = Article::where('id',$request->id)->first();
        $article->title_ar = $request->title_ar;
        $article->title_en = $request->title_en;
        $article->description_ar = $request->description_ar;
        $article->description_en = $request->description_en;
        if($request->image != null){
            $fileName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images/articles', $fileName);
            $article->image_path = $fileName;

        }

        $article->save();
        $notify[] = ['success', 'Product Added Successfully!'];
        return redirect('admin/articles')->with('success', 'Data saved successfully!');

    }
    public function doctorsRemove($id)
    {
        $page_title = 'Edit Article';
        $article = Doctor::where('id',$id)->first();
        $article->delete();
        return redirect('admin/doctors')->with('success', 'Data saved successfully!');
        //  return back()->withNotify($notify);
    }
    /////////
    public function packages(){
        $packages = Package::orderBy('id', 'DESC')->get();
        $page_title = 'Packages';
        $empty_message = 'No product has been added.';
        return view('admin.Packages.all_packages',compact('page_title', 'empty_message', 'packages'));
    }
    public function packagesAdd()
    {
        $page_title = 'Add Specialty';

        return view('admin.Packages.add_packages', compact('page_title' ,));
    }
    public function packagesStore(Request $request)
    {


        $package = new Package();
        $package->name_ar = $request->name_ar;
        $package->name_en = $request->name_en;
        $package->title_ar = $request->title_ar;
        $package->title_en = $request->title_en;
        $package->consulting_count = $request->consulting_count;
        $package->month_count = $request->month_count;
        $package->price = $request->price;
        $package->save();
        $notify[] = ['success', 'Packages Added Successfully!'];
        return redirect('admin/packages')->with('success', 'Data saved successfully!');
        //  return back()->withNotify($notify);
    }
    public function packagesEdit($id)
    {
        $page_title = 'Edit Article';
        $package = Package::where('id',$id)->first();
        return view('admin.packages.edit_packages', compact('page_title' ,'package'));
        //  return back()->withNotify($notify);
    }
    public function packagesUpdate(Request $request)
    {
        $package =  Package::where('id',$request->id)->first();
        $package->name_ar = $request->name_ar;
        $package->name_en = $request->name_en;
        $package->title_ar = $request->title_ar;
        $package->title_en = $request->title_en;
        $package->consulting_count = $request->consulting_count;
        $package->month_count = $request->month_count;
        $package->price = $request->price;
        $package->save();
        $notify[] = ['success', 'Product Added Successfully!'];
        return redirect('admin/packages')->with('success', 'Data saved successfully!');

    }
    public function packagesRemove($id)
    {
        $page_title = 'Remove Article';
        $package = Package::where('id',$id)->first();
        $package->delete();
        return redirect('admin/packages')->with('success', 'Data saved successfully!');
        //  return back()->withNotify($notify);
    }
    /////////////

    public function users(){
        $page_title = 'Users';
        return view('admin.dashboard',compact('page_title'));
    }

}
